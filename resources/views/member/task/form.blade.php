{{-- HTML共通化処理 --}}
<input type="hidden" name="folder_id" value="{{ old('folder_id', isset($folder_id) ? $folder_id : $task->folder_id) }}">
<div class="mb-3 text-center">
    <label for="task_name" class="form-label">{{ $title }}</label>
    <input type="text" class="form-control @error('name')is-invalid @enderror" id="task_name" name="name"
        value="{{ old('name', isset($task) ? $task->name : '') }}" placeholder="タスク名">
    <div class="invalid-feedback">
        @error('name')
            {{ $message }}
        @enderror
    </div>

    <label for="task_limid" class="form-label">タスク期限を設定してください</label>
    <input type="date" class="form-control @error('limid')is-invalid @enderror" id="task_limid" name="limid"
        value="{{ old('limid', isset($task) ? $task->limid_ymd : '') }}" placeholder="タスク期限">
    <div class="invalid-feedback">
        @error('limid')
            {{ $message }}
        @enderror
    </div>

    <label for="task_situation" class="form-label">タスクの進捗を設定してください</label>
    <select class="form-select @error('situation')is-invalid @enderror" aria-label="Default select example"
        name="situation" id="task_situation">
        <option value="" @selected(old('situation', isset($task) ? $task->situation : '') == '')>---</option>
        <option value="未着手" @selected(old('situation', isset($task) ? $task->situation : '') == '未着手')>未着手</option>
        <option value="対応中" @selected(old('situation', isset($task) ? $task->situation : '') == '対応中')>対応中</option>
        <option value="完了" @selected(old('situation', isset($task) ? $task->situation : '') == '完了')>完了</option>
    </select>
    <div class="invalid-feedback">
        @error('situation')
            {{ $message }}
        @enderror
    </div>
</div>
