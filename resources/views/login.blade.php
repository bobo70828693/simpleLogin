<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .content {
            border: solid 2px;
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            line-height: 40px;
        }

        .content label {
            font-weight: 900;
        }

        .label_box {
            float: left;
            width: 50%;
        }

        .input_box {
            float: left;
            width: 50%;
        }

        .input_box input {
            border-radius: 5px;
            border: solid 2px #dedede;
            height: 20px;
        }

        input.submit_btn {
            margin-top: 25px;
            padding: 5px 20px;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            letter-spacing: 5px;
            font-size: 15px;
            color: #636b6f;
            background-color: #eee;
            border-radius: 5px;
            border: solid 2px #5c5b5b;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('register'))
        <div class="top-right links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
        @endif
        <div class="content">
            <div class="login_box">
                <div class="login_content">
                    @if (Auth::check())
                    <h3>登入成功</h3>
                    <form method='POST' action="/user/logout">
                        @csrf
                        <input type="submit" class="submit_btn" value="登出" />
                    </form>
                    @else
                    @if(isset($type) && $type == 'register')
                    <h3>註冊</h3>
                    @if(@isset($result['status']))
                    <p style="color: red">{{ $result['msg'] }}</p>
                    @endif
                    <form method='POST' action="/user/doRegister">
                        @csrf
                        <div class="label_box">
                            <label for="user_name">User </label><br>
                            <label for="user_email">Email </label><br>
                            <label for="user_password">Password </label><br>
                        </div>
                        <div class="input_box">
                            <input type="text" name="name" id="user_name"><br>
                            <input type="email" name="email" id="user_email"><br>
                            <input type="password" name="password" id="user_password"><br>
                        </div>
                        <input type="submit" class="submit_btn" value="註冊" />
                    </form>
                    @else
                    <h3>尚未登入</h3>
                    @if(@isset($result['status']))
                    <p style="color: red">{{ $result['msg'] }}</p>
                    @endif
                    <form method='POST' action="/user/login">
                        @csrf
                        <div class="label_box">
                            <label for="user_name">User </label><br>
                            <label for="user_password">Password </label><br>
                        </div>
                        <div class="input_box">
                            <input type="text" name="userName" id="user_name"><br>
                            <input type="password" name="password" id="user_password">
                        </div>
                        <input type="submit" class="submit_btn" value="登入" />
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>