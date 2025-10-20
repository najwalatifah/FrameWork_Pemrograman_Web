@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="mb-5 text-2xl font-bold">Edit Product</h2>
                        <x-auth-session-status class="mb-4" :status="session('success')" />

                        <form action="{{ route('products.update', $products->id) }}" method="POST" class="space-y-4">
                            @csrf
                            @method('post')

                            <div class="form-group">
                                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" id="product_name" name="product_name" value="{{ $products->product_name }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                                <select id="unit" name="unit" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="kg" {{ $products->unit == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                    <option value="ltr" {{ $products->unit == 'ltr' ? 'selected' : '' }}>Liter (ltr)</option>
                                    <option value="pcs" {{ $products->unit == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                                    <option value="box" {{ $products->unit == 'box' ? 'selected' : '' }}>Box</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <input type="text" id="type" name="type" value="{{ $products->type }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="information" class="block text-sm font-medium text-gray-700">Information</label>
                                <textarea id="information" name="information" rows="3" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $products->information }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" id="qty" name="qty" value="{{ $products->qty }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="producer" class="block text-sm font-medium text-gray-700">Producer</label>
                                <input type="text" id="producer" name="producer" value="{{ $products->producer }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                            <a href="{{ route('products.index') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-transparent rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Kembali</a>
                        </form>
                    </div>

                    @vite('resources/js/app.js')
                </div>
            </div>
        </div>
    </div>
@endsection
