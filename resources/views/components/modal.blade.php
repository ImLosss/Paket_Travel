<div id="{{ $id_modal }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 ">
    <div class="relative p-4 min-w-auto ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg  shadow dark:bg-gray-700">
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
