<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('admin.permissions.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Permissions index</a>
                <div class="bg-gray-100 p-6">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <!-- Form Section -->
                        <form method="POST" action="{{ route('admin.permissions.store') }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <!-- Post name -->
                                <label for="name" class="block text-sm font-medium text-gray-700">Permission name</label>
                                <div class="mt-1">
                                    <input type="text" id="name" wire:model.lazy="name" name="name" class="block w-full transition duration-150 ease-in-out sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Submit Button (Optional, not shown in the image but typically included) -->
                            <div class="mt-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
