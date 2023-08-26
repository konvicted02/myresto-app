<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">           
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back to categories</a>
            </div>
            <div class="m-2 p-2 bg-slate-100">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form 
                      method="POST" 
                      action="{{ route('admin.categories.update', $category->id) }}" 
                      enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="mb-4 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                          <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="block w-full @error('name') border-red-500 @enderror"
                            value="{{ $category->name }}">
                        </div>
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-4 sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <div>
                            <img src="{{ Storage::url($category->image) }}" alt="Image of the category" class="w-16">
                        </div>
                        <div class="mt-1">
                            <input
                                type="file" 
                                id="image" 
                                name="image" 
                                accept="image/png, image/gif, image/jpeg" 
                                class="relative mt-1 block w-full min-w-0 flex-auto rounded border border-solid bg-clip-padding px-0 py-[0.32rem] text-base font-normal text-neutral-700  file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary @error('image') border-red-500 @enderror" 
                                value="{{ $menu->image }}">
                            @error('image')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>

                      <div class="mb-4 sm:col-span-6 pt-5">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                          <textarea 
                            rows="3" 
                            name="description" 
                            id="description" 
                            class="shadow-sm focus:ring-indigo-500 w-full @error('description') border-red-500 @enderror" >{{ $category->description }}</textarea>
                          @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div mt-6 p-4>
                        <button 
                          type="submit" 
                          class="px-6 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white ">
                          Update
                        </button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
