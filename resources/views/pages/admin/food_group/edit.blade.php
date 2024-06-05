<x-app-layout>
     <!-- Title -->
     <x-slot name="title">
          {{ __(Auth::user()->name.' '.'Ubah Kelompok Makanan '.$food_group ) }}
     </x-slot>

     <!-- Head -->
     <x-slot name="head">
          {{-- Ck Editor --}}
          <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

          <style>
               .ck-editor__editable_inline {
                    min-height: 300px;
               }
               .ck-content .image {
                    /* block images */
                    max-width: 80%;
                    margin: 20px auto;
               }
          </style>
     </x-slot>

     <!-- Foot -->
     <x-slot name="foot">
          <script>
               // CKEditor
               ClassicEditor
                    .create( document.querySelector( '#description' ), {
                         // toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ],
                         placeholder: 'Isi Informasi Dasar Lokasi Disini...',
                         ckfinder: {
                              uploadUrl: '{{ route("admin.food_group.image", ["_token" => csrf_token()])  }}'
                         },
                    } )
                    .catch( error => {
                         console.error( error );
                    } );
          </script>
     </x-slot>

     <!-- Header -->
     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{ __('Tambah Kelompok Makanan') }}
          </h2>
     </x-slot>

     {{-- <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         <div class="flex align-baseline justify-between">
                              <div>
                                   <div class="p-4 text-gray-900 dark:text-gray-100">
                                        <h5 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                             {{ __("Tambah Kelompok Makanan") }}
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
     </div> --}}

     <!-- Content -->
     <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                         
                         <form class="w-full mx-auto p-4" action="{{ route('admin.food_group.update', [$food_group->slug]) }}" method="POST">
                              @csrf
                              @method('PATCH')
                              <div class="py-2">
                                   <x-input-label for="name" :value="__('Nama Kelompok Makanan')" />
                                   <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $food_group->name" required autofocus autocomplete="name" placeholder="Tulis Nama Kelompok Makanan" />
                                   <x-input-error :messages="$errors->get('name')" class="mt-2" />
                              </div>

                              <!-- Description -->
                              <div class="py-2">
                                   <x-input-label for="description" :value="__('Description')"/>
                                   <textarea name="description" id="description" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-100">{!! old('description') ?? $food_group->description !!}</textarea>
                                   <x-input-error :messages="$errors->get('description')" class="mt-2" /> 
                              </div>

                              <div class="pt-6 flex justify-end gap-4">
                                   <a href="{{ route('admin.food_group.index') }}" class="text-white font-bold bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Kembali</a>

                                   <button type="submit" class="text-white font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 m-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                              </div>
                         </form>

                    </div>
               </div>
          </div>
     </div>

</x-app-layout>