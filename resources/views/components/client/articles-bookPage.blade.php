  <!-- article -->
  <div class="w-7/12 mx-2">
         <!--Form   -->

         <!-- Sort -->
         <form id="sortForm" method="GET" action="{{ route('home.index') }}" class="space-y-4">
              <div class="outline-none w-full h-8 flex items-center text-xs">
                  <div class="h-0.5 w-11/12 bg-gray-300"></div>
                  <p class="w-3/12 text-right font-light">
                      Sort by: 
                      <span class="font-bold">
                          <select name="type" id="type" class="focus:outline-none" onchange="this.form.submit()">
                              <option value="all" {{ request()->input('type') == 'all' ? 'selected' : '' }}>All <i class="fas fa-caret-down"></i></option>
                              <option value="general" {{ request()->input('type') == 'general' ? 'selected' : '' }}>General <i class="fas fa-caret-down"></i></option>
                              <option value="question" {{ request()->input('type') == 'question' ? 'selected' : '' }}>Questions <i class="fas fa-caret-down"></i></option>
                              <option value="advice" {{ request()->input('type') == 'advice' ? 'selected' : '' }}>Advices <i class="fas fa-caret-down"></i></option>
                          </select>
                      </span>
                  </p>
              </div>
          </form>



         <!-- Posts -->
         <article class="posts">
         @foreach($posts as $post)
          <section class="post bg-white py-2 my-2 border rounded">
             <!-- top -->
              <div class="p-2 flex justify-between">
                  <a href="#" class="flex ">
                      <div class="w-12 h-12 rounded-full mr-2">
                        @if ($post->client->image)
                        <img src="{{asset('storage/'. $post->client->image->path)}}" alt="profile" class="w-full">
                        @else
                        @if (Auth::user()->client->gender === 'female')
                        <img src="{{asset('imgs/womanAuthor.png')}}" alt="profile" class="w-full">
                        @else          
                        <img src="{{asset('imgs/manAuthor.png')}}" alt="profile" class="w-full">             
                        @endif
                        @endif
                      </div>
                      <div>
                        <h3 class="flex " >
                          <span class="text-gray-700 font-bold hover:text-blue-500 hover:underline ">{{$post->client->user->name}}</span>                 
                        </h3>
                        <div class="time text-sm text-gray-500 flex space-x-2 items-center">
                          <span>{{$post->created_at}}</span>
                          <div class=" flex space-x-2 text-md  text-black font-semibold">
                            <p class="capitalize">{{$post->type}}</p>
                            @if ($post->type === 'question')
                              <x-icon name="question"/>
                            @elseif ($post->type === 'advice')
                              <x-icon name="advice"/>
                            @else
                              <x-icon name="general"/>
                            @endif
                          </div> 
                        </div>
                      </div>
                  </a>

                  <button  class="dots w-7 h-7 flex justify-center items-center rounded-full hover:bg-gray-200">
                      <span class="w-1 h-1 mr-0.5 bg-gray-600 rounded-full"></span>
                      <span class="w-1 h-1 mr-0.5 bg-gray-600 rounded-full"></span>
                      <span class="w-1 h-1 mr-0.5 bg-gray-600 rounded-full"></span>
                  </button>
              </div>
             <!-- post article -->
             <div class="px-2">
               <p class="py-2">
               {{$post->description}}
               </p>
             </div>
             <!-- content -->
             @if ($post->image)
               
             <div class="h-50 w-full">
              <img src="{{asset('storage/'. $post->image->path)}}" alt="image" class="w-full h-full object-fill my-2">  
             </div>    
             @endif
             <div class="mx-3 px-2 h-8 m-auto  flex flex-row justify-between space-x-4">
             <!--  like and comments -->
             <div class=" flex items-center">
               <button class="flex  outline-none rounded px-2  text-gray-600 hover:bg-gray-200">
                <i class="far fa-heart text-xl mr-1.5"></i> 
                <span >29 </span> 
               </button>

               <button class="flex  outline-none rounded  px-2  text-gray-600 hover:bg-gray-200">
                <i class="far fa-comment-dots text-xl mr-1.5"></i> 
                <span >10</span>  
               </button>
             </div> 
              </div>
            </section>
          @endforeach
          </article>
        </div>