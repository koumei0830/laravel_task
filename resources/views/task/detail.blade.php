<x-task-layout>
    <div>
        <h2 class="h4">タスク詳細</h2>
    </div>
    <div class="mb-3">
        <div>
            <div class="mb-3">
                <label class="form-label">タスク名</label>
                <p>{{$task->name}}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">日付</label>
                <p>{{$task->date_on}}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">詳細</label>
                <p>{{$task->body}}</p>
            </div>
            <a class="btn btn-light" href="/task/{{request()->route("id")}}/edit">編集</a>
            <a class="btn btn-light" href="/task/{{request()->route("id")}}/done">削除</a>
        </div>
    </div>
</x-task-layout>