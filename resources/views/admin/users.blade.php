<x-admin-layout>
 <!-- CONTENT -->
    

    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto mt-10">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Can Post
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Block
                </th>
                
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ( $users as $user)               
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="#" class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$user->name}}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{$user->email  }}
                            </div>
                        </div>
                    </a href="#">
                </td>
                
                <td class="px-6 py-4 whitespace-nowrap">
                    <form action="{{ route('users.canPost', $user) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @if ($user->client->can_post)
                        <button type="submit"><x-icon name="allow"/></button> 
                        @else
                        <button type="submit"><x-icon name="not-allowed"/></button> 
                        @endif
                    </form>           
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">                   
                    <form action="{{ route('users.block', $user) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @if ($user->client->is_banned)
                        <button type="submit"><x-icon name="user-deblock"/></button> 
                        @else
                        <button type="submit"><x-icon name="user-remove"/></button> 
                        @endif
                    </form>        
                </td>
                
            </tr>
            @endforeach            
        </tbody>
    </table>

</x-admin-layout>