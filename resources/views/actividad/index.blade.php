<x-app-layout>

    <div class="grid grid-cols-1 gap-y-4 lg:gap-y-0 lg:grid-cols-2 lg:gap-4 ">
        <x-card>

            @slot('header')
                <h1 class="text-xl font-bold text-gray-800">
                    Actividades Completadas
                </h1>
                <p class="text-sm text-gray-400">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam asperiores, dolorem,
                    impedit, iure iusto magnam maxime nisi non perferendis quam quisquam ratione similique
                    veniam
                    veritatis voluptates voluptatibus? Nostrum, qui!
                </p>
            @endslot

            <div class="bg-yellow-400 p-4">
                Roles: <br>
                {{ Auth::user()->roles }}
            </div>
            <div class="bg-green-400 p-4">
                Roles separados: <br>
                @foreach(Auth::user()->roles as $rol)
                    {{ $rol }}
                @endforeach
            </div>
            <div class="bg-red-400 p-4">
                Roles y entidades: <br>
                @foreach(Auth::user()->roles as $rol)
                    {{ $rol->id }} - {{ $rol->entidad_id }} - {{ $rol->entidad }}
                    <br>
                @endforeach
            </div>
            <div class="bg-blue-400 p-4">
                Roles, entidades y reponsables: <br>
                @foreach(Auth::user()->roles as $rol)
                    {{ $rol->id }} - {{ $rol->entidad_id }} - {{ $rol->entidad->nombre }}
                    - {{ $rol->entidad->responsable }}
                    <br>
                @endforeach
            </div>
            <br>
            {{ var_dump(get_object_vars(Auth::user()->roles)) }}
            <br>
            {{--            {{ var_dump(Auth::user()->entidades) }}--}}


            <x-slot name="footer">
                <p>
                    Made by magnam maxime nisi non perferendis quam quisquam
                </p>
            </x-slot>
        </x-card>
        @livewire('dashboard.actividades-incompletas')
    </div>

</x-app-layout>
