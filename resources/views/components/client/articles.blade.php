  <!-- article -->
  @props(['posts','page'])
  <div class="lg:w-6/12 md:7/12 mx-2">
  <x-success-message class="m-3"/>   
  <x-error-message class="m-3"/> 
         <!--Form   -->
         <!-- object-fill -->
         <div id="comment-popup" class="hidden min-w-screen lg:px-14 lg:py-5 h-screen animated fadeIn faster fixed left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full max-w-xl p-5 relative rounded-xl shadow-lg h-full bg-white overflow-y-auto">
                <div class="comments-container w-full flex flex-col gap-4">
                </div>
                <form id="commentForm" method="post" class="w-full  rounded-md sticky bottom-2" >
                    
                </form>
            </div>
        </div>


         <div id="addPost" class=" hidden min-w-screen lg:p-14 h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
              <div class="w-full max-w-lg lg:max-w-full p-5 relative mx-auto my-auto rounded-xl shadow-lg h-full  bg-white overflow-y-auto ">
                                      <!-- Form to add Author -->
                      <form method="POST"  action="{{route('post.store')}}" class="space-y-4 " enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <div class="flex flex-col gap-5 lg:flex-row lg:justify-between lg:gap-0">
                            <div class="flex justify-center mx-auto lg:mx-0 lg:w-1/2">
                              <x-image-input page="post" path="{{asset('imgs/postImage.png')}}" class="h-80  w-64 object-fill rounded-sm"/> 
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
          <div class="py-2 flex justify-between items-center font-serif">
            <button onclick="openAddPost()" class="flex space-x-1  text-black font-normal py-1 px-3 rounded-md  transform hover:scale-105  transition duration-300 ease-in-out">
              <span class="text-md pr-1">Advice</span>
              <x-icon class="rounded-md p-1 bg-gradient-to-r from-red-700 to-red-300 text-white  hover:from-red-600 hover:to-red-200" name="advice"/>
            </button>

            <button onclick="openAddPost()" class="flex space-x-1  text-black font-normal py-1 px-3 rounded-md  transform hover:scale-105  transition duration-300 ease-in-out">
              <span class="text-md pr-1">Question</span>
              <x-icon class="rounded-md p-1 bg-gradient-to-r from-red-700 to-red-300 text-white  hover:from-red-600 hover:to-red-200"  name="question"/>
            </button>


            <button onclick="openAddPost()" class="flex space-x-1  text-black font-normal py-1 px-3 rounded-md  transform hover:scale-105  transition duration-300 ease-in-out">
            <span class="text-md pr-1 ">General </span>
            <x-icon  class="rounded-md p-1 bg-gradient-to-r from-red-700 to-red-300  text-white hover:from-red-600 hover:to-red-200" name="general"/>
            </button>
          </div>
         </div>
          @if ($page === 'user_profile')
          <form id="sortForm" method="GET" action="{{ route('home.index') }}" class="space-y-4">
          @else            
          <form id="sortForm" method="GET" action="{{ route('home.index') }}" class="space-y-4">
          @endif
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
                  <div class="flex ">
                      <a href="{{route('user.profile',  $post->client->user->username)}} " class="w-12 h-12 rounded-full mr-2">
                        @if ($post->client->image)
                        <img src="{{asset('storage/'. $post->client->image->path)}}" alt="profile" class="w-full rounded-full">
                        @else
                        @if ($post->client->gender === 'female')
                        <img src="{{asset('imgs/profileFemale.png')}}" alt="profile" class="w-full rounded-full">
                        @else          
                        <img src="{{asset('imgs/profileMale.png')}}" alt="profile" class="w-full rounded-full">             
                        @endif
                        @endif
                      </a>
                      <div>
                        <a href="{{route('user.profile',  $post->client->user->username)}} " >
                          <span class="text-gray-700 font-bold hover:text-gray-500 hover:underline ">{{$post->client->user->name}}</span>                 
                        </a>
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
                  </div>

                
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
             @php
                $likesCount = $post->likes->where("post_id",$post->id)->count();          
              @endphp
              @if (Auth::user()->client->likes->contains('post_id', $post->id))
              @php
                  $like = Auth::user()->client->likes->where('post_id', $post->id)->first();
              @endphp
              <form method="post" id="removeLike" >
                @csrf
                @method('DELETE')
                <button  onclick="removeLike(this,'{{$like->id}}')"  class="flex text-red-600 outline-none rounded px-2  text-gray-600 ">
                  <x-icon name="like" class="text-xl  mr-1.5"/>
                  <span class="span" >{{$likesCount}} </span> 
                </button>
              </form>
              @else               
              <form  method="post" >
                @csrf
                @method('POST')
                <div></div>
                <input type="hidden" value="{{$post->id}}" name="post_id">
                    <button onclick="addLike(this)" id="like" class="flex text-gray-500 outline-none rounded px-2  text-gray-600 ">
                    <x-icon name="like" class="text-xl  mr-1.5"/>
                      <span class="span">{{$likesCount}}</span> 
                    </button>
              </form>
              @endif
               <button   onclick="openComment(this,'{{$post->id}}')" class="flex  outline-none rounded  px-2  text-gray-600 hover:bg-gray-200">
                  <i class="far fa-comment-dots text-xl mr-1.5"></i>
                  <span class="commentCount">12</span>  
               </button>
             </div> 
              </div>
            </section>

          @endforeach
          </article>
        </div>


            <script>              
              function openComment(button, id) {
                    $(button).on('click', function(event) {
                        $.ajax({
                            url: "{{ route('comment.show', '') }}" + '/' + id,
                            method: 'GET',
                            dataType: 'json',
                            success: function(data) {
                              console.log(data);
                              var popup = $('#comment-popup');
                                  popup.removeClass('hidden');

                                  $('.comments-container').empty();
                                  data.comments.forEach(function(comment) {
                                      var commentHtml = `

                                      <div class="flex items-center space-x-2">
                                        <div class="group relative flex flex-shrink-0 self-start cursor-pointer">
                                          <img src=" /storage/${comment.client.image.path}" alt="" class="h-8 w-8 object-fill rounded-full">
                                          
                                        </div>
                                        <div class="flex justify-between rounded-xl bg-gray-100 w-full">
                                            <div class=" w-auto  px-2 pb-2">
                                            <div class="font-medium">
                                                <a href="/${comment.client.user.username}" class="hover:underline text-sm flex ">
                                                <small>${comment.client.user.name}</small>
                                                </a>
                                            </div>
                                            <div class="text-xs">
                                            ${comment.content}
                                            </div>
                                            </div>
                                            <form method="post" >
                                              @csrf
                                              @method('DELETE')
                                                  <button onclick="deleteComment(this,${comment.id})" 
                                                      <x-icon name="delete" class="text-xs pt-1"/> 
                                                  </button>
                                            </form>
                                      </div>
                                      </div>
                                      `;
                                      $('.comments-container').append(commentHtml);                                 
                                     });
                                     console.log(id);
                                     var form = `
                                     @csrf
                                        @method('POST')
                                        <div class="flex items-center border border-gray-300 bg-white px-2 py-1 rounded-xl">
                                            <input type="hidden" name="post_id" value="${id}">
                                          <input type="text" name="content" class="w-full rounded-md focus:outline-none" placeholder="Write a comment...">
                                            <button onclick="addComment(this)" class="bg-gray-500 text-black px-3 py-1 rounded-md ml-2">
                                                <span class="fas fa-paper-plane"></span> 
                                            </button>
                                        </div>
                                     `;
                                     $('#commentForm').html(form);
                              },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    });
                }


                function addComment(button)
                {
                  var form = button.closest('form');
                  $(form).on('submit',function(event){
                    event.preventDefault();
                    $.ajax({
                        url: "{{route('comment.store')}}",
                        data: jQuery(form).serialize(),
                        method: 'POST',
                        success: function(result) {
                          var popup = $('#comment-popup');
                          popup.removeClass('hidden');
                          $('.comments-container').empty();
                          result.comments.forEach(function(comment) {
                              var commentHtml = `
                                  <div class="flex items-center space-x-2">
                                      <div class="group relative flex flex-shrink-0 self-start cursor-pointer">
                                          <img src="/storage/${comment.client.image.path}" alt="" class="h-8 w-8 object-fill rounded-full">
                                      </div>
                                      <div class="flex justify-between w-full bg-gray-100 rounded-xl ">
                                          <div class=" w-auto px-2 pb-2">
                                              <div class="font-medium">
                                                  <a href="/${comment.client.user.username}" class="hover:underline text-sm flex">
                                                      <small>${comment.client.user.name}</small>
                                                  </a>
                                              </div>
                                              <div class="text-xs">${comment.content}</div>
                                          </div>
                                          <form method="post" >
                                              @csrf
                                              @method('DELETE')
                                                  <button onclick="deleteComment(this,${comment.id})" 
                                                      <x-icon name="delete" class="text-xs pt-1"/> 
                                                  </button>
                                            </form>
                                      </div>
                                  </div>
                              `;
                              $('.comments-container').append(commentHtml);
                          });
                          jQuery(form)[0].reset();  
                          $(form).unbind();
                      },

                    });
                  })

                }


                function deleteComment(button,id)
                {
                  var form = button.closest('form');
                  $(form).on('submit',function(event){
                    event.preventDefault();
                    $.ajax({
                      url: '/comment/delete/' + id,
                        data: jQuery(form).serialize(),
                        method: 'DELETE',
                        success: function(result) {
    var popup = $('#comment-popup');
    popup.removeClass('hidden');

    // Clear the comments container
    $('.comments-container').empty();

    // Iterate through the newly received comments and append them to the container
    result.comments.forEach(function(comment) {
        var commentHtml = `
            <div class="flex items-center space-x-2">
                <div class="group relative flex flex-shrink-0 self-start cursor-pointer">
                    <img src="/storage/${comment.client.image.path}" alt="" class="h-8 w-8 object-fill rounded-full">
                </div>
                <div class="flex justify-between w-full bg-gray-100 rounded-xl">
                    <div class="w-auto px-2 pb-2">
                        <div class="font-medium">
                            <a href="/${comment.client.user.username}" class="hover:underline text-sm flex">
                                <small>${comment.client.user.name}</small>
                            </a>
                        </div>
                        <div class="text-xs">${comment.content}</div>
                    </div>
                    <form method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="deleteComment(this,${comment.id})">
                            <x-icon name="delete" class="text-xs pt-1"/>
                        </button>
                    </form>
                </div>
            </div>
        `;
        $('.comments-container').append(commentHtml);
    });

    // Unbind the form submission event
    $(form).unbind();
}


                    });
                  })

                }



    function addLike(button) {
      var form = button.closest('form');
    $(form).on('submit',function(event){
      event.preventDefault();


      $.ajax({
          url: "{{route('rating.store')}}",
          data: jQuery(form).serialize(),
          method: 'POST',
          success: function (result) {
            $(button).find('.span').html(result.countLikes);
            console.log(result.countLikes);
              const newForm = `
                @csrf
                @method('DELETE')
                <button  onclick="removeLike(this,'${result.like_id}')"  id="unlike" class="flex text-red-600 outline-none rounded px-2  text-gray-600 ">
                  <x-icon name="like" class="text-xl  mr-1.5"/>
                  <span class="span" >${result.countLikes} </span> 
                </button>`;
              $(form).html(newForm);
              $(form).unbind();
          },
      });
    })

}

function removeLike(button, id) {
    var form = button.closest('form');
$(form).on('submit',function(event){
  event.preventDefault();
    $.ajax({
        url: '/rating/' + id, 
        data:jQuery(form).serialize(),
        method: 'DELETE',
        success: function (result) {
          $(button).find('.span').html(result.countLikes);
              const newForm = `
              @csrf
              @method('post')
              <input type="hidden" value="${result.post}" name="post_id">
                    <button onclick="addLike(this)" id="like" class="flex text-gray-500 outline-none rounded px-2  text-gray-600 ">
                    <x-icon name="like" class="text-xl  mr-1.5"/>
                      <span class="span">${result.countLikes} </span> 
                    </button>`;
              $(form).html(newForm);
              $(form).unbind();
        },
       
    });
  })


}






        </script>
        
  
