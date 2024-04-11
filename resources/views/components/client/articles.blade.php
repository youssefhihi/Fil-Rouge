  <!-- article -->
  @props(['posts','likes'])
  <div class="w-6/12 mx-2">
         <!--Form   -->
         <!-- object-fill -->
         <div id="addPost" class=" hidden min-w-screen lg:p-14 h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
              <div class="w-full max-w-lg lg:max-w-full p-5 relative mx-auto my-auto rounded-xl shadow-lg h-full  bg-white overflow-y-auto ">
                                      <!-- Form to add Author -->
                      <form method="POST"  action="{{route('post.store')}}" class="space-y-4 " enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <div class="flex flex-col gap-5 lg:flex-row lg:justify-between lg:gap-0">
                            <div class="flex justify-center mx-auto lg:mx-0 lg:w-1/2">
                              <x-image-input page="post" path="{{asset('imgs/manAuthor.png')}}" class="h-80  w-64 object-fill rounded-sm"/> 
                            </div>                         
                          <div class="flex flex-col mt-10 lg:w-1/2">                
                              <x-textarea name="description" label="description"/>
                              <div class="flex flex-col mt-5 space-y-2 sm:flex-row sm:space-x-2  lg:flex-row lg:space-x-2 border-[3px] border-gray-600 rounded-xl select-none">
                                      <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer">
                                        <input type="radio"  name="type" value="general" class="peer hidden" />
                                        <span class=" flex tracking-widest peer-checked:bg-gradient-to-r peer-checked:from-[black] peer-checked:to-[gray] peer-checked:text-white text-gray-700 p-2 rounded-lg transition duration-150 ease-in-out">
                                          <span>General</span> <x-icon name="general"/>
                                        </span>
                                      </label>

                                      <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer" >
                                        <input type="radio" name="type" value="question" class="peer hidden" />
                                        <span class="flex tracking-widest peer-checked:bg-gradient-to-r peer-checked:from-[gray] peer-checked:to-[black] peer-checked:text-white text-gray-700 p-2 rounded-lg transition duration-150 ease-in-out">
                                        <span>Question</span> <x-icon name="question" class=""/>
                                        </span>
                                      </label>
                                      <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer">
                                        <input type="radio" name="type" value="advice" class="peer hidden" />
                                        <span class="flex tracking-widest peer-checked:bg-gradient-to-r peer-checked:from-[gray] peer-checked:to-[black] peer-checked:text-white text-gray-700 p-2 rounded-lg transition duration-150 ease-in-out">
                                        <span>Advice</span> <x-icon name="advice" class="pl-1"/>
                                        </span>
                                      </label>
                                    </div>

                              <div class="flex space-x-6 mt-10">
                                <button type="submit" class="cursor-pointer w-full mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Post</button>
                                  <p onclick="closeAddPost()" class=" w-full text-center cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</p>
                              </div>
                          </div> 
                      </div>
                  </form>
              </div>
          </div>

         <div class="bg-white p-4 border border-gray-300 rounded ">
          <div class="flex space-x-1 w-full h-full ">
            <div onclick="openAddPost()" class=" cursor-pointer flex h-12 mb-2 w-full px-2 border border-gray-300 rounded-3xl hover:bg-gray-200">
              <p class="bg-transparent w-full h-full p-3 outline-none text-gray-500">Start a post</p>
            </div>
          </div>
          <!-- Icons -->
          <div class="py-2 flex justify-between items-center">
            <button onclick="openAddPost()" class="py-3 px-2 rounded flex items-center hover:bg-gray-200">
              <span class="font-bold pr-1">Advice</span>
              <x-icon name="advice"/>
            </button>

            <button onclick="openAddPost()" class="py-3 px-2 rounded flex items-center hover:bg-gray-200">
              <span class="font-bold pr-1">Question</span>
              <x-icon name="question"/>
            </button>


            <button onclick="openAddPost()" class="py-3 px-2 rounded flex items-center hover:bg-gray-200">
            <span class="font-bold pr-1 ">General </span>
            <x-icon name="general"/>
            </button>
          </div>
         </div>

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

              @if (Auth::user()->client->likes->contains('post_id', $post->id))
              @php
                  $like = Auth::user()->client->likes->where('post_id', $post->id)->first();
              @endphp
              <form action="{{route('rating.destroy', $like)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex  outline-none rounded px-2  text-gray-600 ">
                  <x-icon name="like" class="text-xl text-red-600 mr-1.5"/>
                  <span >{{$likes}} </span> 
                </button>
              </form>
              @else               
              <form action="{{route('rating.store')}}" method="post">
                @csrf
                @method('POST')
                <input type="hidden" value="{{$post->id}}" name="post_id">
                    <button type="submit" class="flex  outline-none rounded px-2  text-gray-600 ">
                    <x-icon name="like" class="text-xl text-gray-500 mr-1.5"/>
                      <span >{{$likes}}</span> 
                    </button>
              </form>
              @endif
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

  
