<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between w-full">
                    <div class="p-6 text-gray-900 font-bold text-lg">
                        {{ __("Edit Product") }}
                    </div>
                    <div class="p-6">
                        <a class="ml-4 my-1 p-4 text-gray-900 bg-white border border-slate-600 rounded-md" href="{{ route('product.index') }}">
                            Products List
                        </a>
                    </div>
                </div>

                <div class="p-6 text-gray-900 mb-4">
                    @if($errors->any())
                        <div class="p-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <div class="block sm:inline">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                    
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                </span>
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('product.update', ['product' => $product]) }}">
                        @csrf
                        @method('put')
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block my-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" value="{{ $product->name }}" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <!-- Quantity -->
                        <div class="mt-4">
                            <x-input-label for="qty" :value="__('Quantity')" />
                            <x-text-input id="qty" class="block my-1 w-full" type="number" name="qty" :value="old('qty')" value="{{ $product->qty }}" required autocomplete="off" />
                            <x-input-error :messages="$errors->get('qty')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block my-1 w-full" type="text" name="price" :value="old('price')" required autofocus autocomplete="off" value="{{ $product->price }}" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block my-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="off" value="{{ $product->description }}" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4 my-1">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
