<style>
    /* .forum-container {
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
} */

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
                    <ul role="list" class="divide-y divide-gray-500">
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="h-12 w-12 flex-none"></div>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900"><a href="/view-thread/{{ $thread['id'] }}">{{ $thread['title'] }}</a></p>
                                    <p class="mt-1  text-xs leading-5 text-gray-500">{{ $thread['body'] }}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col" style="margin-right: 100px;">
                                <p class="text-sm leading-6 text-gray-900">Likes: {{ $thread->likes->count() }} | Views: {{ $thread->viewcount }}</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">posted {{ $thread['created_at'] }}</p>
                            </div>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
