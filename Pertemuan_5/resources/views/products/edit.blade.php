<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-indigo-600 rounded-lg shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <h2 class="font-black text-2xl text-gray-800 dark:text-gray-100 tracking-tight">
                {{ __('Refine Product') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F8FAFC] dark:bg-[#0F172A] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-2xl border border-gray-100 dark:border-slate-700 overflow-hidden">
                <div class="p-10 md:p-14">
                    <div class="mb-12">
                        <h3 class="text-3xl font-black text-slate-900 dark:text-white leading-tight">Ubah Detail Produk</h3>
                        <p class="text-slate-500 font-medium mt-2 italic shadow-indigo-100">Lakukan pembaruan pada informasi produk di bawah ini.</p>
                        <div class="mt-8 h-1.5 w-24 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-full"></div>
                    </div>

                    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-10">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Product Name -->
                            <div class="space-y-3">
                                <label for="name" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Product Identity Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" 
                                    class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                    placeholder="e.g. Premium Silk Scarf">
                                @error('name') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Category -->
                            <div class="space-y-3">
                                <label for="category" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Classification</label>
                                <select name="category" id="category" 
                                    class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200">
                                    <option value="Electronics" {{ old('category', $product->category) == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="Clothing" {{ old('category', $product->category) == 'Clothing' ? 'selected' : '' }}>Clothing</option>
                                    <option value="Food" {{ old('category', $product->category) == 'Food' ? 'selected' : '' }}>Food</option>
                                    <option value="Home" {{ old('category', $product->category) == 'Home' ? 'selected' : '' }}>Home</option>
                                    <option value="Other" {{ old('category', $product->category) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('category') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Price -->
                            <div class="space-y-3">
                                <label for="price" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Monetary Value (Rp)</label>
                                <div class="relative">
                                    <span class="absolute left-6 top-1/2 -translate-y-1/2 font-black text-slate-400">Rp</span>
                                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" 
                                        class="w-full pl-14 pr-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                        placeholder="0">
                                </div>
                                @error('price') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Stock -->
                            <div class="space-y-3">
                                <label for="stock" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Quantity in Hold</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" 
                                    class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                    placeholder="0">
                                @error('stock') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-3">
                            <label for="description" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Narrative Description</label>
                            <textarea name="description" id="description" rows="5" 
                                class="w-full px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-gray-100 dark:border-slate-700 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-slate-900 dark:text-white font-bold transition duration-200" 
                                placeholder="Describe the item uniqueness...">{{ old('description', $product->description) }}</textarea>
                            @error('description') <p class="text-xs font-black text-rose-500 italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex flex-col md:flex-row items-center gap-4 pt-6">
                            <button type="submit" class="w-full md:w-auto px-12 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-none transition-all duration-300 transform hover:-translate-y-1">
                                UPDATE PRODUCT
                            </button>
                            <a href="{{ route('products.index') }}" class="w-full md:w-auto px-12 py-4 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-white font-black rounded-2xl text-center transition duration-200">
                                BACK TO CONSOLE
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
