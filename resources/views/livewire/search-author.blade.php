<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">
        <input wire:model.live="search" type="text" placeholder="Search author..." class="bg-gray-200 text-black px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800"/>
                    <div class="ml-3 cursor-pointer" onclick="openAddAuthor()">
                        <x-icon name="add"/>
                    </div>
                </div> 
                <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3 textcenter text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Books Number
                            </th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Operations  
                            </th>
                            
                        </tr>
                    </thead>
                        <tbody class="bg-white divide-y divide-gray-200">   
                        @foreach ($authors as $author)
                            <tr class="hover:shadow-sm hover:bg-gray-100 duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-12 w-12">
                                            @if ($author->image)
                                                <img class="h-12 w-12 rounded-full" src="{{ asset('storage/'. $author->image->path) }}" alt="">                                                
                                            @else
                                                @if ($author->gender === 'female')
                                                    <img class="h-12 w-12 rounded-full" src="{{ asset('imgs/womanAuthor.png') }}" alt="">                                                
                                                @else                                 
                                                    <img class="h-12 w-12 rounded-full" src="{{ asset('imgs/manAuthor.png') }}" alt="">                                                
                                                @endif
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                    {{$author->name}}
                                            </div>
                                        </div>
                                    </div>
                                </td>  
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    4 books
                                </td>
                                <td class="px-6 py-4 flex justify-center space-x-3">
                                    <form id="deleteFormAuthor{{$author->id}}" action="{{ route('authors.destroy', $author) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteButtonAuthor" data-index="{{$author->id}}"><x-icon name="delete"/></button>
                                    </form>
                                    
                                    
                                    <a href="{{ route('authors.edit', $author) }}"><x-icon name="update"/></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


</div>
