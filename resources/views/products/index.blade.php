<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between w-full">
                    <div class="p-6 text-gray-900 font-bold text-lg">
                        {{ __("Products List") }}
                    </div>
                    <div class="p-6">
                        <a class="ml-4 my-1 p-4 text-gray-900 bg-white border border-slate-600 rounded-md" href="{{ route('product.create') }}">
                            Add New Product
                        </a>
                    </div>
                </div>
                <div class="p-6 my-4">
                    @if(session()->has('success'))
                        <div class="p-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                            <div class="block sm:inline">
                                <span>{{ session('success') }}</span>
                                    
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full">
                        <thead>
                          <tr>
                            <th class="border border-gray-100 bg-slate-600 text-white font-bold text-md px-4 py-2">ID</th>
                            <th class="border border-gray-100 bg-slate-600 text-white font-bold text-md px-4 py-2">Name</th>
                            <th class="border border-gray-100 bg-slate-600 text-white font-bold text-md px-4 py-2">Quantity</th>
                            <th class="border border-gray-100 bg-slate-600 text-white font-bold text-md px-4 py-2">Price</th>
                            <th class="border border-gray-100 bg-slate-600 text-white font-bold text-md px-4 py-2">Description</th>
                            <th class="border border-gray-100 bg-slate-600 text-white font-bold text-md px-4 w-[200px] py-2">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                
                                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : '' }}">
                                    <td class="border px-4 py-2">{{ $product->id }}</td>
                                    <td class="border px-4 py-2">{{ $product->name }}</td>
                                    <td class="border px-4 py-2">{{ $product->qty }}</td>
                                    <td class="border px-4 py-2">{{ $product->price }}</td>
                                    <td class="border px-4 py-2">{{ $product->description }}</td>
                                    <td class="border px-0 py-2 flex justify-center space-x-3 w-[200px]">
                                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="px-4 py-2 border border-slate-600 bg-white text-gray-900 rounded-md">
                                            Edit
                                        </a>
                                        <div class="px-4 py-2 bg-red-600 text-white rounded-md cursor-pointer">
                                            <form method="post" action="{{ route('product.delete', ['product' => $product]) }}">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="cursor-pointer" value="Delete" />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="border px-4 py-2">No Products Found</td>
                                </tr>
                            @endforelse
                          {{-- <tr>
                            <td class="border px-4 py-2">Intro to CSS</td>
                            <td class="border px-4 py-2">Adam</td>
                            <td class="border px-4 py-2">858</td>
                          </tr>
                          <tr class="bg-gray-100">
                            <td class="border px-4 py-2">A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
                            <td class="border px-4 py-2">Adam</td>
                            <td class="border px-4 py-2">112</td>
                          </tr>
                          <tr>
                            <td class="border px-4 py-2">Intro to JavaScript</td>
                            <td class="border px-4 py-2">Chris</td>
                            <td class="border px-4 py-2">1,280</td>
                          </tr> --}}
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>