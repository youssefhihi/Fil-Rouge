@props(['page'])

<header class="bg-white w-full fixed top-0 left-0 right-0 z-50">
      <nav class="flex justify-between items-center bg-white text-black p-1 ">
        <div class="flex items-center space-x-20">
            <img src="https://source.unsplash.com/random" alt="Logo" class="h-10">
            <form action="" class="ml-4 flex border-b-2 border-black ">
                <input type="search" name="search" placeholder="Search by book, genre ..." class="text-sm  text-black px-3 py-1 pr-8 focus:outline-none ">
                <button type="submit"><i class="fas fa-search text-sm mt-2 "></i></button>
            </form>
        </div>
        <ul class="flex space-x-10">
           
                
                <li class="">
                <a href="/home" class="flex flex-col px-2 items-center  {{ $page === 'feed' ? 'border-b-2 border-black text-black' : 'text-gray-500 hover:text-black' }}"> 
                        <x-icon name="home"/>
                        <span class="text-xs">Home</span>
                    </a> 
                </li>           
         
            <li class="">
            <a href="/books" class="flex flex-col px-2 items-center  {{ $page === 'books' ? 'border-b-2 border-black text-black' : 'text-gray-500 hover:text-black' }}"> 
                    <x-icon name="books"/>                     
                    <span class="text-xs">Books</span>
                </a>
            </li>
           

            
           
            <li class="">
                
            <a href="/notification" class="flex flex-col px-2 items-center  {{ $page === 'notif' ? 'border-b-2 border-black text-black' : 'text-gray-500 hover:text-black' }}"> 
                <x-icon name="notif"/>
                    <span class="text-xs">Notification</span>
                </a>
            </li>
           

           
            <li class="">
                <a href="/profile" class="flex flex-col items-center px-2 text-gray-500 hover:text-black">
                    <img src="doctor.png" alt="" class="rounded-full h-7 w-7  ">
                    <span class="">Me</span>
                </a>
            </li>
        
            <div class="border-r-4 border-gray-500  "></div>
            <li class="/">       
                    <div class="flex flex-col items-center text-gray-500 hover:text-black ">
                    <x-icon name="about"/>
                      <span class="text-xs">about us</span>
                    </div>
            </li>     
           
            <li class="">        
            <div id="basket" class="flex flex-col pt-1 items-center  text-gray-800 hover:text-black"> 
                <x-icon name="basket"/>
                    <span class="text-xs">basket</span>
                </div >
            </li>
            <li class="">       
            <form method="POST" action="{{ route('logout') }}"class="flex items-center justify-center w-full  py-2 ">
                @csrf
               
                <button class="items-center p-2 rounded-2xl bg-black relative overflow-hidden " type="submit">  
                        <x-icon name="logout"/>
                </button>
            </form>
            </li>
        </ul>
      </nav>
    </header>
    