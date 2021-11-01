<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div
        class="w-full sm:max-w-md mt-4 px-8 py-6 bg-white shadow-lg overflow-hidden sm:rounded-lg border border-gray-200">
        <div>
            {{ $logo }}
        </div>

        {{ $slot }}
    </div>
</div>
