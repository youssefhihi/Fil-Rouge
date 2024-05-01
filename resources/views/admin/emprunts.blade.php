<x-admin-layout>
 <!-- CONTENT -->
 
 <nav class = "flex px-5 py-3 text-gray-700 mb-6 rounded-lg bg-gray-300  " aria-label="Breadcrumb">
            <ol class = "flex justify-center items-center  space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="/dashboard/emprunts" class = "inline-flex items-center text-sm font-medium text-black ">
                    Emprunts
                    </a>
                </li>
                <li>
                    <div class = "flex items-center">
                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                        <a href="/dashboard/emprunts/return-date" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">
                        Today's Return
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
                    Days to return
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($reservations as $reservation )

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
                @endif
             </div>
             <div class="text-sm font-medium text-gray-900 ml-4">
                 {{$reservation->client->user->name}}
             </div>
         </a>
     </td>
     <td class="px-5 py-4 whitespace-nowrap">
         <div class="flex items-center">
             <div class="flex-shrink-0">
                 <img class="h-20 w-14" src="{{asset('storage/'. $reservation->book->image->path)}}" alt="">
             </div>

         </div>
     </td>
     <td class="px-6 py-4 whitespace-nowrap text-md text-gray-500">

         <span>{{ $reservation->daysUntilReturn() }} </span> Days
     </td>

 </tr>
@empty
<tr>
        <td>
            <td>
                no Emprunts
            </td>
        </td>
    </tr>
@endforelse

        </tbody>
    </table>

</x-admin-layout>