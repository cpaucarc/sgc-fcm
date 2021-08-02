<div>
    <button class="px-2 py-1 bg-yellow-300 text-yellow-900" wire:click="$set('abrirSide', true)">
        Abrir
    </button>

    {{--    @if($abrirSide)--}}
    <div x-data="{ mostrar: @entangle('abrirSide') }">

        {{--        <div x-show="mostrar">--}}
        {{--            <p>--}}
        {{--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aliquam animi atque eius enim,--}}
        {{--                excepturi facere, id, iusto maiores necessitatibus sed temporibus vel! Facilis inventore molestias omnis--}}
        {{--                quibusdam ullam!--}}
        {{--            </p>--}}
        {{--        </div>--}}


        <div x-show="mostrar"
             x-show.transition.origin.top.right="mostrar">
            <x-right-panel
                titulo="#EricDontDoIt">
                <p class="text-gray-800 ">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eaque
                </p>
                <p class="text-xs text-gray-500 mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Accusamus alias aliquam deleniti dolor dolores dolorum esse, est et
                    nesciunt nihil non odio optio quas quasi quia quibusdam, quod sed sequi
                    similique sit tempora totam veniam voluptatem voluptates? Error est ipsa
                    veritatis.
                </p>
            </x-right-panel>
        </div>
    </div>
    {{--    @endif--}}


</div>
