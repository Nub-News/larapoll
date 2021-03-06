<form method="POST" action="{{ route('poll.vote', $id) }}" >
    @csrf
    <div class="flex flex-col">
        <div class="h-1 bg-gray-200 rounded overflow-hidden">
            <div class="w-24 h-full bg-nubnewsred-800"></div>
        </div>
        <div class="flex flex-wrap sm:flex-row flex-col pt-2 pb-1">
            <h1 class="flex-1 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-2">Poll: <span class="text-nubnewsred-800">{{ $question }}</span></h1>
        </div>
    </div>

    <div class="panel-body">
        <ul class="list-group">
            <input value="{{ request()->userEmail }}" type="hidden" name="newsletter_id">
            @foreach($options as $id => $name)
                <li class="list-group-item">
                    <div class="radio">
                        <div class="flex items-center mr-4 mb-2 mt-2">
                            <input type="radio" name="options" value="{{ $id }}" />
                            <label class="flex items-center text-xl font-semibold">
                            <span class="inline-block mr-2 flex-no-shrink"></span>
                                {{ $name }}
                            </label>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <input type="submit" class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-nubnewsred-800 hover:bg-nubnewsred-900 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker" value="Vote">
    </div>
</form>
