<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">           
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back to Menus</a>
            </div>
            <div class="m-2 p-2 bg-slate-100">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-4 sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                          <input type="text" name="title" id="title" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal">
                        </div>
                      </div>
                      <div class="mb-4 sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="image" name="image" accept="image/png, image/gif, image/jpeg" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal mt-1" type="file" id="image" name="image" />
                      </div>
                      <div class="mb-4 sm:col-span-6 pt-5">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1">
                          <input type="number" min="0.00" max="10000.00" step="0.01" name="price" id="price" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal">
                        </div>
                      </div>
                      <div class="mb-4 sm:col-span-6 pt-5">
                        <label for="description" class="block text-sm font-medium text-gray-700">Categories</label>
                        <div class="mt-1">
                          <select multiple name="categories[]" id="categories" class="form-multiselect block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal mt-1">
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="mb-4 sm:col-span-6 pt-5">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                          <textarea rows="3" name="description" id="description" class="shadow-sm focus:ring-indigo-500 w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal mt-1" ></textarea>
                        </div>
                      </div>
                      <div mt-6 p-4>
                        <button type="submit" class="px-6 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
