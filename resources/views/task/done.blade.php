<x-task-layout>
    <div>
        <h2 class="h4">タスクの削除</h2>
        <p>タスク {{$task->name}} を削除しても良いですか？</p>
    </div>
    <div class="mb-3">
        <form method="post">
            @csrf
            <input type="submit" class="btn btn-light" value="タスクの削除">
        </form>
    </div>
</x-task-layout>