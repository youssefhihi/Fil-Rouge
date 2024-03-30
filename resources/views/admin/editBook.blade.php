<!-- component -->
<!-- This is an example component -->

<x-admin-layout>
<div class="px-20">

<form action="{{route('books.update',$book)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class=" flex flex-col gap-5">
        <div class="grid xl:grid-cols-2 xl:gap-6">
            <div class="flex items-center mx-auto space-x-6">
                <div class="shrink-0">
                <img id='preview_img' class="h-72 w-52 rounded-sm" src="{{asset('storage/' . $book->image->path)}}" alt="Current profile photo" />
                </div>
                <label class="block">
                <span class="sr-only">Choose profile photo</span>
                <input type="file" onchange="loadFile(event)" name="image" class="block w-full text-sm text-slate-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-gray-200 file:text-black
                        hover:file:bg-gray-300"/>
                </label>
            </div>     
                <div class=""> 
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="title" id="title" value="{{$book->title}}" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="title" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Title
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" name="quantity" value="{{$book->quantity}}"  id="quantity" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="quantity" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Quantity
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group ">
                        <label for="genre" class="text-gray-500 dark:text-black ">
                            Genre</label>
                        <select name="genre_id" id="genre" class="block py-2.5 px-3 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 ">
                            @foreach ( $genres as $genre )    
                            @if ($genre === $book->genre->name)                            
                            <option value="{{$genre->id}}" selected>{{$genre->name}}</option>           
                            @else                                
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endif                        
                            @endforeach  
                        </select>                        
                    </div>
                </div>
            </div>
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <label for="edition" class="text-gray-500 dark:text-black ">Edition</label>
                    <input type="month" value="{{$book->edition}}" name="edition" id="edition" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder=" " required />
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <label for="publication date" class="text-gray-500 dark:text-black ">Publication Date</label>
                    <input type="date" name="publicationDate" value="{{$book->publicationDate}}" id="floating_first_name" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder=" " required />
                </div>
            </div>
            
            <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" value="{{$book->ISBN}}" name="ISBN" id="isbn" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="isbn" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            ISBN
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" name="pagesNumber" value="{{$book->pagesNumber}}" id="pagesNumber" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="pagesNumber" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Number Of Pages
                        </label>
                    </div>
            </div>
        
            <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="floating_email" class="text-gray-500 dark:text-black ">
                            Author</label>
                        <select name="author_id" id="author" class="block py-2.5 px-3 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 ">
                            @foreach ( $authors as $author )                            
                            @if ($author === $book->author->name)               
                            <option value="{{$author->id}}" selected>{{$author->name}}</option>           
                            @else                                
                            <option value="{{$author->id}}">{{$author->name}}</option>
                            @endif
                            @endforeach                           
                        </select>   
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="language" class="text-gray-500 dark:text-black ">
                            language</label>
                            <select name="language" id="genre" class="block py-2.5 px-3 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 ">
                                <option value="arabic">Arabic</option>
                                <option value="english">English</option>
                                <option value="french">French</option>
                            </select>  
                    </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="description" value="{{$book->description}}" id="description" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                <label for="description" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Description
                </label>
            </div>		
            </div>		
		<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
	</form>
    </div>
</x-admin-layout>
