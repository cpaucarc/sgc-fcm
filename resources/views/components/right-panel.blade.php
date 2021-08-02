<div class="fixed inset-0 overflow-hidden"
     aria-labelledby="slide-over-title"
     role="dialog"
     aria-modal="true">

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gray-600 bg-opacity-75 transition-opacity" aria-hidden="true">
        </div>

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
            <div class="relative w-screen max-w-md">
                <div class="absolute top-0 left-0 -ml-8 pt-4 pr-2 flex sm:-ml-10 sm:pr-4">
                    <button @click="mostrar = ! mostrar"
                            class="rounded-md text-gray-300 hover:text-white focus:outline-none">
                        <span class="sr-only">Cerrar panel</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
                    <div class="px-4 sm:px-6">
                        <h2 class="text-lg font-medium text-gray-400 tracking-wide" id="slide-over-title">
                            {{ $titulo }}
                        </h2>
                    </div>
                    <div class="mt-6 relative flex-1 px-4 sm:px-6">
                        <div class="absolute inset-0 px-4 sm:px-6">
                            <div class="h-full py-4" aria-hidden="true">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
