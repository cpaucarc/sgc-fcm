<x-app-layout>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6 lg:w-9/12 mx-auto">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <div class="flex-1">
                <h3 class="text-lg lg:text-2xl font-bold leading-6 font-medium text-gray-500">
                    Sustentación de Tesis
                </h3>
                <p class="mt-1 max-w-2xl text-gray-500">
                    Vista detalle
                </p>
            </div>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="font-medium text-gray-500">
                        Tesis
                    </dt>
                    <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $asesores->tesis }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</x-app-layout>
