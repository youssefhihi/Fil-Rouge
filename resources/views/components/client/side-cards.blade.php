@props(['genres','books','authors'])

 <!-- Right sidebar -->
 <div class=" md:block hidden  right-sidebar w-4/12 h-14 relative">
        <!-- First box -->
        <div class="">
        <div class="flex justify-between items-center mb-2 ml-2">
          <h2 class="text-md ">Your Profile </h2>      
        </div>
        <div class="border border-gray-300 rounded bg-white p-3">        
          <div class="p-2 flex justify-between">
            <a href="/profile" class="flex ">
                <div class="w-12 h-12 rounded-full mr-2">
                  @if (Auth::user()->client->image)
                  <img src="{{asset('storage/' . Auth::user()->client->image->path)}}" alt="profile" class="w-full rounded-full">
                    @else
                    @if (Auth::user()->client->gender === 'female')
                    <img src="{{asset('imgs/profileFemale.png')}}" alt="profile" class="w-full">
                    @else                       
                    <img src="{{asset('imgs/profileMale.png')}}" alt="profile" class="w-full">
                    @endif
                    @endif
                </div>
                <div>
                  <h3 class="flex" >
                    <span class="text-gray-700 font-bold hover:text-blue-500 hover:underline ">
                      {{Auth::user()->name}}</span>                 
                  </h3>
                  <p class="time text-sm text-gray-500 flex items-center">
                    <span> Joined {{ date('F Y', strtotime(Auth::user()->client->joined_at)) }}</span>
                  </p>
                </div>
            </a>            
        </div>
        </div>      
        </div>
        <div class="mt-7">
          <!-- Genre -->
          <div class="flex justify-between items-center mb-2 ml-2">
            <h2 class="text-md ">Trending Genre </h2>      
          </div>
  
          <div class="border border-gray-300 rounded bg-white p-3">        
            @foreach ( $genres as $genre)           
            <a href="#" class="flex flex-col gap-1 px-4">
              <a href="{{route('sortGenre',$genre)}}" class="text-md font-semibold text-blue-500 hover:underline"> {{$genre->name}}</a>
              <p class="test-gray-400 text-sm ">more than {{ $genre->books_count }}++ books</p>
            </a>
            <div class="border border-black my-2"></div>
            @endforeach
          </div>
           
        </div>
        <div class="mt-7">
        <div class="flex justify-between items-center mb-2 ml-2">
          <h2 class="text-md ">Trending Books </h2>      
        </div>

        <div class="border border-gray-300 rounded bg-white p-3">        
          <!-- Books -->
          <div class="flex flex-col ">
          <!-- Book 1-->  
          @foreach ( $books as $book)
            
          <a href="" class="flex space-x-4 px-3">
          <img src="{{asset('storage/' . $book->image->path)}}" alt="" class="h-24 w-16" >  
          <div class="flex flex-col gap-2">
            <div class=" flex flex-col ">
              <p class="text-blue-900 hover:underline">{{$book->title}}</p>
              
              <p class="test-gray-400 text-md ml-2">{{$book->author->name}}</p>
            </div>
            <p class="test-gray-400 text-sm ">6 users recently</p>
          </div>
          </a>
          <div class="border border-black my-2"></div>
          @endforeach  
             
        </div>
      </div>
        </div>
        <div class="mt-7">
          <div class="flex justify-between items-center mb-2 ml-2">
            <h2 class="text-md ">Trending Authors</h2>      
          </div>
          <div class="border border-gray-300 rounded bg-white p-3">
            <div   class="flex flex-col ">
              @foreach ( $authors as  $author)
                
              <div class="p-2 flex justify-between">
                <a href="{{route('sortAuthor',$author)}}" class="flex ">
                    <div class="w-12 h-12 rounded-full mr-2">
                      @if ($author->image)
                      <img src="{{asset('storage/' . $author->image->path)}}" alt="profile" class="w-full rounded-full">
                                            @else
                                                @if ($author->gender === 'female')
                                                    <img class="w-full rounded-full" src="{{ asset('imgs/womanAuthor.png') }}" alt="">                                                
                                                @else                                 
                                                    <img class="w-full rounded-full" src="{{ asset('imgs/manAuthor.png') }}" alt="">                                                
                                                @endif
                                            @endif
                    </div>
                    <div>
                      <h3 class="flex" >
                        <span class="text-gray-700 font-bold hover:text-blue-500 hover:underline ">
                          {{$author->name}}</span>                 
                      </h3>
                      <p class="time text-sm text-gray-500 flex items-center">
                        <span> more than {{$author->books_count}}++ books </span>
                      </p>
                    </div>
                </a> 
              </div> 
              <div class="border border-black my-2"></div> 
              @endforeach              
          </div>
          </div>      
          </div>
        </div>       
      </div>