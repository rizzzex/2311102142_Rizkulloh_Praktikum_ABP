<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-indigo-600 rounded-lg shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h2 class="font-black text-2xl text-gray-800 dark:text-gray-100 tracking-tight">
                    {{ __('Inventory Console') }}
                </h2>
            </div>
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-none transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Premium Product
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-[#F8FAFC] dark:bg-[#0F172A] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="mb-6 p-4 bg-emerald-500 text-white rounded-2xl shadow-lg shadow-emerald-200 dark:shadow-none flex items-center justify-between">
                    <span class="font-bold font-sm flex items-center uppercase tracking-wider">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        {{ session('success') }}
                    </span>
                </div>
            @endif

            <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100 dark:border-slate-700">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-900/50">
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Product Identity</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Categorization</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Financials</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Stock Level</th>
                                <th class="px-8 py-6 text-xs font-black text-slate-400 uppercase tracking-[0.2em] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-slate-700">
                            @foreach($products as $product)
                                <tr class="group hover:bg-slate-50/80 dark:hover:bg-slate-900/30 transition-all duration-200">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/40 rounded-xl flex items-center justify-center text-indigo-600 dark:text-indigo-400 font-black text-lg shadow-inner mr-4 group-hover:scale-110 transition duration-300">
                                                {{ substr($product->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-base font-black text-slate-900 dark:text-white leading-tight mb-1">{{ $product->name }}</div>
                                                <div class="text-xs text-slate-500 font-medium max-w-[200px] truncate">{{ $product->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="px-4 py-1.5 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-[10px] font-black uppercase tracking-widest rounded-full border border-slate-200 dark:border-slate-600">
                                            {{ $product->category }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="text-lg font-black text-slate-900 dark:text-white tracking-tight">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                                        <div class="text-[10px] font-bold text-slate-400 uppercase italic">Unit Price</div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center">
                                            <div class="w-full bg-slate-100 dark:bg-slate-700 rounded-full h-2 w-24 mr-3 overflow-hidden shadow-inner">
                                                <div class="h-full rounded-full {{ $product->stock < 10 ? 'bg-rose-500 shadow-[0_0_8px_rgba(244,63,94,0.5)]' : 'bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]' }}" style="width: {{ min(100, $product->stock) }}%"></div>
                                            </div>
                                            <span class="text-sm font-black {{ $product->stock < 10 ? 'text-rose-500' : 'text-slate-700 dark:text-slate-300' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-right space-x-2">
                                        <div class="inline-flex rounded-xl overflow-hidden shadow-sm border border-gray-200 dark:border-slate-600">
                                            <a href="{{ route('products.edit', $product) }}" class="p-2.5 bg-white dark:bg-slate-800 text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/20 transition duration-200" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            
                                            <div x-data="{ open: false }">
                                                <button @click="open = true" class="p-2.5 bg-white dark:bg-slate-800 text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20 transition duration-200" title="Delete">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>

                                                <!-- Delete Modal Interior -->
                                                <div x-show="open" 
                                                     x-transition:enter="transition ease-out duration-300"
                                                     x-transition:enter-start="opacity-0 scale-90"
                                                     x-transition:enter-end="opacity-100 scale-100"
                                                     x-transition:leave="transition ease-in duration-200"
                                                     x-transition:leave-start="opacity-100 scale-100"
                                                     x-transition:leave-end="opacity-0 scale-90"
                                                     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm" 
                                                     style="display: none;">
                                                    <div class="bg-white dark:bg-slate-800 rounded-3xl max-w-sm w-full p-8 shadow-2xl border border-slate-200 dark:border-slate-700">
                                                        <div class="w-20 h-20 bg-rose-100 dark:bg-rose-900/40 text-rose-600 dark:text-rose-400 rounded-full flex items-center justify-center mx-auto mb-6">
                                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                        </div>
                                                        <h3 class="text-xl font-black text-slate-900 dark:text-white text-center mb-2 uppercase tracking-tight">Hapus Produk?</h3>
                                                        <p class="text-slate-500 dark:text-slate-400 text-center text-sm font-medium leading-relaxed mb-8">
                                                            Anda yakin ingin menghapus <span class="font-black text-rose-500">"{{ $product->name }}"</span>? Tindakan ini tidak dapat dibatalkan.
                                                        </p>
                                                        <div class="flex flex-col space-y-3">
                                                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="w-full py-4 bg-rose-600 hover:bg-rose-700 text-white font-black rounded-2xl shadow-lg shadow-rose-200 dark:shadow-none transition duration-200">
                                                                    YA, HAPUS SEKARANG
                                                                </button>
                                                            </form>
                                                            <button @click="open = false" class="w-full py-4 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-700 dark:text-white font-black rounded-2xl transition duration-200">
                                                                BATALKAN
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($products->hasPages())
                    <div class="px-8 py-6 bg-slate-50 dark:bg-slate-900/50 border-t border-gray-100 dark:border-slate-700">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>

            @if($products->isEmpty())
                <div class="mt-12 text-center py-20 bg-white dark:bg-slate-800 rounded-[2.5rem] border border-dashed border-slate-300 dark:border-slate-700 shadow-xl">
                    <div class="w-24 h-24 bg-slate-100 dark:bg-slate-900/50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-2 tracking-tight uppercase">Belum Ada Produk</h3>
                    <p class="text-slate-500 font-medium mb-8">Mulailah dengan menambahkan produk pertama ke dalam inventaris Toko Pak Cokomi.</p>
                    <a href="{{ route('products.create') }}" class="inline-flex items-center px-8 py-3 bg-indigo-600 text-white font-black rounded-2xl shadow-xl shadow-indigo-200 dark:shadow-none transition duration-300 hover:scale-105">
                        TAMBAH PRODUK BARU
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
