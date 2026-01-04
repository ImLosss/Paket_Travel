<x-app>
    @if (session('error'))
        <div class="p-5 sticky top-0 bg-red-200">
            {{ session('error') }}
        </div>
    @endif
    @if (session('sukses'))
        <div class="p-5 sticky top-0 bg-green-200">
            {{ session('sukses') }}
        </div>
    @endif

    <section class="h-screen bg-cover" style="background-image: url('{{ URL::asset('images/banner-2.jpg') }}')">
        <div class="absolute h-screen w-full bg-black opacity-[60%]"></div>

        <div class="absolute h-screen w-full flex flex-col justify-center items-center rounded-lg">
            <div class="w-[500px] h-[500px] flex shadow-xl">
                <div class="p-10 w-full grow flex flex-col bg-white">
                    <div class="text-2xl font-semibold flex justify-center">Register</div>

                    <form action="{{ route('register.store') }}" method="POST" class="flex flex-col gap-5 pt-9">
                        @csrf

                        <div>
                            <h1>Username</h1>
                            <input type="text" name="username" value="{{ old('username') }}"
                                class="mt-1 border rounded border-black p-2 w-full">
                            @error('username')
                                <div class="text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <h1>Password</h1>
                            <input type="password" name="password" class="mt-1 border rounded border-black p-2 w-full">
                            @error('password')
                                <div class="text-red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <h1>Konfirmasi Password</h1>
                            <input type="password" name="password_confirmation"
                                class="mt-1 border rounded border-black p-2 w-full">
                        </div>

                        <div>
                            <a href="{{ route('login') }}" class="underline">Sudah punya akun?</a>
                        </div>

                        <div>
                            <button type="submit"
                                class="text-white w-full bg-cappucino p-2 rounded px-4 border bg-blue-900">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</x-app>
