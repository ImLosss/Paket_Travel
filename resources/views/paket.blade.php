<x-app>
    <x-navbar></x-navbar>

    <section class="">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[70vh] overflow-hidden rounded-b-lg mx-3">
                <!-- Item 1 -->
                <div class="hidden rounded-3xl bg-no-repeat bg-cover bg-center  duration-900 ease-in-out" style="background-image: url('{{ URL::asset('images/banner-1.jpg') }}');" data-carousel-item>
                    <div class="absolute bg-black opacity-[50%] h-full w-full">

                    </div>
                    <div class="absolute text-white h-full w-1/2 p-32 ">
                        <span class="text-xl">⭐⭐⭐⭐</span>
                        <div class="text-6xl font-semibold">Raja Ampat</div>
                        <div class="text-sm font-light pt-3 pb-3">Raja Ampat adalah pilihan wisata eksotis di Papua Barat, Indonesia, terkenal dengan keindahan bawah lautnya yang luar biasa. Gugusan kepulauan ini memiliki lebih dari 1.500 pulau kecil, dengan perairan yang jernih, terumbu karang warna-warni, dan keanekaragaman hayati laut tertinggi di dunia. Destinasi favorit seperti Piaynemo, Wayag, dan Misool menawarkan pemandangan tebing karst dan spot snorkeling atau diving kelas dunia. Raja Ampat cocok untuk pecinta alam, fotografer, dan penjelajah sejati.</div>
                        {{-- <div class=" py-3">
                            <a href="" class="px-4 py-3 bg-yellow-500">
                                Pesan Sekarang
                            </a>
                        </div> --}}
                    </div>
                </div>

                <div class="hidden rounded-3xl bg-no-repeat bg-cover bg-center  duration-900 ease-in-out" style="background-image: url('{{ URL::asset('images/banner-2.jpg') }}');" data-carousel-item>
                    <div class="absolute bg-black opacity-[50%] h-full w-full">

                    </div>
                    <div class="absolute text-white h-full w-1/2 p-32 ">
                        <span class="text-xl">⭐⭐⭐⭐</span>
                        <div class="text-6xl font-semibold">Borobudur</div>
                        <div class="text-sm font-light pt-3 pb-3">Borobudur mengajak wisatawan menyusuri keajaiban budaya dan spiritual di Magelang, Jawa Tengah. Candi Borobudur adalah candi Buddha terbesar di dunia, dibangun pada abad ke-9 dan dihiasi lebih dari 2.600 panel relief serta 500 lebih arca Buddha. Dikenal sebagai situs warisan dunia UNESCO, Borobudur menjadi tempat wisata religi, sejarah, dan juga favorit untuk menyaksikan matahari terbit dari ketinggian.</div>
                        {{-- <div class=" py-3">
                            <a href="http://127.0.0.1:8000/detail/1" class="px-4 py-3 bg-yellow-500">
                                Pesan Sekarang
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="hidden rounded-3xl bg-no-repeat bg-cover bg-center  duration-900 ease-in-out" style="background-image: url('{{ URL::asset('images/banner-3.jpg') }}');" data-carousel-item>
                    <div class="absolute bg-black opacity-[50%] h-full w-full">

                    </div>
                    <div class="absolute text-white h-full w-1/2 p-32 ">
                        <span class="text-xl">⭐⭐⭐⭐</span>
                        <div class="text-6xl font-semibold">Paris</div>
                        <div class="text-sm font-light pt-3 pb-3">Paris menawarkan pengalaman ikonik di ibu kota Prancis yang dikenal sebagai "Kota Cahaya" dan pusat seni, mode, serta romantisme dunia. Wisatawan bisa menjelajahi landmark terkenal seperti Menara Eiffel, Museum Louvre, dan Katedral Notre-Dame. Jalan-jalan di sepanjang Champs-Élysées, menyusuri Sungai Seine, atau menikmati kopi di kafe khas Paris jadi daya tarik tersendiri.</div>
                        {{-- <div class=" py-3">
                            <a href="" class="px-4 py-3 bg-yellow-500">
                                Pesan Sekarang
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>

            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

    </section>
    <section class="flex h-auto my-14 mx-14">
        <div class="w-64 h-full ">
            <div>
                <p class="text-4xl font-semibold">Kategori</p>
            </div>
            <div class="p-3 mt-3">
                <ul class="flex flex-col gap-3 ">
                    @foreach ($kategori as $data)

                        <a href="?kategori={{ $data->id }}">{{ $data->name }}</a>

                    @endforeach

                </ul>
            </div>
        </div>
        <div class=" h-full w-full ">
            <form class="h-14 bg-white flex justify-center ">
                <input type="text" name="search" class="p-4 w-full mx-32 rounded m-2 border-yellow border"
                    placeholder="Cari Menu..." value="{{ $request->search }}">
            </form>
            <div class="grid grid-cols-3 h-96 gap-3 m-7 h-full">
                @forelse ($pakets as $paket)
                <a href="/detail/{{ $paket->getId() }}" class="">
                    <div class="  shadow-lg w-full h-90 bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end "
                        style="background-image: url('https://placehold.co/600x400?text={{ $paket->getNama() }}');">
                        <div class="h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    {{ str_repeat('⭐', $paket->getRating()) }}
                                </div>
                                <span class="text-gray-600 ml-2">{{ $paket->getRating() / 5 }}</span>
                            </div>
                            <span class="text-lg font-semibold">{{ $paket->getNama() }}</span>
                            <span
                                class="text-sm font-light">{{ Str::limit($paket->getDeskripsi(), 70) }}</span>
                            <span class="text-lg">Rp. {{ number_format($paket->getHarga()) }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <h3>Tak ada data</h3>
            @endforelse


            </div>
        </div>

    </section>

    <x-footter></x-footter>
</x-app>
