<x-admin-layout>
 <!-- CONTENT -->
 <nav class = "flex px-5 py-3 text-gray-700 mb-6 rounded-lg bg-gray-300  " aria-label="Breadcrumb">
            <ol class = "flex justify-center items-center  space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="/dashboard/reservations" class = "inline-flex items-center text-sm font-medium text-black ">
                    Reservations
                    </a>
                </li>
                <li>
                    <div class = "flex items-center">
                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                        <a href="/dashboard/reservation/today" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">
                        Today's Reservation
                        </a>
                    </div>
                </li>
            </ol>
</nav>
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    borrower                
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Book
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Duration
                </th>
                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Operations
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ( $reservations  as $reservation )
                
            <tr>
                 <td class="px-2 py-4 whitespace-nowrap">
                     <a href="{{route('Profile', $reservation->client->user->username)}}" class="flex items-center">
                         <div class="flex-shrink-0">
                         @if ($reservation->client->image)
                         <img class="h-14 w-14 rounded-full" src="{{asset('storage/'. $reservation->client->image->path)}}" alt="">
                        @else
                        @if ($reservation->client->gender === 'female')
                        <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileFemale.png')}}" alt="">                       
                        @else                       
                        <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileMale.png')}}" alt="">                       
                        @endif
                        @endif                         </div>
                         <div class="text-sm font-medium text-gray-900 ml-4">
                         {{$reservation->client->user->name}}
                         </div>
                     </a>
                 </td>
                 <td class="px-5 py-4 whitespace-nowrap">
                     <div class="flex items-center">
                         <div class="flex-shrink-0">
                             <img class="h-20 w-14" src="{{asset('storage/' . $reservation->book->image->path)}}" alt="">
                         </div>
                         
                     </div>
                 </td>
                 <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">
                 <span>{{ $reservation->duration() }} Days</span>
                 </td>
                 <td class=" py-10 flex space-x-3  whitespace-nowrap text-sm text-gray-500">                                   
                        <button onclick="openModal('{{ $reservation->id}}')"><x-icon name="refuse"/></button>         
                     <x-icon name="detailsB"/>
                 </td>
             </tr>
                      
             
             <div id="reservationDelete{{ $reservation->id}}" class=" hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover">
            <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                                    <!-- Form to add genre -->
                    <form method="POST"  action="{{route('reservations.destroy',$reservation)}}" class="space-y-4">
                        @csrf
                        @method('DELETE')
                            <div class="flex flex-col">
                            <label for="name" class="text-md flex space-x-3  mb-1 "><span>Send Email</span> 
                            <input checked type="checkbox" class="relative w-6 h-6 aspect-square !appearance-none !bg-none checked:!bg-gradient-to-tr checked:!from-black checked:!to-white bg-white border border-gray-300 shadow-sm rounded !outline-none !ring-0 !text-transparent !ring-offset-0 checked:!border-balck hover:!border-gray-800 cursor-pointer transition-all duration-300 ease-in-out focus-visible:!outline-offset-2 focus-visible:!outline-2 focus-visible:!outline-sky-400/30 focus-visible:border-gray-400 after:w-[35%] after:h-[53%] after:absolute after:opacity-0 after:top-[40%] after:left-[50%] after:-translate-x-2/4 after:-translate-y-2/4 after:rotate-[25deg] after:drop-shadow-[1px_0.5px_1px_rgba(56,149,248,0.5)] after:border-r-[0.25em] after:border-r-white after:border-b-[0.25em] after:border-b-white after:transition-all after:duration-200 after:ease-linear checked:after:opacity-100 checked:after:rotate-45">  
                            </label>
                            <x-textarea  name="message" label="write why" />  
                            <p id="messageError" class="hidden text-red-400 text-sm">Please use letters only, Avoid numbers or special characters.</p>
                                <div class="flex space-x-8 justify-end mt-5">
                                    <button type="submit" class="cursor-pointer mb-2 md:mb-0 bg-gray-900 border border-gray-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-gray-700">Save</button>
                                    <p onclick="closeModal('{{ $reservation->id}}')" class=" cursor-pointer mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-1 text-sm shadow-sm font-medium tracking-wider text-white rounded-md hover:shadow-lg hover:bg-red-600"> Close</p>
                            </div>
                        </div>
                    </form>
            </div>
        </div>


            @empty
            <tr>
                <td colspan="3">
                    <div class="text-xl text-gray-800 mt-10 text-center">
                        No reservations 
                    </div>
                </td>
            </tr>     
            @endforelse
        </tbody>
    </table>

    <script>
    function openModal(id) {
      document.getElementById(`reservationDelete${id}`).classList.remove('hidden');
      }
      
      function closeModal(id) {
      document.getElementById(`reservationDelete${id}`).classList.add('hidden');
      }

    </script>
</x-admin-layout>