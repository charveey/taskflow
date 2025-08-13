<div draggable="true" 
    @dragstart="drag(task.id)" 
    x-on:click="$dispatch('open-task-modal', { id: task.id }); $dispatch('open-modal', 'task_details');" 
    class="text-sm cursor-pointer bg-white dark:bg-neutral-700 mx-1.5 p-2 rounded-md border border-gray-200 shadow dark:border-neutral-800"
>
    {{ $slot }}
</div>