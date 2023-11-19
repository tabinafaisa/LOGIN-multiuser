<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
    </nav>

    <div class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6" style="background-color: lightgray">
                    <div class="mt-4 mb-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('notif'))
                            <div class="alert alert-danger">{{ Session::get('notif')['msg'] }}</div>
                        @endif
                        <form action="{{ url('/login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <h4>Login</h4>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</html>
