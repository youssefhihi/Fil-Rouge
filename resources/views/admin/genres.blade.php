
<x-admin-layout>
    <!-- CONTENT -->
    <x-success-alert/>
    <x-error-alert :messages="$errors->all()" />
 <title-pages name="Genres"/>
 
            <livewire:search-genre />

            <div id="addGenre" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                    <!-- Form to add genre -->
                    <form method="POST" id="genreForm" action="{{route('genres.store') }}" class="space-y-4">
                    @csrf
                    @method('POST')
                        <div class="flex flex-col">
                        <label for="name" class="text-md font-semibold font-normal mb-1 px-4"> new genre</label>
                        <x-input id="genre" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                        <p id="messageError" class="hidden text-red-400 text-sm">Please use letters only, Avoid numbers or special characters.</p>
                            <div class="flex space-x-8 justify-end mt-5">
                            <p onclick="closeAddGenre()" class=" cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</p>
                            <button type="submit" class="cursor-pointer mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        



           

</x-admin-layout>