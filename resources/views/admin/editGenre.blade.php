<x-admin-layout>

                        <div id="addGenre" class=" min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
                            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                                    <!-- Form to add genre -->
                                    <form method="POST" id="genreForm"  action="{{route('genres.update',$genre) }}" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                        <div class="flex flex-col">
                                        <label for="name" class="text-md font-semibold font-normal mb-1 px-4"> new name</label>
                                        <x-input id="genre" class="block mt-1 w-full" type="text" name="name" value="{{$genre->name}}" />
                                        <p id="messageError" class="hidden text-red-400 text-sm">Please use letters only, Avoid numbers or special characters.</p>
                                        <div class="flex space-x-8 justify-end mt-5">
                                            <a href="/dashboard/genres" class=" cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</a>
                                            <button type="submit" class="cursor-pointer mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <x-error-input :messages="$errors->get('name')" />
</x-admin-layout>
