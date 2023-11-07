
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
                <fieldset>
                    <legend class="sr-only">Notifications</legend>
                    <div class="space-y-5">
                        <div class="relative flex items-start">
                        <div class="flex h-6 items-center">
                            <input id="selected_users[]" value="{{ $user->id }}" aria-describedby="comments-description" name="selected_users[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="ml-3 text-sm leading-6">
                            <label for="comments" class="font-medium text-gray-900"> {{ $user->name }}</label>
                        </div>
                        </div>
                    </div>
                </fieldset>
            @endforeach
            <br>
            <button type="submit" class="rounded-md bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Delete Selected Users
            </button>

            
        </form>
        </div>
    </div>
</x-app-layout>
