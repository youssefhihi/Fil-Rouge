<x-admin-layout>
    
<div class="bg-gray-50 p-2">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2 stickey">
                <!-- Profile Card -->
                <div class="bg-white p-3 ">
                    <div class="image overflow-hidden">
                    @if ($user->client->image)
                    <img class="h-auto w-full mx-auto"
                        src="{{asset('storage/' . $user->client->image->path)}}"
                        alt="Profile">
                    @else
                    @if ($user->client->gender === 'female')
                    <img class="h-auto w-full mx-auto"
                        src="{{asset('imgs/profileFemale.png')}}"
                        alt="Profile">
                    @else  
                    <img class="h-auto w-full mx-auto"
                        src="{{asset('imgs/profileMale.png')}}"
                        alt="Profile">
                    @endif
                    @endif
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->name}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Bio:</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                        @if ($user->client->bio)
                        {{$user->client->bio}}
                        @else
                            doesn't write it 
                        @endif
                    </p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                       
                        <li class="flex items-center py-3">
                            <span>Joined At</span>
                            <span class="ml-auto"> {{ date('F Y', strtotime($user->created_at)) }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
                
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <div class = "flex flex-wrap my-5 -mx-2">
           
                <x-cards name="Total Posts" :count="$user->client->posts->count()" icon="post"/>
                <x-cards name="Total Likes" :count="$countLikes" icon="like"/>
                <x-cards name="Total Comments" :count="$countComments" icon="comments"/>

                </div>
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm ">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-md">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Full Name</div>
                                <div class="px-4 py-2">{{$user->name}}</div>
                            </div>
                           
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">{{$user->client->gender}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{$user->client->phone}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">City</div>
                                <div class="px-4 py-2">{{$user->client->city}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:jane@example.com">{{$user->email}}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{$user->client->birthday}}</div>
                            </div>
                        </div>
                        <div class="flex justify-between max-w-md  mt-5">
                            <div class="px-4 py-2 font-semibold ">Social Links</div>
                            <div class="flex  space-x-10">
                            @if ( $user->client->linkedIn )                   
                            <button class="flex justify-center items-center">
                            <a target="_blanc" href="{{ $user->client->linkedIn }}"  class="group flex justify-center p-2 rounded-md drop-shadow-xl bg-[#0077b5] from-gray-800 text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                                <x-icon name="linkedIn"/>
                                <span class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700">
                                Linkedin
                                </span>
                            </a>
                            </button>
                            @endif
                            @if ($user->client->instagram )
                                
                            <button class="flex justify-center items-center">
                                <a href="{{ $user->client->instagram }}" class="group flex justify-center p-2 rounded-md drop-shadow-xl from-gray-800 bg-[#e331f5] text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                                    <x-icon name="inst"/>
                                    <span class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700">
                                        Instagram
                                    </span>
                                </a>
                            </button>
                            @endif
                            @if ($user->client->facebook )
                                
                            <button class="flex justify-center items-center">
                                <a href="/" class="group flex justify-center p-2 rounded-md drop-shadow-xl from-gray-800 bg-[#316FF6] text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                                    <x-icon name="facebook"/>
                                    <span
                                    class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700" >
                                    Facebook
                                    </span>
                                </a>
                            </button>
                            @endif
                            @if ( $user->client->X)
                                
                            <button class="flex justify-center items-center">
                                <a href="/" class="group flex justify-center p-2 rounded-md drop-shadow-xl bg-gradient-to-r from-gray-800 to-black text-white font-semibold hover:translate-y-3 hover:rounded-[50%] transition-all duration-500 hover:from-[#331029] hover:to-[#310413]">
                                <x-icon name="x"/>
                                <span
                                class="absolute opacity-0 group-hover:opacity-100 group-hover:text-gray-700 group-hover:text-sm group-hover:-translate-y-10 duration-700">
                                X
                                </span>
                                </a>
                            </buuton>
                            @endif
                            </div>
                        </div>
                    </div>
                 
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>
                <table class="min-w-full overflow-x-scroll divide-y divide-gray-200 mt-6 rounded-2xl">
                        <thead class="bg-gray-300 rounded-xl">
                            <tr>
                                <x-table.th name="Books"/> 
                                <x-table.th name="Date Reservation "/>              
                                <x-table.th name="Due Date"/>              
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 rounded-xl">   
                        @foreach ($user->client->reservations as $reservation)
                            <x-table.tr>
                                <x-table.td>
                                <a href="{{route('books.show',$reservation->book->ISBN)}}" class="flex items-center">
                                    <div class="flex-shrink-0 h-14 w-10">
                                        <img class="h-14 w-10 drop-shadow-2xl" src="{{asset('storage/' . $reservation->book->image->path) }}" alt="">
                                    </div>
                                    <div class="text-sm font-medium text-gray-900 ml-4">
                                        {{$reservation->book->title}}
                                    </div>
                                </a>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$reservation->created_at->format('Y-m-d')}}</div>
                                </x-table.td>
                                <x-table.td>
                                    <div class="text-sm font-medium text-gray-900">{{$reservation->duration()}}</div>
                                </x-table.td>
                            </x-table.tr>                  
                        @endforeach
                        </tbody>
                    </table>
                    
            </div>
        </div>
    </div>
</div>
</x-admin-layout>