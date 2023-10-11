<style>
    .forum-container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
}

.thread {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    margin: 10px 0;
    padding: 10px;
}

.post {
    background-color: #fff;
    border: 1px solid #ddd;
    margin: 10px 0;
    padding: 10px;
}

.post-meta {
    font-size: 0.9rem;
    color: #666;
}

</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Threads
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="forum-container">
                @foreach ($threads as $thread)
                    <div class="thread">
                        <h2>{{ $thread['title'] }}</h2>
                        <p>{{ $thread['body'] }}</p>

                        @if (isset($thread['posts']))
                            @foreach ($thread['posts'] as $post)
                                <div class="post">
                                    <p>{{ $post['body'] }}</p>
                                    <p class="post-meta">Created At: {{ $post['created_at'] }}</p>
                                    <p class="post-meta">Updated At: {{ $post['updated_at'] }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
