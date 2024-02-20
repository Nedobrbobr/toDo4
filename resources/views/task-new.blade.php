<x-app-layout>
    <form class="flex flex-col gap-4 mb-36" method="POST" action="/task/new">
        @csrf
        <label for="title"></label>
        <textarea id="title" name="title" placeholder="Title" maxlength="50" required
                  class="rounded-lg h-12"></textarea>
        <label for="description"></label>
        <textarea id="description" name="description" placeholder="Description" maxlength="255" rows="5"
                  class="rounded-lg"></textarea>
        <div class="flex">
            <x-custom.main-button-link>{{ __('Add task') }}</x-custom.main-button-link>
            <x-custom.main-button :url="'/task/list'">{{ __('Task list') }}</x-custom.main-button>
        </div>
    </form>
</x-app-layout>
