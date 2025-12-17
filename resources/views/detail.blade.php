<x-app>
    <x-navbar></x-navbar>
    <section class="pt-32 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $paket->getNama() }}</h1>
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            {{ str_repeat('⭐', $paket->getRating()) }}
                        </div>
                        <span class="text-gray-600 ml-2">{{ $paket->getRating() / 5 }}</span>
                    </div>
                    <p class="text-3xl font-bold text-blue-900 mb-4">Rp. {{ number_format($paket->getHarga()) }} / Orang
                    </p>
                    <p class="text-gray-600 mb-6">{{ $paket->getDeskripsi() }}</p>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-800 mb-2">Fasilitas</h3>
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            @forelse ($paket->facilities as $facility)
                                <span class="flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-900">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $facility->name }}</span>
                                </span>
                            @empty
                                <span class="text-gray-500">-</span>
                            @endforelse

                        </div>
                    </div>

                    <div class="flex gap-4 mb-8">
                        <a href="{{ route('paket.index') }}"
                            class=" text-center flex-1 bg-blue-900 text-white py-3 px-6 rounded-sm hover:bg-blue-700 transition duration-300">
                            Lihat Paket Lainnya
                        </a>
                        @auth
                            <button data-modal-target="payment-modal" data-modal-toggle="payment-modal" type="button"
                                class="text-center flex-1 border-2 border-blue-900 text-blue-900 py-3 px-6 rounded-sm hover:bg-blue-50 transition duration-300">
                                Beli Sekarang
                            </button>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-center flex-1 border-2 border-blue-900 text-blue-900 py-3 px-6 rounded-sm hover:bg-blue-50 transition duration-300">
                                Login untuk Order
                            </a>
                        @endauth
                    </div>

                    <div class="border-t pt-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Informasi Lainnya</h3>
                        <div class="space-y-2">
                            <p class="flex justify-between text-sm">
                                <span class="text-gray-600">Kategori</span>
                                <span class="text-gray-800">{{ $paket->category?->name ?? '-' }}</span>
                            </p>
                            <p class="flex justify-between text-sm">
                                <span class="text-gray-600">Lama Liburan</span>
                                <span class="text-gray-800">{{ $paket->duration }} Hari</span>
                            </p>
                            <p class="flex justify-between text-sm">
                                <span class="text-gray-600">Lokasi</span>
                                <span class="text-gray-800">{{ $paket->location }}</span>
                            </p>
                            <p class="flex justify-between text-sm">
                                <span class="text-gray-600">Sisa Kuota</span>
                                <input type="text" name="" id="quota" value="{{ $paket->quota }}" hidden>
                                <span class="text-gray-800">{{ $paket->quota }} Orang</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Gambar Produk -->
                <div class="md:w-1/2 h-[520px] bg-no-repeat bg-cover bg-center rounded"
                    style="background-image: url('{{ Storage::url($paket->getThumbnail()) }}');">

                </div>
            </div>
        </div>
    </section>
    {{-- <section class="py-32 pb-24 container mx-auto px-4 w-full font-semibold space-y-4">
        <div class="text-3xl font-semibold text-gray-800 mb-4">Dokumentasi Kegiatan</div>
        <div class="flex flex-col md:flex-row gap-5 mx-6 overflow-x-scroll">
            @forelse (($paket->galleri ?? []) as $galleri)
                <a href="{{ Storage::url(data_get($galleri, 'path_212396')) }}" class="">
                    <div class="shadow-lg md:w-100 h-90  bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end "
                        style="background-image: url('{{ Storage::url(data_get($galleri, 'path_212396')) }}');">

                    </div>
                </a>
            @empty
                <h3>Tak ada data</h3>
            @endforelse
        </div>

    </section> --}}

    <section class="py-32 container mx-auto px-4 w-full font-semibold space-y-4">
        <div class="text-3xl font-semibold text-gray-800 mb-4">Paket Lainnya</div>
        <div class="flex flex-col md:flex-row gap-5 mx-6 overflow-x-auto ">

            @forelse ($pakets as $paket)
                <a href="/detail/{{ $paket->getId() }}" class="">
                    <div class="  shadow-lg h-90 md:w-100 bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end "
                        style="background-image: url('https://placehold.co/600x400?text={{ $paket->getNama() }}');">
                        <div class="h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    {{ str_repeat('⭐', $paket->getRating()) }}
                                </div>
                                <span class="text-gray-600 ml-2">{{ $paket->getRating() / 5 }}</span>
                            </div>
                            <span class="text-lg font-semibold">{{ $paket->getNama() }}</span>
                            <span class="text-sm font-light">{{ Str::limit($paket->getDeskripsi(), 70) }}</span>
                            <span class="text-lg">Rp. {{ number_format($paket->getHarga()) }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <h3>Tak ada data</h3>
            @endforelse
        </div>

    </section>



    <div id="payment-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 ">
        <div class="relative p-4 min-w-auto ">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg  shadow dark:bg-gray-700">
                <div>
                    <form action="#" method="get">
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <div>
                                <h3 class=" text-xl text-gray-900 dark:text-white">
                                    Isi Formulir Berikut
                                </h3>
                            </div>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="payment-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <div class="p-4 md:p-5 space-y-4">
                            <div class="w-[1000px] min-h-[200px] ">
                                <div>
                                    <input type="text" name="paket_id" id="id_paket" value="{{ $paket->getId() }}" hidden>
                                    <input type="text" name="quantity" id="qty_input" value="1" hidden>
                                    <div id="modalAlert" class="hidden  w-full bg-red-500 p-4 mb-2 text-white">

                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-5">
                                            <div class="flex flex-col gap-2">
                                                <label for="name" class="text-gray-900 dark:text-white">Jumlah
                                                    Orang</label>
                                                <div class="flex font-bold">
                                                    <button type="button"
                                                        class="py-2 px-4 bg-blue-900 text-white border border-gray-300 rounded-l-sm"
                                                        id="add">+</button>
                                                    <span class="py-2 px-8 border border-gray-300 "
                                                        id="qty">1</span>
                                                    <button type="button"
                                                        class="py-2 px-4 bg-blue-900 text-white border border-gray-300 rounded-r-sm"
                                                        id="remove">-</button>
                                                </div>
                                            </div>
                                            <div class="flex-1 flex flex-col gap-2">
                                                <label for="name" class="text-gray-900 dark:text-white">Tota
                                                    Harga</label>
                                                <div id="total"
                                                    class=" font-semibold  p-2 border border-gray-300 rounded-sm" id>
                                                    Rp. {{ number_format($paket->getHarga(), 0, '.', '.') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <div class="flex gap-3 ">
                                <button class="px-4 py-2 border bg-blue-900 text-white rounded-sm">Konfirmasi
                                    Pembelian</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        let add = document.getElementById('add')
        let remove = document.getElementById('remove')
        let qty = document.getElementById('qty')
        let qty_input = document.getElementById('qty_input')
        let total = document.getElementById('total')
        let quota = document.getElementById('quota')
        let modalAlert = document.getElementById('modalAlert')

        add.addEventListener('click', () => {
            if (parseInt(qty.innerHTML) == parseInt(quota.value)) {
                modalAlert.innerHTML = `Paket ini hanya tersedia untuk ${quota.value} orang`
                modalAlert.classList.remove('hidden')
                return
            }

            qty.innerHTML = parseInt(qty.innerHTML) + 1
            qty_input.value = parseInt(qty_input.value) + 1
            total.innerHTML =
                `Rp. ${(parseInt(qty.innerHTML) * {{ $paket->getHarga() }}).toLocaleString('id-ID')}`
        })

        remove.addEventListener('click', () => {
            if (parseInt(qty.innerHTML) == 1) return

            qty.innerHTML = parseInt(qty.innerHTML) - 1
            qty_input.value = parseInt(qty_input.value) - 1
            total.innerHTML =
                `Rp. ${(parseInt(qty.innerHTML) * {{ $paket->getHarga() }}).toLocaleString('id-ID')}`
        })
    </script>

</x-app>
