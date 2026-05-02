<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-indigo-600 rounded-lg shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </div>
            <h2 class="font-black text-2xl text-gray-800 dark:text-gray-100 tracking-tight">
                {{ __('New Acquisition') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F8FAFC] dark:bg-[#0F172A] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-2xl border border-gray-100 dark:border-slate-700 overflow-hidden">
                <div class="p-10 md:p-14">
                    <div class="mb-12">
                        <h3 class="text-3xl font-black text-slate-900 dark:text-white leading-tight">Registrasi Produk Baru</h3>
                        <p class="text-slate-500 font-medium mt-2 italic">Tambahkan item baru ke dalam katalog Pak Cokomi & Mas Wowo.</p>
                        <div class="mt-8 h-1.5 w-24 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-full"></div>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST" class="space-y-10">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Product Name -->
                            <div class="space-y-3">
                                <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Product Identity Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                    class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                    placeholder="e.g. Premium Silk Scarf">
                                @error('name') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Category -->
                            <div class="space-y-3">
                                <label for="category" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Classification</label>
                                <select name="category" id="category" 
                                    class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200">
                                    <option value="Electronics" {{ old('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="Clothing" {{ old('category') == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                                    <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>Food</option>
                                    <option value="Home" {{ old('category') == 'Home' ? 'selected' : '' }}>Home</option>
                                    <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Price -->
                            <div class="space-y-3">
                                <label for="price" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Market Price (Rp)</label>
                                <div class="relative">
                                    <span class="absolute left-6 top-1/2 -translate-y-1/2 font-black text-slate-400">Rp</span>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}" 
                                        class="w-full pl-14 pr-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                        placeholder="0">
                                </div>
                                @error('price') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Stock -->
                            <div class="space-y-3">
                                <label for="stock" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Initial Quantity</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" 
                                    class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                    placeholder="0">
                                @error('stock') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-3">
                            <label for="description" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Comprehensive Details</label>
                            <textarea name="description" id="description" rows="5" 
                                class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                placeholder="Describe the item uniqueness...">{{ old('description') }}</textarea>
                            @error('description') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex flex-col md:flex-row items-center gap-4 pt-6">
                            <button type="submit" class="w-full md:w-auto px-12 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-none transition-all duration-300 transform hover:-translate-y-1">
                                SAVE NEW PRODUCT
                            </button>
                            <a href="{{ route('products.index') }}" class="w-full md:w-auto px-12 py-4 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-white font-black rounded-2xl text-center transition duration-200">
                                DISCARD CHANGES
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
