<x-admin-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">           
          <div class="flex m-2 p-2">
              <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Back to Menus</a>
          </div>
          <div class="m-2 p-2 bg-slate-100">
              <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                  <form method="POST" action="{{ route('admin.tables.update',$table->id) }}" >
                    @csrf
                    @method('PUT')
                    <div class="mb-4 sm:col-span-6">
                      <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                      <div class="mt-1">
                        <input 
                          type="text" 
                          name="name" 
                          id="name" 
                          class="@error('name') border-red-500 @enderror block w-full appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal"
                          value="{{ $table->name }}">
                      </div>
                      @error('name')
                          <div class="text-red-500">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-4 sm:col-span-6 pt-5">
                      <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                      <div class="mt-1">
                        <input 
                          type="number" 
                          min="1"  
                          step="1" 
                          name="number" 
                          id="number" 
                          class=" @error('number') border-red-500 @enderror block w-full appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal"
                          value="{{ $table->number }}">
                      </div>
                      @error('guest_number')
                        <div class="text-red-500">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-4 sm:col-span-6 pt-5">
                      <label for="guest_number" class="block text-sm font-medium text-gray-700">Guests number</label>
                      <div class="mt-1">
                        <input 
                          type="number" 
                          min="1" 
                          max="10" 
                          step="1" 
                          name="guest_number" 
                          id="guest_number" 
                          class=" @error('guest_number') border-red-500 @enderror block w-full appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal"
                          value="{{ $table->guest_number }}">
                      </div>
                      @error('guest_number')
                        <div class="text-red-500">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-4 sm:col-span-6 pt-5">
                      <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                      <div class="mt-1">
                        <select  
                          name="location" 
                          id="location" 
                          class="form-multiselect block w-full appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal mt-1">
                          @foreach (App\Enums\TableLocation::cases() as $location )
                            <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>{{ $location->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="mb-4 sm:col-span-6 pt-5">
                      <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                      <div class="mt-1">
                        <select  
                          name="status" 
                          id="status" 
                          class="form-multiselect block w-full appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal mt-1">
                            @foreach (App\Enums\TableStatus::cases() as $status )
                              <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>{{ $status->name }}</option>
                            @endforeach
                        </select>
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
