<x-app-layout>
     <!-- Jumbotron -->

     <section class="dark:bg-gray-900 pt-24">
          <div class="py-8 mx-auto max-w-screen-xl lg:py-16">
               {{-- Label --}}
               <div class="flex justify-center pb-12">
                    <div class="text-center">
                         <h2 class="text-6xl font-bold text-gray-900 dark:text-white pb-4">About</h2>
                         <p class="text-md text-gray-500 dark:text-gray-400">Box is a container component that can contain other elements and components.</p>
                    </div>
               </div>
               
               <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8" >
                    <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                         <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                              <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                         </svg>
                         Tutorial
                    </a>
                    <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">How to quickly deploy a static website</h1>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers.</p>
               </div>
               <div class="rounded-lg dark:bg-gray-800">
                    <dl class="grid max-w-screen-xl grid-cols-1 gap-8 mx-auto text-gray-900 sm:grid-cols-1 xl:grid-cols-3 dark:text-white">
                         <div class="flex flex-col items-center justify-center bg-blue-900 rounded-lg py-12">
                              <dt class="text-white mb-2 text-4xl font-extrabold"> Our Vision</dt>
                              <dd class="text-white dark:text-white px-6 text-center">To be the best supermarket in every neighborhood we serve. As a locally owned retailer, we are committed to offering value through exceptional service, quality, and freshness.</dd>
                         </div>
                         <div class="flex flex-col items-center justify-center bg-blue-900 rounded-lg py-12">
                              <dt class="text-white mb-2 text-4xl font-extrabold">Our Mission</dt>
                              <dd class="text-white dark:text-white px-6 text-center">Our dedication to food you can trust begins with our selection of providers. These farmers plant, grow, harvest and handle products with unparalleled quality standards.</dd>
                         </div>
                         <div class="flex flex-col items-center justify-center bg-white shadow-lg rounded-lg py-12">
                              <div class="py-4">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none"><path d="M62.9338 50.3043C62.9338 38.0031 63.0662 38.2868 62.5962 37.3481L55.9437 24.0431C55.405 22.9568 54.295 22.2706 53.0825 22.2743H42.6675C40.9 22.2743 39.4675 23.7068 39.4675 25.4743V40.4081H34.3175L36.26 21.7006C36.3212 21.0293 36.005 20.3806 35.44 20.0143L33.7687 18.9243C36.1987 10.6043 35.475 4.00558 31.8862 2.38183C28.3962 0.80683 24.4062 4.42433 21.9888 7.39558C19.8988 5.99683 17.1863 5.94308 15.0413 7.25558C15.23 5.86058 16.1262 4.66183 17.41 4.08683C17.97 3.90058 18.2725 3.29558 18.0863 2.73683C17.9 2.17683 17.295 1.87433 16.7362 2.06058C15.5925 2.51058 14.6163 3.30183 13.9412 4.32808C11.9462 1.69808 8.585 1.52683 5.48 2.71558C4.5575 3.05558 4.06 4.05433 4.345 4.99558C4.60875 5.94433 4.99625 6.85433 5.4975 7.70308C2.70875 9.81558 0.5975 14.3368 1.16625 19.7943C0.4225 20.1356 -0.03625 20.8968 0.00875 21.7143C2.9275 50.9356 2.71625 48.9918 3.2775 50.0093H2.13375C0.955 50.0081 0 50.9631 0 52.1418V54.2756C0 55.4543 0.955 56.4093 2.13375 56.4093H8.85375C10.0387 60.3593 14.2 62.6006 18.15 61.4168C20.555 60.6956 22.4362 58.8143 23.1575 56.4093H44.0537C45.2388 60.3593 49.4 62.6006 53.35 61.4168C55.755 60.6956 57.6362 58.8143 58.3575 56.4093H61.8662C63.045 56.4093 64 55.4543 64 54.2756V52.1418C63.9975 51.3831 63.5913 50.6831 62.9338 50.3043ZM54.035 24.9981L60.14 37.2081H46.9338C46.345 37.2081 45.8675 36.7306 45.8675 36.1418V24.4081H53.0825C53.4863 24.4068 53.8563 24.6356 54.035 24.9981ZM42.6662 24.4081H43.7325V36.1418C43.7325 37.9093 45.165 39.3418 46.9325 39.3418H60.8V50.0081H57.3187C54.97 46.6293 50.3275 45.7931 46.9487 48.1418C46.22 48.6481 45.5887 49.2806 45.0825 50.0081H41.6V25.4743C41.6 24.8856 42.0775 24.4081 42.6662 24.4081ZM39.4663 42.5418V50.0081H32.9975C33.5662 48.9781 33.4663 48.5781 34.0938 42.5418H39.4663ZM28.7675 4.42808C29.4688 4.08808 30.2775 4.04933 31.0075 4.32183C33.0788 5.26058 33.9937 10.3381 31.8175 18.0056C31.0875 18.0056 30.9288 18.2193 28.3913 19.8818L25.9912 18.3106C25.3725 17.9031 24.57 17.9031 23.9513 18.3106L21.5462 19.8856C18.9712 18.2006 18.9112 18.0618 18.2262 18.0231C20.0863 13.6181 24.295 6.17558 28.7675 4.42808ZM6.46 4.62808C10.4538 3.19808 12.8 5.24683 12.8 7.20683C11.1725 6.19558 9.16625 5.99808 7.3725 6.67308C6.9875 6.03058 6.68 5.34308 6.46 4.62808ZM12.0863 9.25433C13.205 10.0456 14.7013 10.0456 15.82 9.25433C17.2575 8.18808 19.205 8.12433 20.7087 9.09433C18.4875 12.2943 16.6975 15.7731 15.385 19.4406L14.71 19.8831L12.31 18.3118C11.69 17.9043 10.8875 17.9043 10.2688 18.3118L7.865 19.8868L5.46875 18.3143C4.85 17.9056 4.0475 17.9056 3.42875 18.3143L3.215 18.4543C3.0375 11.7306 7.6 6.18058 12.0863 9.25433ZM4.92 48.2743L2.1475 21.6981L4.44875 20.1968L6.84375 21.7668C7.465 22.1743 8.26875 22.1743 8.89125 21.7668L11.285 20.1981L13.6875 21.7681C14.3062 22.1731 15.1063 22.1731 15.725 21.7681L18.125 20.1956L20.5287 21.7668C21.1475 22.1718 21.9475 22.1718 22.5662 21.7668L24.9688 20.1956L27.3713 21.7668C27.99 22.1718 28.79 22.1718 29.4088 21.7668L31.8125 20.1956L34.1162 21.6981L31.3625 48.2768C31.23 49.2943 30.3463 50.0431 29.3213 50.0068H22.1213C19.7725 46.6281 15.13 45.7918 11.7513 48.1406C11.0225 48.6468 10.3913 49.2793 9.885 50.0068H6.96C5.9325 50.0406 5.05125 49.2906 4.92 48.2743ZM2.13375 54.2743V52.1406H8.85375C8.64375 52.8318 8.53625 53.5506 8.53375 54.2743H2.13375ZM16 59.6081C13.055 59.6081 10.6663 57.2206 10.6663 54.2743C10.6663 51.3293 13.0538 48.9406 16 48.9406C18.9463 48.9406 21.3337 51.3281 21.3337 54.2743C21.33 57.2181 18.9438 59.6043 16 59.6081ZM23.4662 54.2743C23.4637 53.5518 23.3562 52.8331 23.1462 52.1406H44.0525C43.8425 52.8318 43.735 53.5506 43.7325 54.2743H23.4662ZM51.2 59.6081C48.255 59.6081 45.8662 57.2206 45.8662 54.2743C45.8662 51.3293 48.2537 48.9406 51.2 48.9406C54.145 48.9406 56.5337 51.3281 56.5337 54.2743C56.53 57.2181 54.1437 59.6043 51.2 59.6081ZM61.8662 54.2743H58.6662C58.6637 53.5518 58.5562 52.8331 58.3462 52.1406H61.8662V54.2743Z" fill="#313F90"></path><path d="M26.2201 26.7417C25.7401 26.3992 25.0738 26.5104 24.7326 26.9904L14.7988 40.8992L11.4213 37.5229C10.9976 37.1142 10.3226 37.1254 9.91259 37.5492C9.51384 37.9629 9.51384 38.6179 9.91259 39.0317L14.1788 43.2979C14.5951 43.7142 15.2713 43.7142 15.6876 43.2979C15.7288 43.2567 15.7676 43.2117 15.8013 43.1629L26.4676 28.2292C26.8101 27.7504 26.6988 27.0842 26.2201 26.7417Z" fill="#50F0A3"></path><path d="M29.1001 15.3218L24.5001 13.2831C23.9614 13.0443 23.3314 13.2881 23.0926 13.8268C22.8539 14.3656 23.0976 14.9956 23.6364 15.2343V15.2306C28.6251 17.4381 28.3539 17.3643 28.6676 17.3643C29.2564 17.3643 29.7339 16.8868 29.7351 16.2981C29.7339 15.8743 29.4851 15.4918 29.1001 15.3218Z" fill="#50F0A3"></path><path d="M29.9088 11.2748L26.9225 9.94853C26.3863 9.70603 25.7538 9.94353 25.5113 10.481C25.2688 11.0185 25.5063 11.6498 26.0438 11.8923C26.0488 11.8948 26.055 11.8973 26.06 11.8998L26.055 11.8985C29.2638 13.316 29.1688 13.316 29.4763 13.316C30.065 13.316 30.5425 12.8385 30.5438 12.2498C30.5425 11.8285 30.2938 11.446 29.9088 11.2748Z" fill="#50F0A3"></path><path d="M30.985 7.34333L29.065 6.48958C28.5212 6.26458 27.8962 6.52208 27.6712 7.06583C27.4537 7.59208 27.6862 8.19583 28.2012 8.43833V8.44583C30.2725 9.36333 30.2537 9.38708 30.5537 9.38708C31.1425 9.39208 31.625 8.91833 31.63 8.32958C31.6325 7.90208 31.3787 7.51333 30.985 7.34333Z" fill="#50F0A3"></path></svg>
                              </div>
                              <dt class="text-blue-800 mb-2 text-4xl font-extrabold">Our Promise</dt>
                              <dd class="text-blue-800 dark:text-blue-800 px-6 text-center">Our promise is to exceed your expectations by combining the best customer service with the freshest foods. Fresh Market is locally owned and we support local suppliers.</dd>
                         </div>
                    </dl>
               </div>
          </div>
     </section>

     <section class="py-12">
          <div class="w-full mx-auto max-w-screen-xl mx-auto">
               <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-4">
                    <img class="object-cover w-full w-96" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                         <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                         <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
               </a>
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
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.0.0</h3>
                              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on December 2, 2021</time>
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
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.2.0</h3>
                              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on December 23, 2021</time>
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
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library v1.3.0</h3>
                              <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on January 5, 2022</time>
                              <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements.</p>
                         </div>
                    </li>
               </ol>
          </div>
     </section>

     <section class="py-12">
          <div class="w-full mx-auto max-w-screen-xl mx-auto bg-white p-12 rounded-lg shadow">
               <div class="grid grid-cols-3 gap-4 items-center">
                    <div class="">
                         <h3 class="text-3xl font-bold text-gray-900 dark:text-white">100</h3>
                         <p class="text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias inventore unde doloribus exercitationem maxime accusamus. Dignissimos optio error minima vel autem, esse perferendis iure perspiciatis.</p>
                    </div>
                    <div class="col-span-2">
                         <div class="grid grid-cols-3 gap-4">
                              <div class="w-full max-w-sm">
                                   <div class="flex flex-col items-center p-10">
                                        <img class="w-96 h-[auto] mb-3 rounded-full" src="https://c0.wallpaperflare.com/preview/319/708/875/portugal-vila-franca-do-campo-islet-of-vila-franca-do-campo-1x1.jpg" alt="Bonnie image"/>
                                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Rian Fernando</h5>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Programmer</span>
                                   </div>
                              </div>
                              <div class="w-full max-w-sm">
                                   <div class="flex flex-col items-center p-10">
                                        <img class="w-96 h-[auto] mb-3 rounded-full" src="https://c0.wallpaperflare.com/preview/319/708/875/portugal-vila-franca-do-campo-islet-of-vila-franca-do-campo-1x1.jpg" alt="Bonnie image"/>
                                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Fulan</h5>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Admin Puskesmas</span>
                                   </div>
                              </div>
                              <div class="w-full max-w-sm">
                                   <div class="flex flex-col items-center p-10">
                                        <img class="w-96 h-[auto] mb-3 rounded-full" src="https://c0.wallpaperflare.com/preview/319/708/875/portugal-vila-franca-do-campo-islet-of-vila-franca-do-campo-1x1.jpg" alt="Bonnie image"/>
                                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Fulan</h5>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">Petugas Puskesmas</span>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
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