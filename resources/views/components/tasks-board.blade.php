@props(['project', 'tasks'])

<div x-data="board()" x-init="init()" class="w-full lg:max-w-5xl my-6 p-4 px-8 flex flex-col md:flex-row gap-4 mx-auto bg-white min-h-[480px] shadow rounded-md dark:bg-neutral-900">
    {{-- todo --}}
    <x-tasks-board-column title="Todo" @drop="drop($event, 'todo')" @dragover.prevent="">
        <template x-for="task in tasks.filter(t => t.status == 'todo')">
            <div draggable="true" @dragstart="drag(task.id)" class="cursor-grab bg-white dark:bg-neutral-900 mx-1.5 p-2 rounded-md border border-gray-200 shadow dark:bg-neutral-900/80 dark:border-neutral-800">
                <p class="mb-2" x-text="task.title"></p>
                <div class="flex items-center justify-between text-gray-900 whitespace-nowrap dark:text-gray-300">
                    {{-- avatar & name --}}
                    <div class="flex items-center justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 dark:text-gray-400">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                        <p class="ps-1 font-semibold text-sm" x-text="task.user.name"></p>
                    </div>  
                    {{-- priority badge --}}
                    <span
                        :class="{
                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300': task.priority === 'low',
                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300': task.priority === 'medium',
                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300': task.priority === 'high'
                        }"
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm"
                        x-text="task.priority"
                        >
                    </span>
                </div>
            </div>
        </template>
    </x-tasks-board-column>

    {{-- Progress --}}
    <x-tasks-board-column title="Progress" @drop="drop($event, 'progress')" @dragover.prevent="">
        <template x-for="task in tasks.filter(t => t.status == 'progress')">
            <div draggable="true" @dragstart="drag(task.id)" class="cursor-grab bg-white dark:bg-neutral-900 mx-1.5 p-2 rounded-md border border-gray-200 shadow dark:bg-neutral-900/80 dark:border-neutral-800">
                <p class="mb-2" x-text="task.title"></p>
                <div class="flex items-center justify-between text-gray-900 whitespace-nowrap dark:text-gray-300">
                    {{-- avatar & name --}}
                    <div class="flex items-center justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 dark:text-gray-400">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                        <p class="ps-1 font-semibold text-sm" x-text="task.user.name"></p>
                    </div>  
                    {{-- priority badge --}}
                    <span
                        :class="{
                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300': task.priority === 'low',
                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300': task.priority === 'medium',
                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300': task.priority === 'high'
                        }"
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm"
                        x-text="task.priority"
                        >
                    </span>
                </div>
            </div>
        </template>
    </x-tasks-board-column>

    {{-- done --}}
    <x-tasks-board-column title="Done" @drop="drop($event, 'done')" @dragover.prevent="">
        <template x-for="task in tasks.filter(t => t.status == 'done')">
            <div draggable="true" @dragstart="drag(task.id)" class="cursor-grab bg-white dark:bg-neutral-900 mx-1.5 p-2 rounded-md border border-gray-200 shadow dark:bg-neutral-900/80 dark:border-neutral-800">
                <p class="mb-2" x-text="task.title"></p>
                <div class="flex items-center justify-between text-gray-900 whitespace-nowrap dark:text-gray-300">
                    {{-- avatar & name --}}
                    <div class="flex items-center justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 dark:text-gray-400">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                        <p class="ps-1 font-semibold text-sm" x-text="task.user.name"></p>
                    </div>  
                    {{-- priority badge --}}
                    <span
                        :class="{
                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300': task.priority === 'low',
                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300': task.priority === 'medium',
                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300': task.priority === 'high'
                        }"
                        class="text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm"
                        x-text="task.priority"
                        >
                    </span>
                </div>
            </div>
        </template>
    </x-tasks-board-column>
</div>

<script>
    function board() {
        return {
            tasks: [],
            projectId: {{$project->id}},
            draggingId: null,
            init() {
                // fetch tasks
                axios.get(`/board/tasks/all?project_id=${this.projectId}`)
                    .then(res => this.tasks = res.data.tasks)
                    .catch(errs => console.log(errs))
            },
            drag(id) {
                this.draggingId = id
            },
            drop(event, status) {
                // update (frontend)
                let task = this.tasks.find(t => t.id === this.draggingId)
                task.status = status

                // send request
                axios.post(`/task/status/update?task_id=${this.draggingId}&status=${status}`)
                    .then(res => {
                        console.log(res.data)
                    })
                    .catch(errs => console.log(errs))
            },
        }
    }
</script>