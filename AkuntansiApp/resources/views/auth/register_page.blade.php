@extends('layouts.auth_main')
@section('content')
    <div class="center verticle_center full_height">
        <div class="login_section">
            <div class="logo_login">
                <div class="center">
                    <h1 class="text-white">
                        Register Page
                    </h1>
                </div>
            </div>
            <div class="login_form">
                <form method="POST" action="{{url('/do_register')}}">
                    @csrf
                    <fieldset>
                        <div class="field">
                            <label class="label_field">Name</label>
                            <input type="text" name="name" placeholder="Insert Name" required />
                        </div>
                        <div class="field">
                            <label class="label_field">Username</label>
                            <input type="text" name="username" placeholder="Insert Username" required />
                        </div>
                        <div class="field">
                            <label class="label_field">Password</label>
                            <input type="password" name="password" placeholder="Insert Password" required />
                        </div>
                        <div class="field">
                            <label class="label_field">Re-type Password</label>
                            <input type="password" name="c_password" placeholder="Insert Password Again" required />
                        </div>
                        <div class="field">
                            <a href="{{url('/login')}}" class="forgot text-primary">Back to Login</a>
                        </div>
                        <div class="field margin_0">
                            <label class="label_field hidden">hidden label</label>
                            <button class="main_bt">Create Account</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection