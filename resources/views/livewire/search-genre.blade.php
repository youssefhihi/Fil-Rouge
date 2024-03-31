


  


<div>
    <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">
                    <x-search-input/>
                    <div class="ml-3 cursor-pointer" onclick="openAddGenre()">
                        <x-icon name="add"/>
                    </div>
                </div> 
                    <table class="min-w-full overflow-x-scroll divide-y divide-gray-200 mt-6 ">
                        <thead class="bg-gray-300 ">
                            <tr>
                                <x-table.th name="ID"/> 
                                <x-table.th name="Name"/> 
                                <x-table.th name="Operations"/>                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">   
                        @foreach ($genres as $genre)
                            <x-table.tr>
                                <x-table.td>
                                    <div class="text-sm text-gray-900">#{{$loop->index}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$genre->name}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="flex justify-center space-x-3">
                                    <form id="deleteForm{{$genre->id}}" action="{{ route('genres.destroy', $genre) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteButton" data-index="{{$genre->id}}"><x-icon name="delete"/></button>
                                    </form>                 
                                    <a href="{{route('genres.edit',$genre)}}"><x-icon name="update"/></a>
                                    </div>
                                </x-table.td>
                            </x-table.tr>                  
                        @endforeach
                        </tbody>
                    </table>


        

</div>