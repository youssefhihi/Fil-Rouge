
<x-client-layout>
@section('header')
    <x-client.navbar page="profile" /> 
@endsection

<div i class="  min-w-screen lg:p-14 h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
              <div class="w-full max-w-lg lg:max-w-full p-5 relative mx-auto my-auto rounded-xl shadow-lg h-full  bg-white overflow-y-auto ">
                                      <!-- Form to add Author -->
                      <form method="POST"  action="{{route('post.update',$post)}}" class="space-y-4 " enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="flex flex-col gap-5 lg:flex-row lg:justify-between lg:gap-0">
                            <div class="flex justify-center mx-auto lg:mx-0 lg:w-1/2">
                                @if ($post->image)             
                                <x-image-input page="post" path="{{asset('storage/' . $post->image->path)}}" class="h-80  w-64 object-fill rounded-sm"/> 
                                @else
                                <x-image-input page="post" path="{{asset('imgs/postImage.png')}}" class="h-80  w-64 object-fill rounded-sm"/> 
                                @endif
                            </div>                         
                          <div class="flex flex-col mt-10 lg:w-1/2">                
                            <div class="col-span-2">
                                <label for="description" class="block capitalize mb-2 text-sm font-medium text-gray-900">description</label>
                                <textarea id="description" rows="6" name="description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="enter description here" >{{$post->description}}</textarea>
                            </div>                              
                            <div class="flex flex-col mt-5 space-y-2 sm:flex-row sm:space-x-2  lg:flex-row lg:space-x-2 border-[3px] border-gray-600 rounded-xl select-none">
                                      <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer">
                                        <input type="radio"  name="type" value="general" class="peer hidden" {{$post->type == 'general' ? 'checked' : '' }}/>
                                        <span class=" flex tracking-widest peer-checked:bg-gradient-to-r peer-checked:from-[black] peer-checked:to-[gray] peer-checked:text-white text-gray-700 p-2 rounded-lg transition duration-150 ease-in-out">
                                          <span>General</span> <x-icon name="general"/>
                                        </span>
                                      </label>

                                      <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer" >
                                        <input type="radio" name="type" value="question" class="peer hidden" {{$post->type == 'question' ? 'checked' : '' }}/>
                                        <span class="flex tracking-widest peer-checked:bg-gradient-to-r peer-checked:from-[gray] peer-checked:to-[black] peer-checked:text-white text-gray-700 p-2 rounded-lg transition duration-150 ease-in-out">
                                        <span>Question</span> <x-icon name="question" class=""/>
                                        </span>
                                      </label>
                                      <label class="radio flex flex-grow items-center justify-center rounded-lg p-1 cursor-pointer">
                                        <input type="radio" name="type" value="advice" class="peer hidden" {{$post->type == 'advice' ? 'checked' : '' }}/>
                                        <span class="flex tracking-widest peer-checked:bg-gradient-to-r peer-checked:from-[gray] peer-checked:to-[black] peer-checked:text-white text-gray-700 p-2 rounded-lg transition duration-150 ease-in-out">
                                        <span>Advice</span> <x-icon name="advice" class="pl-1"/>
                                        </span>
                                      </label>
                                    </div>

                              <div class="flex space-x-6 mt-10">
                                <button type="submit" class="cursor-pointer w-full mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                                  <a href="/profile" class=" w-full text-center cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-md shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</a>
                              </div>
                          </div> 
                      </div>
                  </form>
              </div>
          </div>
          </x-client-layout>
