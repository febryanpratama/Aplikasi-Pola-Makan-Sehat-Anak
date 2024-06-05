<x-app-layout>
     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Anak Perempuan') }}
          </h2>
     </x-slot>

     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <div class="flex align-baseline justify-between">
                              <div>
                                   <div class="p-4 text-gray-900 dark:text-gray-100">
                                        <h5 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                             {{ __("Tambah Anak Perempuan") }}
                                        </h5>
                                   </div>
                              </div>
                              <div>
                                   <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                              </div>
                         </div>          
                    </div>
               </div>
          </div>
     </div>

     <div class="py-3">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                   <tr>
                                        <th scope="col" class="px-6 py-3">
                                             Food Group
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Food Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Energy (kcal)
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Protein (g)
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Action
                                        </th>
                                   </tr>
                              </thead>
                              <tfoot class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                   <tr>
                                        <th scope="col" class="px-6 py-3">
                                             Food Group
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Food Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Energy (kcal)
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Protein (g)
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                             Action
                                        </th>
                                   </tr>
                              </tfoot>
                              <tbody>
                                   <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                             Apple MacBook Pro 17"
                                        </th>
                                        <td class="px-6 py-4">
                                             Silver
                                        </td>
                                        <td class="px-6 py-4">
                                             Laptop
                                        </td>
                                        <td class="px-6 py-4">
                                             $2999
                                        </td>
                                        <td class="px-6 py-4 flex gap-4">
                                             <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</a>
                                             <a href="#" class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Ubah</a>
                                             <a href="#" class="font-medium text-secondary-600 dark:text-secondary-500 hover:underline">Lihat</a>
                                        </td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>

     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <div class="flex align-baseline justify-between">
                              <div>
                                   <div class="p-4 text-gray-900 dark:text-gray-100">
                                        <h5 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                             {{ __("Halaman") }}
                                        </h5>
                                   </div>
                              </div>
                              <div>
                                   <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button>
                              </div>
                         </div>          
                    </div>
               </div>
          </div>
     </div>

</x-app-layout>