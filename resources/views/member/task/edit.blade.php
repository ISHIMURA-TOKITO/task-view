@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card my-5">
                    <div class="card-header fs-1 text-center">タスク編集</div>
                    <div class="card-body">
                        <div class="col-6 mx-auto">
                            <div class="card my-5">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('member.task.update', $task) }}">
                                        @csrf
                                        {{-- 更新処理は@method('patch')を記載 --}}
                                        @method('patch')
                                        @include('member.task.form', [
                                            'title' => '新しいタスク名を入力してください。',
                                        ])
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" type="submit">編集</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
