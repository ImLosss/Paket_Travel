 <!-- Navbar -->
 <nav class="bg-white shadow-lg fixed w-full z-50 print:hidden">
     <div class=" px-14">
         <div class="flex justify-between">
             <div class="flex space-x-7">
                 <div class="flex items-center pt-2 pb-4">
                     <span class="font-regular text-2xl text-black font-semibold italic underline">Pesona Travel </span>
                 </div>
             </div>
             <div class="hidden md:flex items-center gap-14">
                 <a href="/" class=" text-black hover:underline transition duration-300">Beranda</a>
                 <a href="/paket" class=" text-black hover:underline transition duration-300">Paket Travel</a>


                 @if (Auth::check())
                     <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                         class="normal-case text-black bg-blue-900 hover:bg-blue-50 transition duration-300  rounded-sm py-1 px-5 text-white inline-flex items-center"
                         type="button">{{ ucfirst(Auth::user()->username) }} <svg class="w-2.5 h-2.5 ms-3"
                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="m1 1 4 4 4-4" />
                         </svg>
                     </button>

                     <!-- Dropdown menu -->
                     <div id="dropdown"
                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                         <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                             aria-labelledby="dropdownDefaultButton">
                             <li>
                                 <a href="{{ route('order') }}"
                                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Order</a>
                             </li>
                             <li>
                                 <a href="{{ route('logout') }}"
                                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                     out</a>
                             </li>
                         </ul>
                     </div>
                 @else
                     <a href="/login"
                         class=" text-black bg-blue-900 hover:bg-blue-50 transition duration-300  rounded-sm py-1 px-5 text-white">Login</a>
                 @endif




             </div>
         </div>
     </div>
 </nav>
