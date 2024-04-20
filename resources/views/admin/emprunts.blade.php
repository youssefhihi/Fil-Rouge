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
                    Duration
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          

        </tbody>
    </table>

</x-admin-layout>