@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card my-5">
                    <div class="card-header fs-1 text-center">フォルダ追加</div>
                    <div class="card-body">
                        <div class="col-6 mx-auto">
                            <div class="card my-5">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('member.folder.store') }}">
                                        @csrf
                                        @include('member.folder.form', ['title'=>'追加するタイトルを入力してください'])
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" type="submit">追加</button>
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
