<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="p-2 bg-crimson rounded-lg shadow-[0_0_15px_rgba(220,38,38,0.4)]">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <h2 class="font-black text-2xl text-white tracking-tighter uppercase">
                    {{ __('Database Inventaris') }}
                </h2>
            </div>
            <a href="{{ route('products.create') }}" class="px-6 py-3 bg-crimson text-white text-xs font-black uppercase tracking-widest hover:bg-crimson-hover transition-all rounded-xl shadow-lg flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                Stok Baru
            </a>
        </div>
    </x-slot>

    <div class="animate-in fade-in slide-in-from-bottom-4 duration-700">
        
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="mb-8 p-6 glass-card border-l-4 border-crimson rounded-2xl flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-black text-crimson uppercase tracking-widest mb-1">Status Update</p>
                    <p class="text-sm font-bold text-white">{{ session('success') }}</p>
                </div>
                <div class="w-10 h-10 bg-crimson/20 rounded-full flex items-center justify-center text-crimson">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
            </div>
        @endif

        <div class="glass-card rounded-[2rem] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-white/5">
                    <thead class="bg-white/5">
                        <tr>
                            <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest">
                                Item SKU
                            </th>
                            <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest">
                                Kategori
                            </th>
                            <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest">
                                Harga
                            </th>
                            <th scope="col" class="px-8 py-6 text-left text-[10px] font-black text-gray-500 uppercase tracking-widest">
                                Level Stok
                            </th>
                            <th scope="col" class="px-8 py-6 text-right text-[10px] font-black text-gray-500 uppercase tracking-widest">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($products as $product)
                            <tr class="hover:bg-white/5 transition-all duration-150 group">
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex items-center gap-4">
                                        <div class="flex-shrink-0 w-12 h-12 glass-card rounded-xl flex items-center justify-center border-crimson/20 text-xs font-black text-crimson group-hover:bg-crimson group-hover:text-white transition-all">
                                            #{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-black text-white uppercase tracking-tight">{{ $product->name }}</div>
                                            <div class="text-[10px] font-bold text-gray-500 max-w-[200px] truncate">{{ $product->description }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <span class="px-3 py-1 text-[10px] font-black uppercase tracking-widest rounded-lg bg-white/5 text-gray-400 border border-white/10 group-hover:border-crimson/50 transition-colors">
                                        {{ $product->category }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="text-sm font-black text-white">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap">
                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs font-black {{ $product->stock < 10 ? 'text-crimson animate-pulse' : 'text-gray-400' }}">
                                                {{ $product->stock }} <span class="text-[10px] uppercase">Unit</span>
                                            </span>
                                            <span class="text-[10px] font-bold text-gray-400 uppercase">{{ round(min(($product->stock / 50) * 100, 100)) }}%</span>
                                        </div>
                                        <div class="w-32 h-1.5 bg-white/5 rounded-full overflow-hidden">
                                            <div class="h-full {{ $product->stock < 10 ? 'bg-crimson shadow-[0_0_10px_rgba(220,38,38,0.5)]' : 'bg-gray-600' }} rounded-full transition-all duration-500" style="width: {{ min(($product->stock / 50) * 100, 100) }}%"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 whitespace-nowrap text-right space-x-2">
                                    <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center justify-center w-10 h-10 glass-card text-gray-400 rounded-xl hover:text-white hover:bg-white/10 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    
                                    <div x-data="{ open: false }" class="inline-block">
                                        <button @click="open = true" class="inline-flex items-center justify-center w-10 h-10 glass-card text-crimson/50 rounded-xl hover:text-white hover:bg-crimson transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div x-show="open" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/80 backdrop-blur-md" x-cloak>
                                            <div @click.away="open = false" class="glass-card w-full max-w-md p-10 rounded-[2.5rem] border-crimson/20 shadow-[0_0_50px_rgba(0,0,0,0.5)]">
                                                <div class="w-20 h-20 bg-crimson/10 text-crimson rounded-3xl flex items-center justify-center mb-8 mx-auto crimson-glow">
                                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                </div>
                                                <h3 class="text-2xl font-black text-white text-center mb-2 uppercase tracking-tighter">Hapus Item?</h3>
                                                <p class="text-sm text-gray-500 text-center mb-10 leading-relaxed">
                                                    Anda akan menghapus <span class="text-white font-bold">{{ $product->name }}</span> secara permanen dari sistem <span class="text-crimson font-bold italic">Cokowo Command</span>.
                                                </p>
                                                <div class="flex flex-col gap-3">
                                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full px-8 py-4 bg-crimson text-white font-black rounded-2xl hover:bg-crimson-hover transition-all shadow-lg shadow-crimson/30 uppercase tracking-widest text-xs">
                                                            Konfirmasi Hapus
                                                        </button>
                                                    </form>
                                                    <button @click="open = false" type="button" class="w-full px-8 py-4 glass-card text-gray-400 font-black rounded-2xl hover:text-white transition-all uppercase tracking-widest text-xs">
                                                        Batalkan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-24 text-center">
                                    <div class="w-24 h-24 glass-card rounded-3xl flex items-center justify-center mx-auto mb-8 text-gray-700">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    </div>
                                    <h3 class="text-2xl font-black text-white uppercase tracking-tighter">DATA KOSONG</h3>
                                    <p class="text-gray-500 font-bold mt-2 uppercase tracking-widest text-[10px]">Silahkan tambahkan stok baru ke Cokowo Command.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
                <div class="px-8 py-8 bg-white/5 border-t border-white/5">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
