<x-admin-layout>
 <!-- CONTENT -->
 <x-success-alert/>
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
        <thead class="bg-gray-50">
            <tr>
                <x-table.th name="Users"/> 
                <x-table.th name="Can Post"/> 
                <x-table.th name="Block"/> 
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ( $users as $user)               
            <x-table.tr>
                <x-table.td>
                    <a href="{{route('Profile', $user->username)}}" class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-14">
                        @if ($user->client->image)
                         <img class="h-14 w-14 rounded-full" src="{{asset('storage/'. $user->client->image->path)}}" alt="">
                        @else
                        @if ($user->client->gender === 'female')
                        <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileFemale.png')}}" alt="">                       
                        @else                       
                        <img class="h-14 w-14 rounded-full" src="{{asset('imgs/profileMale.png')}}" alt="">                       
                        @endif
                        @endif                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$user->name}}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{$user->email  }}
                            </div>
                        </div>
                    </a>
                </x-table.td>
                
                <x-table.td>
                    <form action="{{ route('users.canPost', $user) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @if ($user->client->can_post)
                        <button type="submit"><x-icon name="allow"/></button> 
                        @else
                        <button type="submit"><x-icon name="not-allowed"/></button> 
                        @endif
                    </form>           
                </x-table.td>

                <x-table.td>
                    <div class ="text-sm text-gray-500">                   
                        <form action="{{ route('users.block', $user) }}" method="post">
                            @csrf
                            @method('PATCH')
                            @if ($user->client->is_banned)
                            <button type="submit"><x-icon name="user-deblock"/></button> 
                            @else
                            <button type="submit"><x-icon name="user-remove"/></button> 
                            @endif
                        </form>        
                    </div> 
                </x-table.td>
                </x-table.tr>
            @endforeach            
        </tbody>
    </table>

</x-admin-layout>