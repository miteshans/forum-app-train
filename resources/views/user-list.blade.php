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
            Delete Users
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            <form action="{{ route('userdelete') }}" method="POST">
            @csrf
            @foreach ($users as $user)
                <input type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                {{ $user->name }}<br>
            @endforeach
            <button type="submit">Delete Selected Users</button>
        </form>
        </div>
    </div>
</x-app-layout>
