<x-app-layout>
        <div class="flex flex-col w-1/2 h-2/3" id="taskList">
            @if($tasks_active->count() != 0)
            <h2 class="mx-auto font-bold text-3xl">Task list</h2>
            <table class="border-separate">
                <thead class="font-bold text-lg bg-green-200">
                    <tr>
                        <td class="border border-cyan-500 min-w-24 w-1/5">Title</td>
                        <td class="border border-cyan-500 w-3/5">Description</td>
                        <td class="border border-cyan-500 min-w-24 w-1/5">Updated</td>
                    </tr>
                </thead>
                @foreach($tasks_active as $task_active)
                <tbody>
                <tr>
                    <td class="border border-cyan-300 min-w-24 max-w-48 break-words text-lg font-bold">{{ $task_active->title}}</td>
                    <td class="border border-cyan-300 min-w-60 max-w-96 break-words">{{ $task_active->description}}</td>
                    <td class="border border-cyan-300 min-w-24 w-1/5">{{ $task_active->updated_at}}</td>
                    <td>
                        <form method="POST" action="/task/completed">
                            @csrf
                            <label for="{{ $task_active->id }}"></label>
                            <input id="{{ $task_active->id }}" name="task_id" class="hidden" value="{{ $task_active->id }}">
                            <x-custom.main-button-link>Complete</x-custom.main-button-link>
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
                {{$tasks_active->links() }}
            @else
            <h2 class="text-xl text-center">Your task list is empty, please add new task.</h2>
            @endif
            <div class="flex justify-evenly">
                <x-custom.main-button :url="'/task/new'">+ New Task</x-custom.main-button>
                <x-custom.main-button :url="'/task/completed'">Completed Tasks</x-custom.main-button>
            </div>
        </div>
</x-app-layout>


