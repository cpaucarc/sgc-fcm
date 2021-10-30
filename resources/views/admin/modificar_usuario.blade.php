<x-app-layout>

    <div class="grid grid-cols-12 space-x-6 items-start justify-between">

        <x-card class="col-span-4">
            <x-slot name="header">
                <h1 class="text-gray-700 font-light text-lg">
                    Datos personales
                </h1>
            </x-slot>
            <div>

                @if($usuario->profile_photo_path)
                    <img class="h-16 w-16 rounded-full"
                         src="{{ $usuario->profile_photo_path }}"
                         alt="Foto del usuario">
                @else
                    <img class="h-16 w-16 rounded-full"
                         src="{{ $usuario->profile_photo_url }}"
                         alt="Foto autogenerado del usuario">
                @endif

                <table class="text-gray-600">
                    <tbody>
                    <tr>
                        <td class="font-light text-gray-500">Nombres</td>
                        <td class="font-bold px-4 py-2">{{ $usuario->persona->nombres }}</td>
                    </tr>
                    <tr>
                        <td class="font-light text-gray-500">Apellidos</td>
                        <td class="font-bold px-4 py-2">{{ $usuario->persona->apellidos }}</td>
                    </tr>
                    <tr>
                        <td class="font-light text-gray-500">DNI</td>
                        <td class="font-bold px-4 py-2">{{ $usuario->persona->dni }}</td>
                    </tr>
                    <tr>
                        <td class="font-light text-gray-500">Correo</td>
                        <td class="font-bold px-4 py-2">{{ $usuario->email }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </x-card>

        <x-card class="col-span-6">


            @livewire('admin.usuario.roles', ['id' => $usuario->id])

        </x-card>
    </div>

</x-app-layout>
