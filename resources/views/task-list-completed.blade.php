<x-app-layout>
        <div class="flex flex-col w-1/2 h-2/3" id="tasksCompleted">
            @if($tasks_completed->count() != 0)
            <h2 class="mx-auto font-bold text-3xl">Task Completed</h2>
            <table class="border-separate border-2">
                <thead class="font-bold text-lg bg-green-200">
                <tr>
                    <td class="border border-cyan-500 min-w-24 w-1/5">Title</td>
                    <td class="border border-cyan-500 w-3/5">Description</td>
                    <td class="border border-cyan-500 min-w-24 w-1/5">Updated</td>
                </tr>
                </thead>
                @foreach($tasks_completed as $task_completed)
                    <tbody class="">
                    <tr>
                        <td class="border border-cyan-300 min-w-24 max-w-48 break-words text-lg font-bold">{{ $task_completed->title}}</td>
                        <td class="border border-cyan-300 min-w-60 max-w-96 break-words">{{ $task_completed->description}}</td>
                        <td class="border border-cyan-300 min-w-24 w-1/5">{{ $task_completed->updated_at}}</td>
                        <td>
                            <form method="POST" id="completeForm">
                                @csrf
                                <label for="{{ $task_completed->id }}"></label>
                                <input id="{{ $task_completed->id }}" name="task_id" class="hidden" value="{{ $task_completed->id }}">
                                <x-custom.main-button-link>Once more</x-custom.main-button-link>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
                {{ $tasks_completed->links() }}
    @else
            <h2 class="text-xl text-center">Your have not completed tasks, please complete tasks.</h2>
    @endif
            <div class="flex justify-evenly">
                <x-custom.main-button :url="'/task/new'">+ New Task</x-custom.main-button>
                <x-custom.main-button :url="'/task/list'">Task List</x-custom.main-button>
            </div>
        </div>
</x-app-layout>
