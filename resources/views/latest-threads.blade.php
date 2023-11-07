
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

            <div class="max-w-3xl mx-auto bg-white p-4 rounded-md shadow-md">
                
                <!-- Thread List -->
                <ul class="space-y-4">
                    @foreach ($threads as $thread)
                        <!-- Thread -->
                        <li class="bg-gray-200 p-4 rounded-md">
                            <div class="text-xl font-bold">{{ $thread->title }}</div>
                            
                            @if ($thread->user)
                                <p class="text-gray-500">Posted by {{ $thread->user->name }} {{ \Carbon\Carbon::parse($thread['created_at'])->diffForHumans() }}</p>
                            @else
                                <p class="text-gray-500">Posted by [user deleted] {{ \Carbon\Carbon::parse($thread['created_at'])->diffForHumans() }}</p>
                            @endif

                            <p class="text-gray-700 mt-2">{{ $thread['body'] }}</p>
                            <div class="mt-2">
                                <span class="text-blue-600">{{ $thread->likes->count() }} Likes</span>
                                <span class="text-gray-600 ml-2">{{ $thread->viewcount }} Views</span>
                                <span class="text-green-600 ml-2">{{ $thread->posts->count() }} Replies</span>
                            </div>
                            <a href="/view-thread/{{ $thread['id'] }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 inline-block">View Thread</a>
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>
</x-app-layout>
