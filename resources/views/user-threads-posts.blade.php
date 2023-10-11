<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Threads & Posts by User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2>Threads</h2>
                <hr>
                  @foreach ($threads as $thread)
                      <p><a href="#">{{ $thread->title }}</a></p>
                      {{$thread->body}}
                      <hr>
                  @endforeach

                  <br><br><br>
                  <h2>Posts by User</h2>
                  <!-- {{$posts}} -->
                  <hr>
                  @foreach ($posts as $post)
                      <a href="#">{{$post->body}}</a>
                      <hr>
                  @endforeach
            </div>
            
        </div>
        
    </div>
</x-app-layout>
