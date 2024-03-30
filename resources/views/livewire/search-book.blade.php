<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="flex justify-between p-2 items-center flex-row w-full bg-black rounded-md">
        <input wire:model.live="search" type="text" placeholder="Search author..." class="bg-gray-200 text-black px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-800"/>
        <a href="{{route('books.create')}}" class="ml-3">
            <x-icon name="add"/>
        </a>
    </div> 

    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Books
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    operations
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                @forelse ( $books as $book)
                    
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 ">
                            <img class="h-16 w-14 " src="{{asset('storage/'. $book->image->path)}}" alt="">
                        </div>
                            <div class="text-sm font-medium text-gray-900 ml-4">
                               {{$book->title}}
                            </div>
                    </div>
                </td>
            
                <td class="px-6 py-4 whitespace-nowrap">
                   {{$book->genre->name}}
                    
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                   {{$book->quantity}}                
                </td>
                <td class="px-6 py-8 flex  space-x-3 whitespace-nowrap text-sm text-gray-500">
                    <x-icon name="delete"/>
                    <a href="{{route('books.edit',$book)}}"><x-icon name="update"/> </a> 
                    <x-icon name="details"/>  
                </td>               
                @empty
                
                <div class="text-xl text-center">no books found</div>                
                @endforelse
            </tr>
  
        </tbody>
    </table>

</div>
