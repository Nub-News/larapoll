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

<div class="flex flex-col">
    <div class="h-1 bg-gray-200 rounded overflow-hidden dark:hidden">
        <div class="w-24 h-full bg-nubnewsred-800"></div>
    </div>
    <div class="flex flex-wrap sm:flex-row flex-col pt-2 pb-1">
        <h1 class="flex-1 text-gray-900 dark:text-primary-light font-medium title-font text-2xl dark:text-primary-light mb-2 sm:mb-2">Poll: <span class="text-nubnewsred-800 dark:text-white">{{ $question }}</span></h1>
    </div>
</div>

@foreach($options as $option)
    <div class="w-full pb-3">
        <h5 class="text-xl font-semibold text-gray-900 dark:text-primary-light">{{ $option->name }}</h5>
        <div class="w-full bg-gray-200">
            <div class="bg-nubnewsred-800 text-1xl font-medium text-white text-center p-0.5 leading-none" style="width: {{ $option->percent }}%"> {{ $option->percent }}%</div>
        </div>
    </div>
@endforeach
