<x-app>
    <x-navbar></x-navbar>
    <section class="min-h-[110vh] w-full rounded-b-3xl  bg-no-repeat bg-cover  sm:text-left"
        style="background-image: url('{{ URL::asset('images/banner-1.jpg') }}');">

        <div class="absolute h-[110vh] rounded-b-3xl w-full bg-black opacity-[60%]">

        </div>
        <div class=" flex flex-col lg:flex-row absolute w-full ">
            <div class=" h-full flex flex-col xs:pt-24 lg:pt-50 lg:py-50 px-14  text-white z-10 gap-5 w-full">
                <div class="xs:text-4xl sm:text-8xl  tracking-[3px] font-semibold font-serif">Jelajahi Keindahan Dunia!</div>
                <div class="xs:text-sm md:text-lg italic xs:pt-1 md:pt-3">Pesona Travel adalah solusi perjalanan pintar untuk kamu yang ingin
                    jalan-jalan tanpa ribet. Kami menyediakan paket traveler lengkap – dari tiket, penginapan, hingga
                    itinerary personal yang bisa disesuaikan. Nikmati liburan impianmu dengan harga hemat dan layanan
                    terbaik!</div>

            </div>
            <div class=" xs:pt-5 lg:pt-32 w-auto flex xs:flex-col md:flex-row gap-5 px-14">
                <div class="w-full">
                    <div class="shadow-lg xs:h-[100px] sm:h-[200px] xs:w-full md:h-[520px] md:w-[320px] rounded bg-white bg-cover bg-center "
                        style="background-image: url('{{ URL::asset('images/banner-2.jpg') }}');">
                        <div class="rounded h-full w-full bg-black opacity-[20%]"></div>

                    </div>
                </div>
                <div class="flex-col space-y-5">
                    <div class="shadow-lg xs:h-[100px] sm:h-[200px] xs:w-full md:h-[220px] md:w-[320px] bg-cover bg-center rounded bg-white"
                        style="background-image: url('{{ URL::asset('images/banner-3.jpg') }}');">
                    </div>
                    <div class="shadow-lg xs:h-[100px] sm:h-[200px] xs:w-full md:h-[320px] md:w-[320px] bg-cover bg-center rounded bg-white"
                        style="background-image: url('{{ URL::asset('images/banner-4.jpg') }}');">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="min-h-36 w-full lg:px-32 pt-9 " id="cari">
        <form action="#cari" method="get">
            <div class="flex xs:flex-col lg:flex-row h-auto lg:border lg:shadow-lg md:px-14">
                <div class="bg-white h-full flex-1 flex items-center p-5 gap-5  ">
                    <div class="w-full">
                        <div>Pilih Destinasi</div>
                        <select name="lokasi" id="" class="w-full rounded p-1"  >
                            <option value="">Semua Lokasi</option>
                            @forelse ($destinations as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                </div>
                <div class="bg-white h-full flex-1 flex items-center p-5 gap-5 border-white-900 border-r-2">

                    <div class="w-full">
                        <div>Pilih Durasi Keberangkatan</div>
                        <select name="durasi" id="" class="w-full rounded p-1"  >
                            <option value="">Semua Durasi</option>
                            @forelse ($durations as $duration)
                                <option value="{{ $duration }}">{{ $duration }} Hari</option>

                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="bg-white h-full flex-1 flex items-center p-5 gap-5 border-white-900 border-r-2">

                    <div class="w-full">
                        <div>Pilih Kategori Paket</div>
                        <select name="kategori" id="" class="w-full rounded p-1"  >
                            <option value="">Semua Kategori</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('kategori') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="bg-white h-full flex-1 flex justify-center w-full items-center p-5 pt-5  border-r-2">
                    <button type="submit" class="w-full bg-blue-900 text-white px-5 py-2">Cari Destinasi</button>

                </div>

            </div>

        </form>
    </section>
    <section class="min-h-screen xs:px-4 lg:px-36 py-10 ">
        <div class="w-full h-full md:p-10">
            <div class="w-full h-auto sm:flex pb-5 ">
                <div class="text-xl xs:w-full lg:flex-1">Destinasi Populer</div>
                <form action="/paket" method="get" class="xs:w-full lg:w-1/4 flex gap-3">
                    <input type="text" name="search" class="p-1 rounded-sm border border-black  w-full " required>
                    <button class="px-5 py-1 rounded-sm bg-blue-900 text-white">Cari</button>
                </form>
            </div>
            <div>
                <div class="grid xs:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                    @forelse ($pakets as $paket)
                        <a href="/detail/{{ $paket->id }}" class="">
                            <div class="  shadow-lg w-full h-90 bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end "
                                style="background-image: url('https://placehold.co/600x400?text={{ $paket->getNama() }}');">
                                <div class="h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400">
                                            {{ str_repeat('⭐', $paket->rating) }}
                                        </div>
                                        <span class="text-gray-600 ml-2">{{ $paket->rating }}</span>
                                    </div>
                                    <span class="text-lg font-semibold">{{ $paket->name }}</span>
                                    <span
                                        class="text-sm font-light">{{ Str::limit($paket->description, 70) }}</span>
                                    <span class="text-lg">Rp. {{ number_format($paket->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </a>

                    @empty
                        <h3>Tak ada data</h3>
                    @endforelse

                </div>

            </div>

        </div>
    </section>
    {{-- <x-footter></x-footter> --}}



</x-app>
