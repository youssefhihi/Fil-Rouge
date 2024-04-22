<x-client-layout>
@section('header')
    <x-client.navbar page="books" /> 
    @endsection
     <!-- CONTENT -->  
  
<div class="lg:w-6/12 w-full mx-5 lg:2 mb-24 lg:mb-0  ">
    <x-success-message/>
    <x-error-message/>
    <div class=" w-full flex flex-col gap-7  bg-white p-4 rounded-md"> 
              @foreach ($books as $book)                
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
                        <div class="flex text-xl p-1 gap-1 text-yellow-600">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star-half  "></i>
                        </div>
                        <div>
                          <p >12<span class="text-sm font-semibold"> reviews</span> </p>
                        </div>
                      </div>
                      <div class="flex justify-end mr-2">
                        <a href="{{route('reservePage',$book->ISBN)}}" class="bg-black text-white border-xl flex space-x-2 rounded-xl py-2 px-8">
                             <i class="fas fa-shopping-basket mt-1"></i> <span>Reserve</span>
                        </a>
                      </div>
                  </div>
              </div>
              
              
              
              
              
    <div id="reserve{{$book->id}}" class=" hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                <div class="flex justify-end">
                   close
                </div>
                <div class="flex flex-col gap-3">
                    <p class="text-left font-normal font-semibold">Your Order</p>
                    <div class="border border-brown-300"></div>
                    <div class="flex justify-between h-16 ">
                        <img src="{{asset('storage/' . $book->image->path)}}" alt="" class="w-14">
                        <p class="text-xl font-semibold">{{$book->title}}</p>
                    </div>
                    <div class="border border-brown-300"></div>              
                </div>
                <form method="POST" action="{{route('reservation.store')}}" class="space-y-4">
                @csrf
                @method('POST')
                <input type="hidden" name="book_id" value="{{$book->id}}">
                    <!-- Start Date -->
                    <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="startDate" id="startDate" class="block w-full mt-1 rounded-md shadow-sm focus:ring-brown-500 focus:border-indigo-500 sm:text-sm">
                    <x-error-input :messages="$errors->get('startDate')" class="mt-2" />
                    <!-- Return Date -->
                    <label for="returnDate" class="block text-sm font-medium text-gray-700">Return Date</label>
                    <input type="date" name="returnDate" id="returnDate" class="block w-full mt-1 rounded-md shadow-sm focus:ring-brown-500 focus:border-indigo-500 sm:text-sm">                     
                    <x-error-input :messages="$errors->get('returnDate')" class="mt-2" />
                    <x-textarea name="message" label="message"/>
                    <x-error-input :messages="$errors->get('message')" class="mt-2" />
                    <button type="submit">ok</button>
                </form>
            </div>
    </div>

@endforeach
</div>      
</div>
<script>
    
    function openReserve(id) {
      document.getElementById(`reserve${id}`).classList.remove('hidden');
      }
      
      function CloseUpdateGenre(id) {
      document.getElementById(`updateGenre${id}`).classList.add('hidden');
      }

</script>

<x-client.side-cards :authors="$authors" :genres="$genres" :books="$topBooks"/>
</x-client-layout>