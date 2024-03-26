<x-client-layout>
@section('header')
    <x-client.navbar page="profile" /> 
    @endsection
     <!-- User card-->
     <div class="w-7/12 mx-2">
    <div class="w-full bg-cover bg-no-repeat bg-center" style="height: 200px; background-image: url(https://pbs.twimg.com/profile_banners/2161323234/1585151401/600x200);">
        <img class="opacity-0 w-full h-full" src="https://pbs.twimg.com/profile_banners/2161323234/1585151401/600x200" alt="">
    </div>
    <div class="p-4 bg-white">
        <div class="relative flex w-full">
            <!-- Avatar -->
            <div class="flex flex-1">
                <div style="margin-top: -6rem;">
                    <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                        <img style="height:9rem; width:9rem;" class="md rounded-full relative border-4 border-gray-900" src="https://pbs.twimg.com/profile_images/1254779846615420930/7I4kP65u_400x400.jpg" alt="">
                        <div class="absolute"></div>
                    </div>
                </div>
            </div>
            <!-- Follow Button -->
            <div class="flex flex-col text-right">
                <button class="flex justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                    Edit Profile
                </button>
            </div>
        </div>

        <!-- Profile info -->
        <div class="space-y-1 justify-center w-full mt-3 ml-3">
            <!-- User basic-->
            <div>
                <h2 class="text-xl leading-6 font-bold ">Youssef Hihi</h2>
            </div>
            <!-- Description and others -->
            <div class="mt-3">
                <p class=" leading-tight mb-2">Software Engineer / Designer / Entrepreneur Visit my website to test a working  </p>
                <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon"><g><path d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z"></path><circle cx="7.032" cy="8.75" r="1.285"></circle><circle cx="7.032" cy="13.156" r="1.285"></circle><circle cx="16.968" cy="8.75" r="1.285"></circle><circle cx="16.968" cy="13.156" r="1.285"></circle><circle cx="12" cy="8.75" r="1.285"></circle><circle cx="12" cy="13.156" r="1.285"></circle><circle cx="7.032" cy="17.486" r="1.285"></circle><circle cx="12" cy="17.486" r="1.285"></circle></g></svg> <span class="leading-5 ml-1">Joined December, 2019</span></span>

            </div>
            <div class="pt-3 flex justify-between px-16 items-center w-full ">
                <div class=" gap-1">
                    <x-icon name="post"/>
                    <p class="text-gray-700">10</p>
                </div>
                <div class=" gap-1">
                    <x-icon name="heart"/>
                    <p class="text-gray-700">13</p>
                </div>
                <div class=" gap-1">
                    <x-icon name="comments"/>
                    <p class="text-gray-700">12</p>
                </div>
            </div>
        </div>
   
    </div>
     <x-client.client-articles/>
  
   
</div>
<x-client.side-cards/>
</x-admin-layout>