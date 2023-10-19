<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <hr>
                <div class="p-6 text-gray-900">
                    <a href="/user-threads">My Threads</a> | <a href="/add-a-thread">Create A Thread</a>
                </div>
                <hr>

                <div class="p-6 text-gray-900">
                    <h2>Active Users This Month</h2>
                    <ul>
                        @foreach ($activeusers as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <hr>
                @if(Auth::user()->is_admin)
                    <hr>
                    <div class="p-6 text-gray-900">
                        <h3>Admin Area (You are seeing this because you are Admin)</h3>
                        <a href="admin/delete-user">Delete Users</a> | <a href="admin/lock-threads">Lock Threads</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
