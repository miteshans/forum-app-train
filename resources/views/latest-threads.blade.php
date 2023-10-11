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
            Latest Threads
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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

                         <!-- Form for adding a new post -->
                        <form action="/store-post" method="POST">
                            @csrf
                            <textarea name="newpost" rows="4" cols="50" placeholder="Add a new post to this Thread"></textarea><br>
                            <button type="submit">Submit Post</button>
                            <input type="hidden" name="threadid" value="{{ $thread['id'] }}">
                        </form>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
