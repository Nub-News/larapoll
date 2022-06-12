@if(Session::has('errors'))
    <div wire:loading.block wire:target="save" class="mt-5 w-full bg-white flex flex-col p-3 border-2 border-gray-200 rounded-lg mb-3">
        <div class="text-nubnewsred-800">
            {{ session('errors') }}
        </div>
    </div>
@endif
@if(Session::has('success'))
    <div class="w-full flex flex-col border-2 border-gray-200 rounded-lg mb-2">
        <div class="text-center flex flex-col p-4 md:text-left md:flex-row md:items-center md:justify-between md:p-4 bg-green-100">
            <div class="font-medium title-font text-2xl mb-2">
                <div class="text-gray-900">
                    <span class="text-green-500"><strong>{{ session('success') }}</strong>.</span>
                </div>
            </div>
        </div>
    </div>
@endif

<h2 class="text-xl font-semibold pb-3">Poll: {{ $question }}</h2>

@foreach($options as $option)
    <div class="w-full bg-gray-200 pb-3">
        <h5 class="text-base font-semibold">{{ $option->name }}</h5>
        <div class="w-full bg-gray-200">
            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none" style="width: {{ $option->percent }}%"> {{ $option->percent }}%</div>
        </div>
    </div>
@endforeach
