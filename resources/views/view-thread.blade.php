
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Thread
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

            <div class="max-w-3xl mx-auto bg-white p-4 rounded-md shadow-md">
                <h1 class="text-2xl font-bold mb-4">{{ $thread['title'] }}</h1>
                
                <p class="text-gray-400 text-sm mb-4">Thread Created on {{ $thread['created_at'] }}</p>

                <div class="mb-6">
                {{ $thread->body }}
                </div>

                <!-- Like button and views -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        
                        <form method="POST" action="{{ route('likethread', [$thread['id']]) }}">
                            @csrf 
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600">Like</button>
                        </form>
                        
                        <span class="ml-2 text-gray-600">{{ $thread->likes->count() }} Likes</span>
                    </div>
                    <span class="text-gray-600">{{ $thread->viewcount }} Views</span>
                </div>

                <!-- list of posts on the thread -->
                @if (isset($thread['posts']))
                    @foreach ($thread['posts'] as $post)
                        <div class="space-y-4">
                            <!-- individual Posts -->
                            <div class="bg-gray-200 p-4 rounded-md">
                                <div class="flex items-center justify-between">
                                    <div class="text-gray-700">{{ $post['body'] }}</div>
                                    <div class="flex items-center">
                                        <form method="POST" action="{{ route('likepost', [ $post['id'],$thread['id'] ]) }}">
                                            @csrf
                                            <button class="px-3 py-1 bg-blue-500 text-white rounded-full hover:bg-blue-600">Like</button> 
                                        </form>
                                        <span class="ml-2 text-gray-600">{{ $post->likes->count(); }}&nbsp;Likes</span>
                                    </div>
                                </div>
                                <p class="text-gray-400 text-sm">Posted on {{ $post['created_at'] }}</p>
                            </div>
                        </div>
                        <br>
                    @endforeach
                @endif
                <!-- end list of posts on the thread -->
        

                <!-- Submit a New Post on the thread -->
                <form action="/store-post" method="POST">
                    @csrf
                    @if ($thread->locked == 1)
                        <br>Sorry this Thread is locked from further commenting
                    @else
                        <textarea name="newpost" class="w-full px-3 py-2 border rounded-md" placeholder="Write your post here..."></textarea>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600">Post</button>
                    @endif
                    <input type="hidden" name="threadid" value="{{ $thread['id'] }}">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
