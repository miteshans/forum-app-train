<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#">Create A Thread</a> | <a href="#">View Own Threads</a> | <a href="#">View All Threads</a>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="#"><i>Create A Post (on a given Threadd)</i></a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
