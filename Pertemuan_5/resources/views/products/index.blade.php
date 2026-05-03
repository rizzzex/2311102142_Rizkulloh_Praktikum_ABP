<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 w-full">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl shadow-xl shadow-primary-900/40">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-black text-3xl text-white tracking-tight leading-none mb-1">
                        {{ __('Inventory Console') }}
                    </h2>
                    <p class="text-zinc-500 text-sm font-bold tracking-widest uppercase">Pak Cokomi & Mas Wowo Management</p>
                </div>
            </div>
            
            <a href="{{ route('products.create') }}" class="group relative inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-500 text-white text-sm font-black rounded-2xl transition-all duration-300 shadow-lg shadow-primary-900/30 overflow-hidden">
                <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span class="relative z-10 uppercase tracking-wider">Add New Product</span>
            </a>
        </div>
    </x-slot>

    <div class="space-y-8">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" 
                 class="p-4 bg-primary-600/10 border border-primary-600/20 text-primary-500 rounded-2xl flex items-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span class="font-bold text-sm tracking-wide">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-zinc-950 border border-zinc-900 rounded-[2.5rem] shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-900/50">
                            <th class="px-8 py-6 text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em]">Product Info</th>
                            <th class="px-8 py-6 text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em]">Category</th>
                            <th class="px-8 py-6 text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em]">Price</th>
                            <th class="px-8 py-6 text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em]">Stock</th>
                            <th class="px-8 py-6 text-[10px] font-black text-zinc-500 uppercase tracking-[0.3em] text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-900">
                        @foreach($products as $product)
                            <tr class="group hover:bg-zinc-900/30 transition-all duration-300">
                                <td class="px-8 py-6">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-zinc-900 rounded-xl flex items-center justify-center text-primary-500 font-black text-xl border border-zinc-800 group-hover:border-primary-500/50 transition duration-500">
                                            {{ substr($product->name, 0, 1) }}
                                        </div>
                                        <div class="ml-5">
                                            <div class="text-lg font-black text-white tracking-tight mb-0.5">{{ $product->name }}</div>
                                            <div class="text-xs text-zinc-500 font-bold max-w-[200px] truncate">{{ $product->description }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="inline-flex items-center px-3 py-1 bg-zinc-900 text-zinc-400 text-[10px] font-black uppercase tracking-widest rounded-lg border border-zinc-800">
                                        {{ $product->category }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="text-lg font-black text-white tracking-tighter">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-24 bg-zinc-900 rounded-full h-1.5 overflow-hidden border border-zinc-800">
                                            <div class="h-full rounded-full {{ $product->stock < 10 ? 'bg-primary-600' : 'bg-emerald-500' }}" style="width: {{ min(100, $product->stock) }}%"></div>
                                        </div>
                                        <span class="text-sm font-black {{ $product->stock < 10 ? 'text-primary-500' : 'text-zinc-400' }}">{{ $product->stock }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('products.edit', $product) }}" class="p-2 bg-zinc-900 text-zinc-400 hover:text-white hover:bg-zinc-800 rounded-lg transition duration-300 border border-zinc-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        
                                        <div x-data="{ open: false }">
                                            <button @click="open = true" class="p-2 bg-zinc-900 text-primary-500 hover:text-white hover:bg-primary-600 rounded-lg transition duration-300 border border-zinc-800">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>

                                            <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm" style="display: none;">
                                                <div class="bg-zinc-950 border border-zinc-900 p-8 rounded-[2.5rem] max-w-sm w-full shadow-2xl">
                                                    <h3 class="text-2xl font-black text-white mb-4 uppercase tracking-tighter italic">Delete Item?</h3>
                                                    <p class="text-zinc-500 font-bold text-sm mb-8 leading-relaxed">Are you sure you want to delete <span class="text-primary-500">"{{ $product->name }}"</span>? This action is permanent.</p>
                                                    <div class="grid grid-cols-2 gap-4">
                                                        <button @click="open = false" class="py-3 bg-zinc-900 hover:bg-zinc-800 text-white font-black rounded-xl transition uppercase tracking-widest text-[10px]">Cancel</button>
                                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="w-full py-3 bg-primary-600 hover:bg-primary-500 text-white font-black rounded-xl shadow-lg shadow-primary-900/30 transition uppercase tracking-widest text-[10px]">Delete</button>
                                                        </form>
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
                <div class="px-8 py-6 bg-zinc-900/30 border-t border-zinc-900">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
