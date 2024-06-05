<x-app-layout>
     <!-- Jumbotron -->
     <section class="py-12 bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
          <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
               {{-- <a href="#" class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
               <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">New</span> <span class="text-sm font-medium">Jumbotron component was launched! See what's new</span> 
               <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
               </svg>
               </a> --}}
               <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Pencarian Jenis Makanan</h1>
               <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Berikut merupakan jenis-jenis rekomendasi makanan sehat.</p>
               {{-- <form class="w-full mx-auto pt-6">
                    <label for="default-email" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Jenis Makanan</label>
                    <div class="relative">
                         <input type="email" id="default-email" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis jenis makanan anda disini ..." required>
                         <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                    </div>
               </form> --}}
          </div>
          {{-- <div class="bg-gradient-to-b from-blue-50 to-transparent dark:from-blue-900 w-full h-full absolute top-0 left-0 z-0"></div> --}}
     </section>



     <section class="bg-white dark:bg-gray-900">
          <div class="w-full mx-auto max-w-screen-xl p-4 border-t md:items-center md:justify-between ">
               <div class="w-full border-b flex justify-between align-content-center">
                    <div>
                         <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Makanan</h2>
                    </div>
                    <div>
                         <h2 class="mb-4 text-md font-thin tracking-tight text-gray-900 dark:text-white">Total <span class="ms-2">: Makanan</span></h2>
                    </div>
               </div>
               <div class="grid grid-rows w-full">
                    {{-- Content Detail Food --}}
                    <div class="w-full">
                         <div class="mt-6 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-full dark:border-gray-700 dark:bg-gray-800">
                              <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="
                              @if ($food->image)
                                   {{ asset('storage/' . $food->image) }}
                              @else
                                   https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D
                              @endif
                              " alt="">
                              <div class="flex flex-col justify-between p-4 leading-normal">
                                   <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $food->name }}</h5>
                                   <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        Kelompok Makanan <span class="ml-1 mr-2 font-extrabold">{{ $food->foodGroup->name }}</span>
                                        Energy <span class="ml-1 mr-2 font-extrabold">{{ $food->energy }}</span>
                                        Protein <span class="ml-1 mr-2 font-extrabold">{{ $food->protein }}</span>
                                        Fat <span class="ml-1 mr-2 font-extrabold">{{ $food->fat }}</span>
                                        Carbohydrate <span class="ml-1 mr-2 font-extrabold">{{ $food->carbohydrates }}</span>
                                   </p>
                                   <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        Deskripsi <span class="ml-1 mr-2 font-extrabold">{{ $food->description }}</span>
                                   </p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <!-- Footer -->
     <footer class="bg-white dark:bg-gray-800 pt-[3rem] ">
          <div class="w-full mx-auto max-w-screen-xl p-4 border-t md:flex md:items-center md:justify-between">
               <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
               </span>
               <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                    <li>
                         <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                         <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                         <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                         <a href="#" class="hover:underline">Contact</a>
                    </li>
               </ul>
          </div>
     </footer>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</x-app-layout>