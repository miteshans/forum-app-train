<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <b>REQ (Must)</b> <br>
                - <strike>User Reg</strike> <br>
                - User profile - private to the user, should show the amount of threads and posts they’ve created<br>
                - Ability to lock thread <br>
                - Ability to delete users <br>
                <hr><br>
                <b>REQ Stats/Interaction (Should)</b><br>
                - Ability to track views of each thread <br>
                - Display ranking on the landing page of the 10 most active users this month <br>
                - The user should be able to LIKE the thread/post. Users who liked the post or a thread are displayed under the body of the thread or post, their email is shown along with the date when the LIKE was left.<br>
                <hr><br>
                <b>REQ Stats/Interaction (Should)</b><br>
                - Add applicable unit tests to the functionality
                <hr><br>

                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">Create A Thread</a> | <a href="#"><i>Create A Post (on a given Threadd)</i></a>
                </div>
                <hr>
                <div class="p-6 text-gray-900">
                    <a href="#">View Own Threads</a> | <a href="#">View Own Posts (by threads)</a>
                </div>
                <hr>
                <div class="p-6 text-gray-900">
                    <a href="#">Delete Users</a> | <a href="#">Lock Threads</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
