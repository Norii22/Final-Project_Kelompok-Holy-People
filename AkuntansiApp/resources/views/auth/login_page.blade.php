@extends('layouts.auth_main')
@section('content')
    <div class="full_container">
        <div class="container">
            <div class="center verticle_center full_height">
                <div class="login_section">
                    <div class="logo_login">
                        <div class="center">
                            <h1 class="text-white">
                                Login Page
                            </h1>
                        </div>
                    </div>
                    <div class="login_form">
                        <form method="POST" action="{{url('/do_login')}}">
                            @csrf
                            <fieldset>
                                <div class="field">
                                    <label class="label_field">Username</label>
                                    <input type="text" name="username" placeholder="Insert Username" required />
                                </div>
                                <div class="field">
                                    <label class="label_field">Password</label>
                                    <input type="password" name="password" placeholder="Insert Password" required />
                                </div>
                                <div class="field">
                                    {{-- <label class="label_field hidden">hidden label</label> --}}
                                    <a class="forgot text-primary" href="{{url('/register')}}">Regist New Account ?</a>
                                </div>
                                <div class="field margin_0">
                                    <label class="label_field hidden">hidden label</label>
                                    <button class="main_bt">Sign In</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection