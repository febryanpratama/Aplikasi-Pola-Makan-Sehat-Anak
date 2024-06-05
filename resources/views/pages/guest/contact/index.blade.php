<x-app-layout>
     <!-- Head -->
     <x-slot name="title">
          {{ __('Kontak') }}
     </x-slot>

     <!-- Head -->
     <x-slot name="head">
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
          <style>#map { height: 600px; }</style>
     </x-slot>

     <!-- Foot -->
     <x-slot name="foot">
          <!-- Make sure you put this AFTER Leaflet's CSS -->
          <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
               integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
               crossorigin=""></script>
          <script>
               var map = L.map('map').setView([-7.797068, 110.370529], 13);
               L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
               }).addTo(map);
               L.marker([-7.797068, 110.370529]).addTo(map)
                    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                    .openPopup();
          </script>
     </x-slot>
     <!-- Jumbotron -->
     <section class="dark:bg-gray-900 pt-24">
          <div class="py-8 mx-auto max-w-screen-xl lg:py-16">
               {{-- Label --}}
               <div class="flex justify-center pb-12">
                    <div class="text-center">
                         <h2 class="text-6xl font-bold text-gray-900 dark:text-white pb-4">Kontak</h2>
                         <p class="text-md text-gray-500 dark:text-gray-400">Box is a container component that can contain other elements and components.</p>
                    </div>
               </div>
               
               <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg" >
                    <div id="map"></div>
               </div>
          </div>
     </section>

     <section class="py-12">
          <div class="w-full mx-auto max-w-screen-xl mx-auto bg-white p-12 rounded-lg shadow">
               
               <ol class="items-center sm:flex">
                    <li class="relative mb-6 sm:mb-0">
                         <div class="flex items-center">
                              <div class="text-3xl p-5 z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                   1
                              </div>
                              <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                         </div>
                         <div class="mt-3 sm:pe-8">
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Alamat Kantor</h3>
                              {{-- <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on December 2, 2021</time> --}}
                              <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements.</p>
                         </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                         <div class="flex items-center">
                              <div class="text-3xl p-5 z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                   2
                              </div>
                              <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                         </div>
                         <div class="mt-3 sm:pe-8">
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Email</h3>
                              {{-- <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on December 23, 2021</time> --}}
                              <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements.</p>
                         </div>
                    </li>
                    <li class="relative mb-6 sm:mb-0">
                         <div class="flex items-center">
                              <div class="text-3xl p-5 z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                   3
                              </div>
                              <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                         </div>
                         <div class="mt-3 sm:pe-8">
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Ponsel</h3>
                              {{-- <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on January 5, 2022</time> --}}
                              <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements.</p>
                         </div>
                    </li>
               </ol>
          </div>
     </section>

     <section class="py-12">
          <div class="w-full mx-auto max-w-screen-xl mx-auto bg-white p-12 rounded-lg shadow">
               <div class="py-6">
                    <div class="text-center">
                         <h2 class="text-5xl font-bold text-gray-900 dark:text-white pb-2">Masukan</h2>
                         <p class="text-md text-gray-500 dark:text-gray-400">Box is a container component that can contain other elements and components.</p>
                    </div>
               </div>
               <form class="w-full mx-auto">
                    <div class="relative z-0 w-full mb-5 group">
                         <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                         <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                         <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                         <div class="relative z-0 w-full mb-5 group">
                         <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                         </div>
                         <div class="relative z-0 w-full mb-5 group">
                         <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                         </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                         <div class="relative z-0 w-full mb-5 group">
                         <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (123-456-7890)</label>
                         </div>
                         <div class="relative z-0 w-full mb-5 group">
                         <input type="text" name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                         <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company (Ex. Google)</label>
                         </div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                         <textarea type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required cols="30" rows="10"></textarea>
                         <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
               </form>
          </div>
     </section>

     <!-- Footer -->
     <footer class="bg-white dark:bg-gray-800 pt-[6rem] ">
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