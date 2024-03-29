


  


<div>
    <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">
        <input wire:model.live="search" type="text" placeholder="Search genre..." class="bg-gray-200 text-black px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800"/>
                    <div class="ml-3 cursor-pointer" onclick="openAddGenre()">
                        <x-icon name="add"/>
                    </div>
                </div> 
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200 mt-6 ">
                        <thead class="bg-gray-300 ">
                            <tr >
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-800 uppercase tracking-wider">
                                    Operation
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">   
                        @foreach ($genres as $genre)
                            <tr class="hover:shadow-sm hover:bg-gray-100 duration-300">
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm text-gray-900">#{{$loop->index}}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="text-sm font-medium text-gray-900">{{$genre->name}}</div>
                                </td>
                                <td class="px-6 py-4 flex justify-center space-x-3">
                                    <form id="deleteForm{{$genre->id}}" action="{{ route('genres.destroy', $genre) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteButton" data-index="{{$genre->id}}"><x-icon name="delete"/></button>
                                    </form>
                                    
                                    <button type="button" onclick ="OpenUpdateGenre('{{$genre->id}}')"><x-icon name="update"/></button>
                                </td>
                            </tr>
                            

                        <div id="updateGenre{{$genre->id}}" class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
                            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                                    <!-- Form to add genre -->
                                    <form method="POST" id="putGenreForm{{$genre->id}}"  action="{{route('genres.update',$genre) }}" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                        <div class="flex flex-col">
                                        <label for="name" class="text-md font-semibold font-normal mb-1 px-4"> new name</label>
                                        <x-input class="block mt-1 w-full" type="text" name="name" id="putGenre{{$genre->id}}" value="{{$genre->name}}" />
                                        <div class="flex space-x-8 justify-end mt-5">
                                            <p onclick="CloseUpdateGenre('{{$genre->id}}')" class=" cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</p>
                                            <button type="submit" class="cursor-pointer mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach

                        </tbody>
                    </table>


        

</div>