
  
  @props(['posts','page'])

         <!-- Sort -->
         <form id="sortForm" method="GET" action="{{ route('profile.index') }}" class="space-y-4">
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
                      <a href="{{route('user.profile',  $post)}} " class="w-12 h-12 rounded-full mr-2">
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
                        <a href="{{route('user.profile',$post)}} " >
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
               <button  class="flex  outline-none rounded  px-2  text-gray-600 hover:bg-gray-200">
                <i class="far fa-comment-dots text-xl mr-1.5"></i> 
                <span  >10</span>  
               </button>
             </div> 
              </div>
            </section>

          @endforeach
          </article>
 
               <script>

    

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
         
         