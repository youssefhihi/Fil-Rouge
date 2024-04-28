


<div class = "fixed w-full z-30 flex bg-white  p-2 items-center justify-between h-16 px-10">
        <div class = "logo ml-12 dark:text-white  transform ease-in-out duration-500 flex-none h-full flex items-center justify-center">
            <img src="doctor.png" alt="" class=" ml-2 h-14">
        </div>
        <!-- SPACER -->
        <div class = "grow h-full flex items-center justify-center " ></div>
                    
                <div class = "flex-none h-full text-center flex space-x-10  items-center justify-center"> 
                    <div class="flex items-center ">
                        <span id="current-time" class=""> </span>
                        <i class="fas fa-calendar-alt"></i>
                    </div>              
                    <a href="/" class = "flex flex-col items-center px-3 mt-5">
                        <div class = "flex-none flex justify-center">
                            <div class="w-10 h-10 flex ">
                                <img src="{{asset('imgs/logo.png')}}" alt="profile" class="shadow rounded-full object-cover" />
                            </div>
                        </div>
                        <div class = " md:block text-sm md:text-md text-black dark:text-white">Youssef Hihi</div>
                    </a>
              </div>
        </div>
    <aside class = "w-60 -translate-x-48 fixed transition transform ease-in-out duration-1000 z-50 flex h-screen bg-black  ">
        <!-- open sidebar button -->
        <div class = "max-toolbar translate-x-24 scale-x-0 w-full -right-6 transition transform ease-in duration-300 flex items-center justify-between border-4 border-gray-200 dark:border-gray-300 bg-gray-300  absolute top-2 rounded-full h-12">
            
            <div class="flex pl-4 items-center space-x-2 ">
                <div>
                <div onclick="setDark('dark')" class="moon text-black hover:text-blue-600 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor" class="w-4 h-4">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>
                    
                </div> 
                <div onclick="setDark('light')" class = "sun hidden text-black hover:text-blue-500 dark:hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                      </svg>                      
                </div>
            </div >
                <div class = "text-black hover:text-blue-500 dark:hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor" class="w-4 h-4">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                    
                </div>
            </div>
            <div  class = "flex items-center space-x-3 group bg-gradient-to-r dark:from-blue-700 dark:to-blue-500 from-blue-200 via-blue-500 to-blue-800  pl-10 pr-2 py-1 rounded-full text-white  ">
                <div class= "transform ease-in-out duration-300 mr-12">
                    My site
                </div>
            </div>
        </div>
        <div onclick="openNav()" class = "-right-6 transition transform ease-in-out duration-500 flex border-4 border-white  hover:bg-blue-600 dark:hover:bg-blue-500 bg-black absolute top-2 p-3 rounded-full text-white hover:rotate-45">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor" class="w-4 h-4">
                <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
        </div>
        <!-- MAX SIDEBAR-->
        <div class= "max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
            <a href="/dashboard" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black  p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <x-icon name="dashboard"/>
                <div>
                    Dashboard
                </div>
            </a>
            <a href="/dashboard/users" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
                <x-icon name="users"/>                  
                <div>
                    Users
                </div>
            </a>
            <a href="/dashboard/genres" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
                <x-icon name="genre"/>                  
                <div>
                    Genres
                </div>
            </a>
            <a href="/dashboard/authors" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
                <x-icon name="authors"/>                  
                <div>
                    Authors
                </div>
            </a>
            <a href="/dashboard/books" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">               
                <x-icon name="books"/>                  
                <div>
                    Books
                </div>
            </a>
            <a href="/dashboard/reservations" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
                <x-icon name="reservation"/>                   
                <div>
                    Reservations
                </div>
                @if ($reservationCount > 0)
                <div class="pl-4">
                <span class="bg-red-500 text-white text-xs font-semibold px-1.5 py-0.5 rounded-full"> {{ $reservationCount }} </span>
                </div>
                @endif
            </a>
            <a href="/dashboard/emprunts" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">                 
            <x-icon name="emprunts"/>                  
                <div>
                Emprunts
                </div>
                @if ($empruntsCount > 0)
                <div class="pl-4">
                <span class="bg-red-500 text-white text-xs font-semibold px-1.5 py-0.5 rounded-full"> {{ $empruntsCount }} </span>
                </div>
                @endif
            </a>
            <form method="POST" action="{{route('logout')}}" class =  "hover:bg-white w-full text-white hover:text-black dark:hover:text-black hover:ml-3 border-2 border-black p-2 pl-8 rounded-full transform ease-in-out duration-300 flex flex-row items-center space-x-3">              
                @csrf
                
                <x-icon name="logout"/>                  
                   <button type="submit" >
                    Log Out
                    </button>
            </form>
        </div>
        <!-- MINI SIDEBAR-->
        <div class= "mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
            <a href="/dashboard" class= "hover:bg-white justify-end pr-5 text-white hover:text-black hover:ml-3 border-2 border-black dark:hover:text-black w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="dashboard"/>              
            </a>
            <a href="/dashboard/users" class= "hover:bg-white justify-end pr-5 text-white hover:text-black hover:ml-3 border-2 border-black dark:hover:text-black w-full   p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="users"/>              
            </a>
            <a href="/dashboard/genres" class= "hover:bg-white hover:ml-4 justify-end pr-5 text-white hover:text-black hover:ml-3 border-2 border-black dark:hover:text-black w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="genre"/>                 
            </a>
            <a href="/dashboard/authors" class= "hover:bg-white hover:ml-4 justify-end pr-4 text-white hover:text-black hover:ml-3 border-2 border-black dark:hover:text-black w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="authors"/>                 
            </a>
            <a href="/dashboard/books" class= "hover:bg-white hover:ml-4 justify-end pr-5 text-white hover:text-black hover:ml-3 border-2 border-black dark:hover:text-black w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="books"/>                  
            </a>
            <a href="/dashboard/reservations" class= "hover:bg-white hover:ml-4 justify-end pr-5 text-white hover:text-black hover:ml-3 border-2 border-black dark:hover:text-black w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="reservation"/>                 
            </a>
            <a href="/dashboard/emprunts" class= "hover:bg-white hover:ml-4 justify-end pr-5 text-white hover:text-black hover:ml-3 border-2 border-black dark:hover:text-black w-full  p-3 rounded-full transform ease-in-out duration-300 flex">
                <x-icon name="emprunts"/>                 
            </a>
        </div>
        
    </aside>
   


<script>
    
function updateCurrentTime() {
  var now = new Date();
  
  var formattedDate = ('0' + now.getDate()).slice(-2) + '/' + ('0' + (now.getMonth() + 1)).slice(-2) + '/' + now.getFullYear();
  var formattedTime = ('0' + now.getHours()).slice(-2) + ':' + ('0' + now.getMinutes()).slice(-2) + ':' + ('0' + now.getSeconds()).slice(-2);
  
  document.getElementById('current-time').textContent = formattedDate + ' ' + formattedTime;
}
setInterval(updateCurrentTime, 1000);
updateCurrentTime();
</script>