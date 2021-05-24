<x-task-layout>
    <div>
        <h2 class="h4">タスクの編集</h2>
    </div>
    <div class="mb-3">
        <form method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">タスク名</label>
                <input type="text" class="form-control" name="name" value="{{session()->get("old_form.name")}}">
                @if(session()->get("errors.name"))
                <p class="text-danger">タスク名を入力してください</p>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">日付</label>
                <input type="date" class="form-control" name="date_on" value="{{session()->get("old_form.date_on")}}">
                @if(session()->get("errors.date_on"))
                    <p class="text-danger">タスクの日付を入力してください。</p>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">詳細</label>
                <textarea class="form-control" name="body" rows="5">{{session()->get("old_form.body")}}</textarea>
                @if(session()->get("errors.body"))
                    <p class="text-danger">タスクの詳細を入力してください</p>
                @endif
            </div>
            <input type="submit" class="btn btn-light" value="編集完了">
        </form>
    </div>
</x-task-layout>