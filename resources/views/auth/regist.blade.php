<x-app>
    <section class="h-screen bg-cover "
        style="background-image: url('{{ URL::asset('images/banner-1.jpg') }}')">
        <div class="absolute h-screen w-full bg-black opacity-[60%]">

        </div>
        <div class="absolute w-full h-screen flex flex-col justify-center items-center ">
            <div class="w-[500px] h-auto rounded-xl flex shadow-xl">
                <div class="p-10 w-full grow flex flex-col bg-white">
                    <div class="text-2xl font-semibold flex justify-center">Register</div>
                    <form action="{{ route('user.regist') }}" method="POST" class="flex flex-col gap-5 pt-9">
                        @csrf
                        <div>
                            <h1>Nama</h1>
                            <input type="text" name="nama" class="mt-1 border rounded border-black p-2 w-full">
                            @error('nama')
                            <div class="text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex gap-2">
                            <div class="grow">
                                <h1>Alamat</h1>
                                <input type="text" name="alamat" class="mt-1 border rounded border-black p-2 w-full">
                                @error('alamat')
                                <div class="text-red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="grow">
                                <h1>No Hp</h1>
                                <input type="text" name="hp" class="mt-1 border rounded border-black p-2 w-full">
                                @error('hp')
                                <div class="text-red">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="">
                            <h1>Email</h1>
                            <input type="email" name="email" class="mt-1 border rounded border-black p-2 w-full">
                            @error('email')
                            <div class="text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <h1>Password</h1>
                            <input type="text" name="password" class="mt-1 border rounded border-black p-2 w-full">
                            @error('password')
                            <div class="text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-900 text-white p-2 rounded px-4 border">Register</b>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
</x-app>
