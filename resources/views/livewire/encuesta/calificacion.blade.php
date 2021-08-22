<tr>
    <td class="pl-4 pr-1 py-2 text-sm whitespace-nowrap flex-shrink-0 w-12">
        {{ $i }}
    </td>
    <td class="pl-0 pr-4 py-2 text-sm">
        {{ $pregunta->nombre }}
        <span class="font-bold text-gray-700">
            {{ $calif }}
        </span>
        @error('calif') <span class="text-red-600 text-xs">*Falta</span> @enderror
    </td>
    <td class="px-0 py-2 text-center whitespace-nowrap">
        @if($calif === 1)
            <button
                class="mx-auto py-2 px-3 flex items-center rounded bg-red-200 text-sm text-red-800 hover:bg-red-300">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </button>
        @else
            <button wire:click="asignar(1)"
                    class="mx-auto py-2 px-3 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-red-200 hover:text-red-800">
                <svg wire:loading.remove wire:target="asignar(1)" width="16" height="16" fill="currentColor"
                     class="bi bi-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                </svg>
                <svg wire:loading wire:target="asignar(1)"
                     class="animate-spin h-4 w-4 text-red-800" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        @endif
    </td>
    <td class="px-0 py-2 text-center whitespace-nowrap">
        @if($calif === 2)
            <button
                class="mx-auto py-2 px-3 flex items-center rounded bg-orange-200 text-sm text-orange-800 hover:bg-orange-300">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </button>
        @else
            <button wire:click="asignar(2)"
                    class="mx-auto py-2 px-3 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-orange-200 hover:text-orange-800">
                <svg wire:loading.remove wire:target="asignar(2)" width="16" height="16" fill="currentColor"
                     class="bi bi-circle"
                     viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                </svg>
                <svg wire:loading wire:target="asignar(2)"
                     class="animate-spin h-4 w-4 text-orange-800" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        @endif
    </td>
    <td class="px-0 py-2 text-center whitespace-nowrap">
        @if($calif === 3)
            <button
                class="mx-auto py-2 px-3 flex items-center rounded bg-yellow-200 text-sm text-yellow-800 hover:bg-yellow-300">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </button>
        @else
            <button wire:click="asignar(3)"
                    class="mx-auto py-2 px-3 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-yellow-200 hover:text-yellow-800">
                <svg wire:loading.remove wire:target="asignar(3)" width="16" height="16" fill="currentColor"
                     class="bi bi-circle"
                     viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                </svg>
                <svg wire:loading wire:target="asignar(3)"
                     class="animate-spin h-4 w-4 text-yellow-800" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        @endif
    </td>
    <td class="px-0 py-2 whitespace-nowrap">
        @if($calif === 4)
            <button
                class="mx-auto py-2 px-3 flex items-center rounded bg-lime-200 text-sm text-lime-800 hover:bg-lime-300">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </button>
        @else
            <button wire:click="asignar(4)"
                    class="mx-auto py-2 px-3 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-lime-200 hover:text-lime-800">
                <svg wire:loading.remove wire:target="asignar(4)" width="16" height="16" fill="currentColor"
                     class="bi bi-circle"
                     viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                </svg>
                <svg wire:loading wire:target="asignar(4)"
                     class="animate-spin h-4 w-4 text-lime-800" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        @endif
    </td>
    <td class="pl-0 pr-1 py-2 whitespace-nowrap text-right text-sm font-medium">
        @if($calif === 5)
            <button
                class="mx-auto py-2 px-3 flex items-center rounded bg-green-200 text-sm text-green-800 hover:bg-green-300">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
            </button>
        @else
            <button wire:click="asignar(5)"
                    class="mx-auto py-2 px-3 flex items-center rounded bg-transparent text-sm text-gray-400 hover:bg-green-200 hover:text-green-800">
                <svg wire:loading.remove wire:target="asignar(5)" width="16" height="16" fill="currentColor"
                     class="bi bi-circle"
                     viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                </svg>
                <svg wire:loading wire:target="asignar(5)"
                     class="animate-spin h-4 w-4 text-green-800" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        @endif
    </td>
</tr>
