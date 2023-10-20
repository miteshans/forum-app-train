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

            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Thread</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                            </tr>
                        </thead>

                        @foreach ($threads as $thread)
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $thread['title'] }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    <form action="{{ route('lockthreadstore', [$thread]) }}" method="POST">
                                        @csrf
                                        @if ($thread->locked == 1)
                                            <button type="submit">UNLOCK</button>
                                        @else
                                            <button type="submit">Lock Thread</button>
                                        @endif
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                        @endforeach
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
