<x-client-layout>
@section('header')
    <x-client.navbar page="books" /> 
    @endsection

    <div class="lg:w-6/12 w-full mx-2 ">
            <div class=" w-full flex flex-col gap-7  bg-white p-4 rounded-md"> 
              @forelse ($books as $book)                
              <div class="flex space-x-10 w-full border border-black rounded-md p-2">
                  <a href="{{route('book.details', $book)}}" class="w-1/4">
                      <img src="{{asset('storage/' . $book->image->path)}}" alt="">
                  </a>
                  <div class="flex flex-col gap-5  w-3/4">
                      <div class="flex flex-col gap-4">
                          <p class="text-xl font-bold">{{$book->title}}</p>
                          <p class="text-md text-gray-600 px-4">{{$book->author->name}}</p>
                      </div>    
                      <div class="flex space-x-3 ">
                      <div class="flex text-xl p-1 gap-1 ">
                         @for ($i = 0; $i < 5; $i++)
                            @if ($i < intval($book->reviews->avg('starsCount')))
                                <i class="fas fa-star text-yellow-600"></i>
                            @else
                                <i class="far fa-star" ></i>
                            @endif
                        @endfor
                        </div>
                        <div>
                          <p >{{$book->reviews->count()}}<span class="text-sm font-semibold"> reviews</span> </p>
                        </div>
                      </div>
                      <div class="flex justify-end mr-2">
                        <a href="{{route('reservePage',$book->ISBN)}}" class="bg-black text-white border-xl flex space-x-2 rounded-xl py-2 px-8">
                             <i class="fas fa-shopping-basket mt-1"></i> <span>Reserve</span>
                        </a>
                      </div>
                  </div>
              </div>
              
              @empty
<div>noooooooo</div>
    
@endforelse
          


            </div>      
        </div>
    <x-client.side-cards :authors="$authors" :genres="$genres" :books="$topBooks"/>

</x-client-layout>