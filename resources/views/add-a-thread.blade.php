<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2>Add A New Thread</h2>

                <form name="add-a-thread-form" id="add-a-thread-form" method="post" action="{{url('store-thread')}}">
                @csrf
                    <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required="">
                    </div>
                    <div class="form-group">
                    <label for="inputBody">Body</label><br>
                    <textarea name="body" class="form-control" required=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
