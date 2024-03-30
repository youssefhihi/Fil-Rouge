<x-admin-layout>
 <!-- CONTENT -->

 <title-pages name="authors"/>

<div class=" min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                    <!-- Form to add Author -->
                    <form method="POST" id="authorForm" action="{{route('authors.update',$author) }}" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="flex flex-col gap-5">
                            <div class="flex items-center mx-auto space-x-6">
                                <div class="shrink-0">
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
                                <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" onchange="loadFile(event)" name="image"  class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-gray-200 file:text-black
                                    hover:file:bg-gray-300
                                "/>
                                </label>
                            </div> 
                        <div class="flex flex-col">                
                            <label for="name" class="text-md font-semibold font-normal mb-1 px-4"> new Author</label>
                            <x-input id="author" class="block mt-1 w-full" type="text" name="name" value="{{$author->name}}" />
                            <p id="messageError" class="hidden text-red-400 text-sm">Invalid name format ,Please use letters only.</p>
                            <p class="hidden text-red-400 text-sm">Please use letters only, Avoid numbers or special characters.</p>
                            <select name="gender" id="" class="block mt-3 w-full rounded-xl py-2 focus:outline-none border border-gray-600 px-5">
                                <option value="male">Male</option>
                                <option value="female" {{ $author->gender === 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            <div class="flex space-x-8 justify-end mt-5">
                                <a href="/dashboard/authors"  class=" cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</a>
                                <button type="submit" class="cursor-pointer mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
           

</x-admin-layout>
