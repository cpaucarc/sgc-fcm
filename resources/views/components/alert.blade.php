@if(session('message'))
    <div x-data="{ visible:true }"
         x-init="
                setTimeout(() => {
                    visible = false
                }, 5000)"
         x-show.transition.duration.1000ms="visible"
         role="alert" class="absolute top-0 right-10">
        <div class="bg-green-500  rounded-t px-4 py-2 flex justify-between">
            <span class="text-white font-bold">Correcto</span>
            <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                <button type="button" @click="visible = false"
                        class="-mr-1 flex p-2 rounded-md hover:bg-green-600 focus:outline-none sm:-mr-2">
                    <span class="sr-only">Cerrar</span>
                    <x-icons.x :stroke="1.5" class="h-4 w-4"/>
                </button>
            </div>
        </div>
        <div
            class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>
                {{ session('message') }}
            </p>
        </div>
    </div>
@endif
