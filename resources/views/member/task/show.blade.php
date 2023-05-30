@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card">
                    <div class="card-header fs-1 text-center">マイページ（タスク詳細）</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7 overflow-auto" style="max-height: 600px">
                                <table class="table table-hover table-striped table-bordered">
                                    <colgroup>
                                        <col style="width:3%" />
                                        <col style="width:65%" />
                                        <col style="width:12%" />
                                        <col style="width:5%" />
                                        <col style="width:5%" />
                                        <col style="width:5%" />
                                        <col style="width:5%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class="text-nowrap">タスク名</th>
                                            <th scope="col" class="text-nowrap">期限</th>
                                            <th scope="col" class="text-nowrap">状況</th>
                                            <th scope="col" class="text-center">共有</th>
                                            <th scope="col" class="text-center">編集</th>
                                            <th scope="col" class="text-center text-nowrap">削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($folder->tasks as $task)
                                            <tr class="@if($task->situation == "対応中") bg-warning bg-opacity-75 @endif">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $task->name }}</td>
                                                <td class="text-nowrap">{{ $task->limid_ymd }}</td>
                                                <td class="text-nowrap">{{ $task->situation }}</td>
                                                <td class="text-center">
                                                    @include('member.api.send')
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('member.task.edit', $task) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    @include('member.task.delete')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-5">
                                <div class="card">
                                    <div class="card-header text-center">タスクの個数</div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <label for="template_folder_name"
                                                class="form-label">あなたのタスクの個数は{{ ($folder->tasks_count) }}個です。</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header text-center">タスクを追加する</div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" type="button"
                                                onclick="location.href='{{ route('member.task.create', ['folder' => $folder->id]) }}'">追加</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header text-center">検索</div>
                                    <div class="card-body">
                                        <form method="GET" action="{{ route('member.task.show', $folder->id) }}">
                                            <div class="mb-3">
                                                <label for="folder_name" class="form-label">タスク検索</label>
                                                <input type="text" class="form-control" id="folder_name" name="name"
                                                    value="{{ $request->name ?? '' }}" placeholder="タスク名">
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" type="submit">検索</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header text-center">コメント</div>
                                    <div class="card-body">
                                        <div class="frame_line">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .frame_line {
            padding: 0.5em 1em;
            border: double 5px #4ec4d3;
        }
    </style>
@endsection
@push('scripts')
    <script>
        function buttonClick(id) {
            axios.get('/api/task_send/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .finally(function() {
                    // always executed
                });
        }
    </script>
@endpush
