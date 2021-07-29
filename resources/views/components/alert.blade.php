@if(session('message'))
    <div x-data="{ visible:true }"
         x-init="
                setTimeout(() => {
                    visible = false
                }, 5000)"
         x-show.transition.duration.1000ms="visible"
         role="alert" class="absolute top-0 right-10">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Correcto
        </div>
        <div
            class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            <p>
                {{ session('message') }}
            </p>
        </div>
    </div>
@endif
