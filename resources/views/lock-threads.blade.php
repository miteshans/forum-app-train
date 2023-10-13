<style>
/* CSS for horizontal layout of thread title and button */
.thread-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.thread-header h2 {
    margin: 0;
}

.thread-header button {
    margin-left: 10px; /* Adjust as needed for spacing */
}


</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            LOCK THREADS
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="forum-container">
                    @foreach ($threads as $thread)
                        <div class="thread">
                            <div class="thread-header">
                                <h2>{{ $thread['title'] }}</h2>
                                <!-- Lock Thread button for each thread -->
                                <form action="{{ route('lockthreadstore', [$thread]) }}" method="POST">
                                    @csrf
                                    @if ($thread->locked == 1)
                                        <button type="submit">UNLOCK</button>
                                    @else
                                        <button type="submit">Lock Thread</button>
                                    @endif
                                  
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
