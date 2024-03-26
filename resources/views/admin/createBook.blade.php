<!-- component -->
<!-- This is an example component -->

<x-admin-layout>
<div class="px-20">

	<form>
        <div class=" flex flex-col gap-5">
        <div class="grid xl:grid-cols-2 xl:gap-6">
            <div class="">
            <div id="image-preview" class="w-1/2 p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                <input id="upload" type="file" class="hidden" accept="image/*" />
                <label for="upload" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                    <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG and PNG</b> format.</p>
                    <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                </label>
            </div>     
            </div>
                <div class=""> 
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="floating_last_name" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Title
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" name="quantity" id="quantity" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="quantity" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Quantity
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group ">
                        <label for="floating_email" class="text-gray-500 dark:text-black ">
                            Genre</label>
                        <select name="genre" id="genre" class="block py-2.5 px-3 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 ">
                            <option value="" selected disabled>choose genre</option>
                            <option value="">fiction</option>
                            <option value="">non-fiction</option>
                            <option value="">science</option>
                        </select>                        
                    </div>
                </div>
            </div>
            <div class="grid xl:grid-cols-2 xl:gap-6">
                <div class="relative z-0 mb-6 w-full group">
                    <label for="floating_first_name" class="text-gray-500 dark:text-black ">Edition</label>
                    <input type="date" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder=" " required />
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <label for="floating_first_name" class="text-gray-500 dark:text-black ">Publication Date</label>
                    <input type="date" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600" placeholder=" " required />
                </div>
            </div>
            
            <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" name="isbn" id="isbn" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="isbn" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            ISBN
                        </label>
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="number" name="pagesNumber" id="pagesNumber" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                        <label for="pagesNumber" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Number Of Pages
                        </label>
                    </div>
            </div>
        
            <div class="grid xl:grid-cols-2 xl:gap-6">
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="floating_email" class="text-gray-500 dark:text-black ">
                            Author</label>
                        <select name="genre" id="genre" class="block py-2.5 px-3 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 ">
                            <option value="" selected disabled>choose the author</option>
                            <option value="">hamdi</option>
                            <option value="">ahmed mostafa</option>
                            <option value="">mostaghanmi</option>
                        </select>   
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="floating_email" class="text-gray-500 dark:text-black ">
                            language</label>
                        <select name="genre" id="genre" class="block py-2.5 px-3 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 ">
                            <option value="" selected disabled>choose language</option>
                            <option value="">arabic</option>
                            <option value="">english</option>
                            <option value="">frensh</option>
                        </select>   
                    </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-md  bg-transparent border-0 border-b-2 border-gray-800 appearance-none  dark:border-black dark:focus:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="absolute text-md text-gray-500 dark:text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-ray-600 peer-focus:dark:text-gray-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Title
                </label>
            </div>		
            </div>		
		<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
	</form>
    </div>
</x-admin-layout>
