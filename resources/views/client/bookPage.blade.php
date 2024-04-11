<x-client-layout>
@section('header')
    <x-client.navbar page="books" /> 
@endsection
 

<div class="w-full m-auto mt-10 flex flex-col gap-5">
        <div class="flex space-x-10 w-full bg-white rounded-md p-5">
                <div class="w-1/4">
                    <img src="{{asset('storage/' . $book->image->path)}}" alt="">
                </div>
                <div class="flex flex-col gap-5  w-3/4">
                    <div class="flex flex-col gap-4">
                        <p class="text-3xl font-bold text-center mb-2">{{$book->title}}</p>
                        <p class="text-xl font-medium  px-4">Author : <span class="text-gray-700  font-normal hover:underline">{{$book->author->name}}</span></p>
                        <p class="text-xl  font-medium px-4">Genre: <span class="text-gray-700 font-normal hover:underline">{{$book->genre->name}}</span></p> 
                        <div class="flex justify-between max-w-xl">
                            <p class="text-xl  font-medium px-4">Publication Date: <span class="text-gray-700 font-normal ">{{$book->publicationDate}}</span></p> 
                            <p class="text-xl  font-medium px-4">Edition: <span class="text-gray-700 font-normal ">{{$book->edition}}</span></p> 
                        </div>
                        <div class="flex justify-between max-w-xl">
                            <p class="text-xl  font-medium px-4">Number of pages: <span class="text-gray-700 font-normal ">{{$book->pagesNumber}} pages</span></p> 
                            <p class="text-xl  font-medium px-4">Language: <span class="text-gray-700 font-normal ">{{$book->language}}</span></p> 
                        </div>
                        <p class="text-xl font-medium px-4">Description: <span class="text-gray-700 font-normal">{{$book->description}}</span></p> 

                    </div>    
                    <div class="flex justify-between px-10 ">
                        <div onclick="openReview()" class="flex space-x-3">
                            <div class="flex text-xl p-1 gap-1 text-yellow-600">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half  "></i>
                            </div>                            
                            <p >12<span class="text-sm font-semibold"> reviews</span> </p>
                        </div>
                </div>
                <div class="flex justify-end mr-2">
                          <button class="bg-black text-white border-xl flex space-x-2 rounded-xl py-2 px-8">
                             <i class="fas fa-shopping-basket mt-1"></i> <span>Reserve</span>
                          </button>
                      </div>
                </div>
            </div>
            <div class="w-11/12 m-auto mt-20 flex justify-evenly">
    <x-client.articles-bookPage :posts="$posts"/>

    <x-client.side-cards :authors="$authors" :genres="$genres" :books="$topBooks"/></div>
<!-- 
    <div id="review" class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                               
                    <form method="POST" id="authorForm" action="{{route('authors.store') }}" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                      <div class="rateyo" id="rating" 
                      data-reteyo-rating="4" data-rateyo-num-satrs="5" data-rateyo-score="3">
                      </div>
                      <span class="result">0</span>
                      <input type="hidden" name="starsCount">
                      <button type="submit" class="bg-black text-white">
                        add
                      </button>
                </form>
            </div>
        </div>
</div> -->

</x-client-layout>