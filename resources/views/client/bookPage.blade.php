<x-client-layout>
@section('header')
    <x-client.navbar page="books" /> 
@endsection
 
<div class="w-full m-auto mt-10 flex flex-col gap-5">
    <x-success-message/>
        <x-error-message/>
        <div class="flex flex-col md:flex-row space-y-5 md:space-y-0 w-full bg-white rounded-md p-5">
    <div class="w-full md:w-1/4 lg:pr-5">
        <img src="{{asset('storage/' . $book->image->path)}}" alt="" class="w-full h-auto">
    </div>
    <div class="flex flex-col gap-5 w-full md:w-3/4">
        <p class="text-3xl font-bold text-center mb-2">{{$book->title}}</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex flex-col gap-2 lg:gap-7 ">
                <p class="text-xl font-medium">Author: <span class="text-gray-700 font-normal hover:underline">{{$book->author->name}}</span></p>
                <p class="text-xl font-medium">Genre: <span class="text-gray-700 font-normal hover:underline">{{$book->genre->name}}</span></p> 
                <p class="text-xl font-medium">Language: <span class="text-gray-700 font-normal ">{{$book->language}}</span></p> 
            </div>
            <div class="flex flex-col gap-2 lg:gap-7  mt-2 lg:mt-0">
                <p class="text-xl font-medium">Publication Date: <span class="text-gray-700 font-normal ">{{$book->publicationDate}}</span></p> 
                <p class="text-xl font-medium">Edition: <span class="text-gray-700 font-normal ">{{$book->edition}}</span></p> 
                <p class="text-xl font-medium">Number of Pages: <span class="text-gray-700 font-normal ">{{$book->PagesNumber}} pages</span></p> 
            </div>
        </div>
        <p class="text-xl font-medium">Description: <span class="text-gray-700 font-normal ">{{$book->description}}</span></p> 
        <div class="flex flex-col lg:flex-row lg:justify-between items-center px-4 md:px-10">
            <div onclick="openReview()" class="cursor-pointer flex  items-center lg:space-x-3">
                <div class="flex text-xl p-1 gap-1">                      
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $stars)
                            <i class="fas fa-star text-yellow-600"></i>
                        @else
                            <i class="far fa-star" ></i>
                        @endif
                    @endfor
                </div>                            
                <p>{{$book->reviews->count()}}<span class="text-sm font-semibold">reviews</span></p>
            </div>
            <div class="flex lg:justify-end w-full justify-center ">
                <a href="{{route('reservePage',$book->ISBN)}}" class=" mt-5 lg:mt-0  inline-block w-full max-w-lg lg:max-w-xs  text-center py-2 px-6 rounded-l-xl border border-black rounded-t-xl bg-black hover:bg-white hover:text-black focus:text-gray-700 focus:bg-gray-200 text-white font-bold leading-loose transition duration-200">
                    <i class="fas fa-shopping-basket"></i>
                    <span class="">Reserve</span>
                </a>
            </div>
        </div>
    </div>
</div>


            <div class="w-11/12 m-auto mt-20 flex justify-evenly">
    <x-client.articles-bookPage :posts="$posts"/>

    <x-client.side-cards :authors="$authors" :genres="$genres" :books="$topBooks"/></div>

    <div id="review" class=" hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                               <h1 class="font-bold text-center text-xl  ">Rate this book.</h1>
                    @if ($clientRate->count() > 0)
                               <p class="text-md text-center mt-3">You want to update your rating  about <span class="font-semibold text-gray-600">{{$book->title}}</span></p>
                   <form method="POST"  action="{{route('review.update', $clientRate->first())}}" class="flex flex-col gap-8" >
                   @csrf
                   @method('patch')
                   <input type="hidden" name="book_id" value="{{$book->id}}">
                   <div class="rating flex justify-center ">
                   @for ($i = 5; $i > 0; $i--)
                        <input value="{{$i}}" name="starsCount" id="star{{$i}}" type="radio" {{$i == $clientRate->first()->starsCount ? 'checked' : ''}}>
                        <label title="text" for="star{{$i}}"></label>
                    @endfor                     
                   </div>
                     <button class="bg-black text-white rounded-xl py-1 hover:bg-rgay-800">
                      Edit Rate
                     </button>
                    </form>
                   @else
                   <p class="text-md text-center mt-3">Let others know what you think about <span class="font-semibold text-gray-600">{{$book->title}}</span></p>
                   <form method="POST"  action="{{route('review.store') }}" class="flex flex-col gap-8" >
                   @csrf
                   @method('POST')
                   <input type="hidden" name="book_id" value="{{$book->id}}">
                   <div class="rating flex justify-center ">
                       <input value="5" name="starsCount" id="star5" type="radio">
                       <label title="text" for="star5"></label>
                       <input value="4" name="starsCount" id="star4" type="radio">
                       <label title="text" for="star4"></label>
                       <input value="3" name="starsCount" id="star3" type="radio">
                       <label title="text" for="star3"></label>
                       <input value="2" name="starsCount" id="star2" type="radio">
                       <label title="text" for="star2"></label>
                       <input value="1" name="starsCount" id="star1" type="radio">
                       <label title="text" for="star1"></label>
                   </div>
                     <button class="bg-black text-white rounded-xl py-1 hover:bg-rgay-800">
                       Rate
                     </button>
               </form>
                   @endif
            </div>
        </div>
</div>
<style>

.rating:not(:checked) > input {
  position: absolute;
  appearance: none;
}

.rating:not(:checked) > label {
    float: right;
  cursor: pointer;
  font-size: 35px;
  color: #666;
}

.rating:not(:checked) > label:before {
  content: '★';
}

.rating > input:checked + label:hover,
.rating > input:checked + label:hover ~ label,
.rating > input:checked ~ label:hover,
.rating > input:checked ~ label:hover ~ label,
.rating > label:hover ~ input:checked ~ label {
  color: #e58e09;
}

.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label {
  color: #ff9e0b;
}

.rating > input:checked ~ label {
  color: #ffa723;
}




</style>
<script>
    function openReview(){
        document.getElementById('review').classList.remove('hidden');
    }
  

</script>
</x-client-layout>