<x-app-layout>
    <div class="space-y-6">
        <div class="bg-yellow-300">
            {{ $estudiante->escuela }}
        </div>
        <div class="bg-yellow-300">
            {{ $estudiante->escuela->facultad }}
        </div>
        <div class="bg-blue-300">
            {{ $estudiante }}
        </div>
        <div class="bg-red-300">
            {{ $estudiante->grados }}
        </div>
        <div class="bg-red-500">
            {{ $estudiante->gradoReciente ?? \App\Models\GradoAcademico::find(1) }}
        </div>
    </div>
</x-app-layout>
