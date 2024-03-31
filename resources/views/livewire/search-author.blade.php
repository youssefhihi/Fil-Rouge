<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

                <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">
                    <x-search-input/>
                    <div class="ml-3 cursor-pointer" onclick="openAddAuthor()">
                        <x-icon name="add"/>
                    </div>
                </div> 
                <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table.th name="Author"/> 
                            <x-table.th name="Books Number"/> 
                            <x-table.th name="Operations"/> 
                        </tr>
                    </thead>
                        <tbody class="bg-white divide-y divide-gray-200">   
                        @foreach ($authors as $author)
                            <x-table.tr>
                            <x-table.td>
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
                            </x-table.td> 
                            <x-table.td> 
                                    4 books
                            </x-table.td> 
                            <x-table.td> 
                                <div class=" flex justify-center space-x-3">
                                    <form id="deleteFormAuthor{{$author->id}}" action="{{ route('authors.destroy', $author) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="deleteButtonAuthor" data-index="{{$author->id}}"><x-icon name="delete"/></button>
                                    </form>                               
                                    <a href="{{ route('authors.edit', $author) }}"><x-icon name="update"/></a>
                                </div>
                            </x-table.td> 
                        </x-table.tr>
                        @endforeach

                        </tbody>
                    </table>


</div>
