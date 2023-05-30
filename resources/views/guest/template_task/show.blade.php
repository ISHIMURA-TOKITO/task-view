@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card">
                    <div class="card-header fs-1 text-center">{{ $template_folder->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 overflow-auto" style="max-height: 600px">
                                <table class="table table-hover table-striped table-bordered">
                                    <colgroup>
                                        <col style="width:10%" />
                                        <col style="width:90%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">タスク名</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($template_folder->templateTasks as $template_task)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $template_task->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header text-center">検索</div>
                                    <div class="card-body">
                                        <form method="GET"
                                            action="{{ route('guest.template_task.show', $template_folder->id) }}">
                                            <div class="mb-3">
                                                <label for="template_folder_name" class="form-label">タスク検索</label>
                                                <input type="text" class="form-control" id="template_folder_name"
                                                    name="name" value="{{ $request->name ?? '' }}" placeholder="フォルダ名">
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" type="submit">検索</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card mt-5">
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
