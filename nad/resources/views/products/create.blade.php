<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-crimson transition uppercase tracking-widest font-black text-[10px]">Database</a>
            <span class="text-gray-500">/</span>
            <span class="text-white uppercase tracking-widest font-black text-[10px]">Input Baru</span>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto animate-in fade-in slide-in-from-bottom-4 duration-700">
        <div class="glass-card rounded-[2.5rem] overflow-hidden border-t-4 border-crimson">
            <div class="px-10 py-8 border-b border-white/5">
                <h3 class="text-2xl font-black text-white uppercase tracking-tighter">Registrasi Barang</h3>
                <p class="mt-1 text-sm text-gray-500">Daftarkan item baru ke dalam ekosistem <span class="text-crimson font-bold italic">Cokowo Command</span>.</p>
            </div>

            <form action="{{ route('products.store') }}" method="POST" class="p-10 space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Nama Produk -->
                    <div class="space-y-3">
                        <label for="name" class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Nama Produk <span class="text-crimson">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                            class="block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-crimson focus:ring-0 transition-all placeholder:text-gray-600" 
                            placeholder="Contoh: RTX 4090 SUPER">
                        @error('name') <span class="text-xs text-crimson font-bold italic">{{ $message }}</span> @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="space-y-3">
                        <label for="category" class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Kategori <span class="text-crimson">*</span></label>
                        <select name="category" id="category" 
                            class="block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-crimson focus:ring-0 transition-all">
                            <option value="" class="bg-crimson-dark-950">-- Pilih Sektor --</option>
                            <option value="Electronics" {{ old('category') == 'Electronics' ? 'selected' : '' }} class="bg-crimson-dark-950">Elektronik</option>
                            <option value="Clothing" {{ old('category') == 'Clothing' ? 'selected' : '' }} class="bg-crimson-dark-950">Pakaian</option>
                            <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }} class="bg-crimson-dark-950">Makanan</option>
                            <option value="Home" {{ old('category') == 'Home' ? 'selected' : '' }} class="bg-crimson-dark-950">Kebutuhan Rumah</option>
                            <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }} class="bg-crimson-dark-950">Lainnya</option>
                        </select>
                        @error('category') <span class="text-xs text-crimson font-bold italic">{{ $message }}</span> @enderror
                    </div>

                    <!-- Harga -->
                    <div class="space-y-3">
                        <label for="price" class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Harga Satuan (Rp) <span class="text-crimson">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 font-bold">Rp</div>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" 
                                class="block w-full bg-white/5 border-white/10 rounded-2xl text-white pl-12 focus:border-crimson focus:ring-0 transition-all placeholder:text-gray-600" 
                                placeholder="0">
                        </div>
                        @error('price') <span class="text-xs text-crimson font-bold italic">{{ $message }}</span> @enderror
                    </div>

                    <!-- Stok -->
                    <div class="space-y-3">
                        <label for="stock" class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Stok Awal <span class="text-crimson">*</span></label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock') }}" 
                            class="block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-crimson focus:ring-0 transition-all placeholder:text-gray-600" 
                            placeholder="0">
                        @error('stock') <span class="text-xs text-crimson font-bold italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="space-y-3">
                    <label for="description" class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em]">Deskripsi Item</label>
                    <textarea name="description" id="description" rows="4" 
                        class="block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-crimson focus:ring-0 transition-all placeholder:text-gray-600" 
                        placeholder="Detail spesifikasi produk...">{{ old('description') }}</textarea>
                    @error('description') <span class="text-xs text-crimson font-bold italic">{{ $message }}</span> @enderror
                </div>

                <!-- Footer Actions -->
                <div class="pt-10 border-t border-white/5 flex justify-end gap-4">
                    <a href="{{ route('products.index') }}" class="px-8 py-4 glass-card text-gray-400 text-xs font-black uppercase tracking-widest rounded-2xl hover:text-white transition-all">
                        Batalkan
                    </a>
                    <button type="submit" class="px-10 py-4 bg-crimson text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-crimson-hover hover:scale-105 transition-all shadow-lg shadow-crimson/20">
                        Simpan ke Database
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
