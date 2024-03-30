


  


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
                                    <a href="{{route('genres.edit',$genre)}}"><x-icon name="update"/></a>
                                </td>
                            </tr>
                            

                        
                        @endforeach

                        </tbody>
                    </table>


        

</div>