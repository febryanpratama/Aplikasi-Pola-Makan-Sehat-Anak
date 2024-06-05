<x-app-layout>
     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Makanan') }}
          </h2>
     </x-slot>

     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
               <a href="{{ route('admin.food.create') }}" class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
               <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">Baru</span> <span class="text-sm font-medium">Tambah Kelompok Makanan baru</span> 
               <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
               </svg>
               </a>
               <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Daftar Kelompok Makanan</h1>
               <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Berikut ini merupakan Pengelompokan Makanan.</p>
               <form class="w-full mx-auto pt-6" action="{{ route('admin.food.search') }}" method="POST">   
                    @csrf
                    @method("POST")
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Email sign-up</label>
                    <div class="relative">
                         <div class="absolute inset-y-0 rtl:inset-x-0 start-0 flex items-center ps-3.5 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                   <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                   <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                              </svg>
                         </div>
                         <input type="text" id="search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis pencarian anda disini ..." required>
                         <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                    </div>
               </form>
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
                                        </th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @isset($foods)
                                        @foreach ($foods as $item)
                                             <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                       {{ $item->foodGroup->name }}
                                                  </th>
                                                  <td class="px-6 py-4">
                                                       {{ $item->name }}
                                                  </td>
                                                  <td class="px-6 py-4">
                                                       {{ $item->energy }}
                                                  </td>
                                                  <td class="px-6 py-4">
                                                       {{ $item->protein }}
                                                  </td>
                                                  <td class="px-6 py-4 flex gap-4 justify-end">
                                                       <button data-modal-target="popup-modal-{{ $item->slug }}" data-modal-toggle="popup-modal-{{ $item->slug }}" class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150" type="button">
                                                            {{ __('Hapus') }}
                                                       </button>

                                                       <a href="{{ route('admin.food.edit', [$item->slug]) }}" class="inline-flex items-center px-4 py-2 bg-yellow-400 dark:bg-yellow-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-yellow-400 uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-white focus:bg-yellow-700 dark:focus:bg-white active:bg-yellow-900 dark:active:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-yellow-400 transition ease-in-out duration-150">
                                                            {{ __('Ubah') }}
                                                       </a>
                                                       
                                                       <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                       {{ __('Lihat Tampilan') }}
                                                       </a>

                                                       <div id="popup-modal-{{ $item->slug }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                                 <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $item->slug }}">
                                                                           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                           </svg>
                                                                           <span class="sr-only">Keluar</span>
                                                                      </button>
                                                                      <form action="{{ route('admin.food.destroy', [$item->slug] ) }}" method="post">
                                                                           @csrf
                                                                           @method('delete')
                                                                           <div class="p-4 md:p-5 text-center">
                                                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                                </svg>
                                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah kamu akan menghapus {{ $item->name }}?</h3>
                                                                                <button data-modal-hide="popup-modal-{{ $item->slug }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                                     Hapus
                                                                                </button>
                                                                                <button data-modal-hide="popup-modal-{{ $item->slug }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                                                           </div>
                                                                      </form>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </td>
                                             </tr>
                                        @endforeach
                                   @endisset
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
                         <div class="m-2 p4">
                              {{ $foods->links() }}
                         </div>
                    </div>
               </div>
          </div>
     </div>

</x-app-layout>