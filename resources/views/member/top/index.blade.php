@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card">
                    <div class="card-header fs-1 text-center">マイページ（フォルダ詳細）</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7 overflow-auto" style="max-height: 600px">
                                <table class="table table-hover table-striped table-bordered">
                                    <colgroup>
                                        <col style="width:10%" />
                                        <col style="width:75%" />
                                        <col style="width:7.5%" />
                                        <col style="width:7.5%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class=" text-nowrap">フォルダ名</th>
                                            <th scope="col" class="text-center">編集</th>
                                            <th scope="col" class="text-center text-nowrap">削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($folders as $folder)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <a href="{{ route('member.task.show',$folder->id) }}">{{ $folder->name }}</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('member.folder.edit', $folder) }}"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    {{-- <button class="btn btn-sm btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button> --}}
                                                    @include('member.folder.delete')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-5">
                                <div class="card">
                                    <div class="card-header text-center">フォルダの個数</div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <label for="template_folder_name"
                                                class="form-label">あなたのフォルダの個数は{{ count($folders) }}個です。</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header text-center">フォルダを追加する</div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" type="button"
                                                onclick="location.href='{{ route('member.folder.create') }}'">追加</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header text-center">検索</div>
                                    <div class="card-body">
                                        <form method="GET" action="{{ route('member.top.index') }}">
                                            <div class="mb-3">
                                                <label for="folder_name" class="form-label">フォルダー検索</label>
                                                <input type="text" class="form-control" id="folder_name" name="name"
                                                    value="{{ $request->name ?? '' }}" placeholder="フォルダ名">
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
