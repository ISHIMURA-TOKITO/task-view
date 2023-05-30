@if (Route::has('login'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
@endif

@if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">新規登録</a>
    </li>
@endif
