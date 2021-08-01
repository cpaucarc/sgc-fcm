<x-app-layout>


    <h1 class="text-3xl font-bold tracking-widest text-red-700">
        Responsabilidad Social
    </h1>


    <div class="py-4">
        <div class="fixed inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div class="absolute inset-0 overflow-hidden">
                <!--
                  Background overlay, show/hide based on slide-over state.

                  Entering: "ease-in-out duration-500"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-500"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute inset-0 bg-gray-600 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
                    <!--
                      Slide-over panel, show/hide based on slide-over state.

                      Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-full"
                        To: "translate-x-0"
                      Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-0"
                        To: "translate-x-full"
                    -->
                    <div class="relative w-screen max-w-md">
                        <!--
                          Close button, show/hide based on slide-over state.

                          Entering: "ease-in-out duration-500"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in-out duration-500"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="absolute top-0 left-0 -ml-8 pt-4 pr-2 flex sm:-ml-10 sm:pr-4">
                            <button
                                class="rounded-md text-gray-300 hover:text-white focus:outline-none">
                                <span class="sr-only">Close panel</span>
                                <!-- Heroicon name: outline/x -->
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
                                    Panel title
                                </h2>
                            </div>
                            <div class="mt-6 relative flex-1 px-4 sm:px-6">
                                <!-- Replace with your content -->
                                <div class="absolute inset-0 px-4 sm:px-6">
                                    <div class="h-full py-4" aria-hidden="true">
                                        <p class="text-gray-800 ">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eaque
                                            iusto, praesentium quia reiciendis sunt temporibus? Aliquam dolorem enim
                                            harum iusto, labore quaerat quia sit! Ab fugit nam nesciunt nobis.
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Accusamus alias aliquam deleniti dolor dolores dolorum esse, est et
                                            explicabo fugit iusto libero minus nam natus odit placeat provident quam
                                            quas quasi qui quos ratione, repellendus sapiente sit veniam voluptates
                                            voluptatum. Debitis nobis odio quos soluta. Ab ad animi assumenda autem
                                            blanditiis dolor ea est eveniet, exercitationem expedita fugit impedit in
                                            ipsam iste iure labore laudantium maxime mollitia, nam necessitatibus nihil
                                            nulla officia porro repudiandae sed, sequi tempora tempore veniam voluptates
                                            voluptatum. A aperiam autem, dignissimos dolor doloribus eveniet
                                            exercitationem facere facilis fugit ipsam ipsum magnam quidem repellendus
                                            sit suscipit unde velit voluptatibus? Adipisci assumenda, atque cum
                                            cupiditate distinctio dolor dolorum eaque eius eligendi eveniet excepturi
                                            illo illum inventore ipsa iste itaque iure minus modi molestias nemo neque
                                            nesciunt nihil non odio optio quas quasi quia quibusdam, quod sed sequi
                                            similique sit tempora totam veniam voluptatem voluptates? Error est ipsa
                                            veritatis.
                                        </p>
                                    </div>
                                </div>
                                <!-- /End replace -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--    <x-jet-dialog-modal>--}}
    {{--        <x-slot name="title">--}}
    {{--            Titlo--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="content">--}}
    {{--            <p>--}}
    {{--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolorum recusandae sunt! Assumenda--}}
    {{--                blanditiis cumque eius enim expedita hic inventore laudantium magni, maiores odio porro quisquam--}}
    {{--                reiciendis sunt unde veniam?--}}
    {{--            </p>--}}
    {{--        </x-slot>--}}
    {{--        <x-slot name="footer">--}}
    {{--            <button>Cerra</button>--}}
    {{--        </x-slot>--}}
    {{--    </x-jet-dialog-modal>--}}

</x-app-layout>
