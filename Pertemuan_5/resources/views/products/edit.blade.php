<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('products.index') }}" class="p-2 bg-zinc-900 hover:bg-zinc-800 text-zinc-500 hover:text-white rounded-xl transition-all border border-zinc-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <h2 class="font-black text-2xl text-white tracking-tight">
                {{ __('Edit Product') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="bg-zinc-950 border border-zinc-900 rounded-[3rem] shadow-2xl overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary-600 via-primary-400 to-primary-600"></div>
            
            <form action="{{ route('products.update', $product) }}" method="POST" class="p-10 md:p-16 space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-3">Product Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                               class="w-full bg-black border-2 border-zinc-900 focus:border-primary-600 focus:ring-0 text-white rounded-2xl px-6 py-4 font-bold transition-all"
                               placeholder="e.g. Indomie Goreng">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-3">Category</label>
                            <select name="category" id="category" required
                                    class="w-full bg-black border-2 border-zinc-900 focus:border-primary-600 focus:ring-0 text-white rounded-2xl px-6 py-4 font-bold transition-all">
                                <option value="Food" {{ $product->category == 'Food' ? 'selected' : '' }}>Food</option>
                                <option value="Beverage" {{ $product->category == 'Beverage' ? 'selected' : '' }}>Beverage</option>
                                <option value="Electronics" {{ $product->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                <option value="Household" {{ $product->category == 'Household' ? 'selected' : '' }}>Household</option>
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-3">Price (IDR)</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required min="0"
                                   class="w-full bg-black border-2 border-zinc-900 focus:border-primary-600 focus:ring-0 text-white rounded-2xl px-6 py-4 font-bold transition-all">
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Stock -->
                    <div>
                        <label for="stock" class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-3">Stock Amount</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required min="0"
                               class="w-full bg-black border-2 border-zinc-900 focus:border-primary-600 focus:ring-0 text-white rounded-2xl px-6 py-4 font-bold transition-all">
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] mb-3">Description</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="w-full bg-black border-2 border-zinc-900 focus:border-primary-600 focus:ring-0 text-white rounded-[2rem] px-6 py-6 font-bold transition-all">{{ old('description', $product->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-5 bg-primary-600 hover:bg-primary-500 text-white font-black rounded-2xl shadow-xl shadow-primary-900/30 transition-all uppercase tracking-[0.2em] text-xs">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
