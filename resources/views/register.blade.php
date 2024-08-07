<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>
    <div class="container">
        <h4>dang ky</h4>
        @if (session('message'))
            <p class="text-danger">{{session('message')}} </p>
        @endif
        <form action="{{ route('postRegister') }}" method="post">
            @csrf
            <div class="mt-3">
                <label for="">name</label>
                <input type="text" name="name" class="form-control">
                @error (('name'))
                <p class="text-danger">{{$message}} </p>
            @enderror
            </div>
            <div class="mt-3">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
                @error (('email'))
                <p class="text-danger">{{$message}} </p>
            @enderror
            </div>
            <div class="mt-3">
                <label for="">PassWord</label>
                <input type="password" name="password" class="form-control">
                @error (('password'))
                <p class="text-danger">{{$message}} </p>
            @enderror
            </div>
            <div class="mt-3">
                <label for="">PassWord Confirm</label>
                <input type="password" name="password_confirmation" class="form-control">
                @error (('password'))
                <p class="text-danger">{{$message}} </p>
            @enderror
            </div>
            <button class="btn btn-primary">Dang ki</button>
        </form>
        <a href="{{route('login')}}"> dang nhap</a>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
