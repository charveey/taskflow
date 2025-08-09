@props(['tasks'])

<div>
    @foreach ($tasks as $task)
        <p>{{ $task->title }}</p>
        <p>{{ $task->user->name }}</p>
    @endforeach
</div>