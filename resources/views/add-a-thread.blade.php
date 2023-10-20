<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add A New Thread
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

                <form name="add-a-thread-form" id="add-a-thread-form" method="post" action="{{url('store-thread')}}">
                @csrf
                    <div class="form-group">
                    <label for="inputTitle">Title</label><br>
                    <input type="text" name="thetitle" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="inputBody">Body</label><br>
                    <textarea name="thebody" class="form-control"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add A New Thread
                    </button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
