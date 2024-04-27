@props(['page'])
<div id="SearchInput" class=" hidden min-w-screen absolute p-14 h-screen animated fadeIn faster   fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <form  class=" max-w-5xl rounded-2xl bg-white w-full px-4 absolute fixed  top-14 lg:top-10 dark:text-white dark:bg-black">
                <div class="relative flex flex-col">
                    <input type="text" name="search" id="search" class="w-full border-b-2 h-12 shadow p-4 bg-black  dark:border-gray-700  focus:outline-none" placeholder="search Book By Title ,Genre, Author">
                     <svg class="text-teal-400 h-5 w-5 absolute top-3.5  right-3 fill-current dark:text-teal-300"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                            x="0px" y="0px" viewBox="0 0 56.966 56.966"
                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                            </path>
                        </svg>
                        <div class="  w-full " id="data">
            
                        </div>
                </div>
            </form>
            <div onclick="closeSearch()">
                <svg  class="text-black bg-white sm:right-1/2 rounded-full  h-19 w-7 absolute top-4 lg:right-10 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </div>

        </div>
<header class="hidden lg:block bg-white w-full fixed top-0 left-0 right-0 z-40">
      <nav class="flex justify-between items-center bg-white text-black p-1 ">
        <div class="flex items-center space-x-20">
            <img src="{{asset('imgs/logo.png')}}" alt="Logo" class="h-16">
            <form method="get" action="{{route('home.index')}}" class="ml-4 flex border-b-2 border-black ">
                @csrf
                <input type="search" name="search" placeholder="Search ..." class="text-sm  text-black px-3 py-1 pr-8 focus:outline-none ">
                <button type="submit"><i class="fas fa-search text-sm mt-2 "></i></button>
            </form>
        </div>
        @if ($page === 'books')  
        <div class="flex space-x-1  ">
            <div onclick="openSearch()" class=" cursor-pointer flex space-x-1  px-2 border-b-2 border-black  ">
                <p class="bg-transparent w-full h-full text-sm  outline-none text-gray-500">Search Book by title,genre</p>
                <i class="fas fa-search text-sm pt-1 "></i>
            </div>
        </div>
        @endif
        <ul class="flex space-x-10">
                <li class="">
                <a href="/home" class="flex flex-col px-2 items-center  {{ $page === 'feed' ? 'border-b-2 border-black text-black' : 'text-gray-500 hover:text-black' }}"> 
                        <x-icon name="home"/>
                        <span class="text-xs">Home</span>
                </a> 
                </li>           
         
            <li class="">
            <a href="{{route('books.client')}}" class="flex flex-col px-2 items-center  {{ $page === 'books' ? 'border-b-2 border-black text-black' : 'text-gray-500 hover:text-black' }}"> 
                    <x-icon name="books"/>                     
                    <span class="text-xs">Books</span>
                </a>
            </li>
           

            
           
            <li class="">
                
            <a href="/chat" class="flex flex-col px-2 items-center  {{ $page === 'message' ? 'border-b-2 border-black text-black' : 'text-gray-500 hover:text-black' }}"> 
                <x-icon name="message"/>
                    <span class="text-xs">message</span>
                </a>
            </li>
           

           
            <li class="">
                <a href="/profile" class="flex flex-col items-center px-2 text-gray-500 hover:text-black">
                @if (Auth::user()->client->image)             
                    <img src="{{asset('storage/' .Auth::user()->client->image->path)}}" alt="" class="rounded-full h-6 w-6  ">
                    @else
                    @if (Auth::user()->client->gender === "female")
                    <img src="{{asset('imgs/profileFemale.png')}}" alt="" class="rounded-full h-6 w-6  ">
                    @else
                    <img src="{{asset('imgs/profileMale.png')}}" alt="" class="rounded-full h-6 w-6  ">
                    @endif 
                    @endif                    
            <span class="text-xs">account</span>
                </a>
            </li>
        
            <div class="border-r-4 border-gray-500  "></div>
            <li class="">       
                    <a href="/" class="flex flex-col items-center text-gray-500 hover:text-black ">
                    <x-icon name="about"/>
                      <span class="text-xs">about us</span>
                    </a>
            </li>     
           
            
            <li class="">       
            <form method="POST" action="{{ route('logout') }}"class="flex items-center justify-center w-full  py-2 ">
                @csrf
               
                <button class="items-center p-2 rounded-2xl bg-black relative overflow-hidden " type="submit">  
                        <x-icon name="logout"  class="text-white"/>
                </button>
            </form>
            </li>
        </ul>
      </nav>
    </header>
    <header id="bottom-navigation" class="block lg:hidden fixed inset-x-0 top-0 z-10 bg-white shadow">
		<div id="tabs" class="flex justify-evenly items-center">
                <img src="{{asset('imgs/logo.png')}}" alt="Logo" class="h-16">
                @if ( $page === 'books')
                <div class="flex space-x-1  ">
                    <div onclick="openSearch()" class=" cursor-pointer flex space-x-3  px-2 border-b-2 border-black  ">
                    <p class="bg-transparent w-full h-full text-md  outline-none text-gray-500">Search Book by title,genre ...</p>
                    <i class="fas fa-search text-sm"></i>
                    </div>
                </div>
                @else               
                <form method="get" action="{{route('home.index')}}" class="ml-4 flex border-b-2 border-black ">
                    @csrf
                    <input type="search" name="search" placeholder="Search ..." class="text-sm  text-black px-3 py-1 pr-8 focus:outline-none ">
                    <button type="submit"><i class="fas fa-search text-sm mt-2 "></i></button>
                </form>
                @endif
		</div>
</header>

<header id="bottom-navigation" class="block lg:hidden fixed inset-x-0 bottom-0 z-10 bg-white shadow">
		<div id="tabs" class="flex justify-between">
			<a href="/home" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
				 <x-icon name="home" class="inline-block mb-1"/> 
				<span class="tab tab-home block text-xs">Home</span>
            </a>
			<a href="/books" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
            <x-icon name="books" class="inline-block mb-1"/> 

				<span class="tab tab-kategori block text-xs">Books</span>
			</a>
			<a href="/chat" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                <x-icon name="message" class="inline-block mb-1"/> 
				<span class="tab tab-explore block text-xs">message</span>
			</a>
            <a href="/profile" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                @if (Auth::user()->client->image)             
                    <img src="{{asset('storage/' .Auth::user()->client->image->path)}}" alt="" class="inline-block mb-1 rounded-full h-7 w-7  ">
                @else
                    @if (Auth::user()->client->gender === "female")
                        <img src="{{asset('imgs/profileFemale.png')}}" alt="" class="rounded-full h-7 w-7 inline-block mb-1 ">
                    @else
                        <img src="{{asset('imgs/profileMale.png')}}" alt="" class="rounded-full h-7 w-7 inline-block mb-1 ">
                    @endif 
                @endif
                <span class="tab tab-account block text-xs">Account</span>
            </a>
			<a href="/" class="w-full focus:text-teal-500 hover:text-teal-500 justify-center inline-block text-center pt-2 pb-1">
                 <x-icon name="about" class="inline-block mb-1"/> 
				<span class="tab tab-whishlist block text-xs">About Us</span>
			</a>    
		</div>
</header>


    <script>
$(document).ready(function(){
    function fetch_search_data(query){
        $.ajax({
        url: "{{route('search')}}",
        method: 'GET',
        data: {query:query},
        dataType:'json',
        success: function (data) {
            $('#data').html(data.table_data);
            $('#total_records').text(data.total_data)
        }
    })
    }

    fetch_search_data('');

    $(document).on('keyup','#search',function(){
        var query = $(this).val();
        fetch_search_data(query); 
    });
});
</script>


    