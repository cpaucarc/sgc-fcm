<div>

    @if(isset($total))
        <div class="ml-2">
            <x-items-matched total="{{$total}}"></x-items-matched>
        </div>
    @endif

    <div class="flex flex-col border border-gray-200 rounded-lg">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow-sm overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        @if(isset($head))
                            <thead class="bg-white rounded-lg">
                            {{ $head }}
                            </thead>
                        @endif
                        <tbody class="bg-white divide-y divide-gray-100">
                        {{ $body }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
