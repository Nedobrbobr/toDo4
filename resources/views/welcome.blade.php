<x-app-layout class="antialiased">
    <h1 class="text-9xl mx-6">To Do</h1>
    <x-custom.main-button :url="'/task/new'">{{ __("+ New Task") }}</x-custom.main-button>
    <x-custom.main-button :url="'/task/list'">{{ __("Task List") }}</x-custom.main-button>
</x-app-layout>


