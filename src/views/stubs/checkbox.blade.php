<form method="POST" action="{{ route('poll.vote', $id) }}" >
    @csrf
    <div class="flex flex-col">
        <div class="h-1 bg-gray-200 rounded overflow-hidden">
            <div class="w-24 h-full bg-nubnewsred-800"></div>
        </div>
        <div class="flex flex-wrap sm:flex-row flex-col pt-2 pb-1">
            <h1 class="flex-1 text-gray-900 font-medium title-font text-2xl mb-0 sm:mb-0">Poll: <span class="text-nubnewsred-800">{{ $question }}</span></h1>
        </div>
    </div>

    <div class="panel-body">
        <ul class="list-group">
            <input value="{{ request()->userEmail }}" type="hidden" name="newsletter_id">
            @foreach($options as $id => $name)
                <li class="list-group-item">
                    <div class="mb-3">
                        <label class="block font-medium text-sm dark:text-light text-gray-700" for="live">
                            {{ $name }}
                        </label>
                        <label for="live" class="flex items-center relative w-max cursor-pointer select-none">
                            <input class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" type="checkbox" name="options[]">
                            <span class="absolute font-medium text-xs uppercase right-1 text-white"> No </span>
                            <span class="absolute font-medium text-xs uppercase right-8 text-white"> Yes </span>
                            <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200"></span>
                        </label>
                    </div>




                        <label>
                            <input value="{{ $id }}" type="checkbox" name="options[]">
                            {{ $name }}
                        </label>
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <input type="submit" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-nubnewsred-800 hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker" value="Vote">
    </div>
</form>
