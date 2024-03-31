@props(['genres'])

 <!-- Right sidebar -->
 <div class=" md:block hidden right-sidebar w-4/12 h-14 relative">
        <!-- First box -->
        <div class="">
        <div class="flex justify-between items-center mb-2 ml-2">
          <h2 class="text-md ">Your Profile </h2>      
        </div>
        <div class="border border-gray-300 rounded bg-white p-3">        
          <div class="p-2 flex justify-between">
            <a href="#" class="flex ">
                <div class="w-12 h-12 rounded-full mr-2">
                  <img src="https://homevest.com/wp-content/uploads/2019/05/female1-512.png" alt="profile" class="w-full">
                </div>
                <div>
                  <h3 class="flex" >
                    <span class="text-gray-700 font-bold hover:text-blue-500 hover:underline ">
                      Harriet Best</span>                 
                  </h3>
                  <p class="time text-sm text-gray-500 flex items-center">
                    <span> Joined 2024/08/29</span>
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
            <div class="flex flex-col gap-1 px-4">
              <a href="#" class="text-md font-semibold text-blue-500 hover:underline"> {{genre->name}}</a>
              <p class="test-gray-400 text-sm ">more than 200+ books</p>
            </div>
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
            <div class="flex space-x-4 px-3">
            <img src="book1.png" alt="" class="h-24 w-16" >  
            <div class="flex flex-col gap-2">
              <div class=" flex flex-col ">
                <p class="text-blue-900 hover:underline">Neurologist And Nerves</p>
                <p class="test-gray-400 text-md ml-2">Harper Rusu</p>
              </div>
              <p class="test-gray-400 text-sm ">6 users recently</p>
            </div>
            </div>
            <div class="border border-black my-2"></div>
             <!-- Book 2  -->    
             <div class="flex space-x-4 px-3">
              <img src="book1.png" alt="" class="h-24 w-16" >  
              <div class="flex flex-col gap-2">
                <div class=" flex flex-col ">
                  <p class="text-blue-900 hover:underline">Neurologist And Nerves</p>
                  <p class="test-gray-400 text-md ml-2">Harper Rusu</p>
                </div>
                <p class="test-gray-400 text-sm ">6 users recently</p>
              </div>
              </div>
              <div class="border border-black my-2"></div>
        </div>
      </div>
        </div>
        <div class="mt-7">
          <div class="flex justify-between items-center mb-2 ml-2">
            <h2 class="text-md ">Trending Authors</h2>      
          </div>
          <div class="border border-gray-300 rounded bg-white p-3">
            <div   class="flex flex-col ">      
            <div class="p-2 flex justify-between">
              <a href="#" class="flex ">
                  <div class="w-12 h-12 rounded-full mr-2">
                    <img src="https://homevest.com/wp-content/uploads/2019/05/female1-512.png" alt="profile" class="w-full">
                  </div>
                  <div>
                    <h3 class="flex" >
                      <span class="text-gray-700 font-bold hover:text-blue-500 hover:underline ">
                        Harriet Best</span>                 
                    </h3>
                    <p class="time text-sm text-gray-500 flex items-center">
                      <span> more tha 10++ books </span>
                    </p>
                  </div>
              </a> 
            </div> 
            <div class="border border-black my-2"></div> 
            <div class="p-2 flex justify-between">
              <a href="#" class="flex ">
                  <div class="w-12 h-12 rounded-full mr-2">
                    <img src="https://homevest.com/wp-content/uploads/2019/05/female1-512.png" alt="profile" class="w-full">
                  </div>
                  <div>
                    <h3 class="flex" >
                      <span class="text-gray-700 font-bold hover:text-blue-500 hover:underline ">
                        Harriet Best</span>                 
                    </h3>
                    <p class="time text-sm text-gray-500 flex items-center">
                      <span> more tha 10++ books </span>
                    </p>
                  </div>
              </a> 
            </div> 
            <div class="border border-black my-2"></div>  
            <div class="p-2 flex justify-between">
              <a href="#" class="flex ">
                  <div class="w-12 h-12 rounded-full mr-2">
                    <img src="https://homevest.com/wp-content/uploads/2019/05/female1-512.png" alt="profile" class="w-full">
                  </div>
                  <div>
                    <h3 class="flex" >
                      <span class="text-gray-700 font-bold hover:text-blue-500 hover:underline ">
                        Harriet Best</span>                 
                    </h3>
                    <p class="time text-sm text-gray-500 flex items-center">
                      <span> more tha 10++ books </span>
                    </p>
                  </div>
              </a> 
            </div> 
            <div class="border border-black my-2"></div>            
          </div>
          </div>      
          </div>
        </div>       
      </div>