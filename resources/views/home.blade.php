@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header fs-1 text-center">ホーム</div>
                    <div class="card-body">
                        <div class="col-8 mx-auto my-5">
                            <a class="d-block btn btn-info py-5" href="{{ route('login') }}">
                                <span class="fs-4">ログインする</span>
                            </a>
                        </div>
                        <div class="col-8 mx-auto my-5">
                            <a class="d-block btn btn-secondary py-5" href="{{ route('guest.top.index') }}">
                                <span class="fs-4">ログインしないでアプリを使用する</span>
                            </a>
                        </div>
                        <div class="col-8 mx-auto mx-5 frame_line">
                            <div class="col-4 mx-auto">★ログインユーザのメリット★</div>
                            <ul>
                                <li class="fs-5">フォルダ、タスクを自由に登録することができる。</li>
                                <li class="fs-5">完了していないタスクの個数を可視化できる。</li>
                                <li class="fs-5">対応中のタスクが強調表示されるようになる。</li>
                            </ul>
                        </div>
                        <div class="col-4 mx-auto mt-5">
                            <a href="{{ route('register') }}">
                                <span class="fs-4">新規登録の方はこちらをクリック</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .frame_line {
            padding: 0.5em 1em;
            margin: 2em 0;
            border: double 5px #4ec4d3;
        }

        .frame_line p {
            margin: 0;
            padding: 0;
        }
    </style>
@endsection
