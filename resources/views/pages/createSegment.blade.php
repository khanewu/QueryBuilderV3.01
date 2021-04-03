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
            html, body {
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

            .links > a {
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="content">
                <form action="{{ route('segment.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <input type="text" name="segment_name" placeholder="Enter Segment"><br>
                    </div>
                    <div class="row">
                        <input type="text" name="segment_logic" placeholder="Enter Segment Logic"><br>
                    </div>
                    {{-- <div class="row">
                        <input type="text" name="logic[0][field_name]" placeholder="Field Name">
                        <input type="text" name="logic[0][field_type]" placeholder="Field type">
                        <input type="text" name="logic[0][op_type]" placeholder="op type">
                        <input type="text" name="logic[0][value]" placeholder="value">
                    </div>
                    <div class="row">
                        <input type="text" name="logic[1][relation]" placeholder="Relation">
                    </div>
                    <div class="row">
                        <input type="text" name="logic[2][field_name]" placeholder="Field Name">
                        <input type="text" name="logic[2][field_type]" placeholder="Field type">
                        <input type="text" name="logic[2][op_type]" value="between" placeholder="op Type">
                        <input type="text" name="logic[2][starts_at]" placeholder="starts at">
                        <input type="text" name="logic[2][end_at]" placeholder="end at">
                    </div>
                    <div class="row">
                        <input type="text" name="logic[3][relation]" placeholder="Relation">
                    </div>
                    <div class="row">
                        <input type="text" name="logic[4][field_name]" placeholder="Field Name">
                        <input type="text" name="logic[4][field_type]" placeholder="Field type">
                        <input type="text" name="logic[4][op_type]" value="between" placeholder="op Type">
                        <input type="text" name="logic[4][starts_at]" placeholder="starts at">
                        <input type="text" name="logic[4][end_at]" placeholder="end at">
                    </div> --}}
                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
        </div>
    </body>
</html>
