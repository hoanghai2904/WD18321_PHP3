{{-- giao diện gốc --}}
{{-- tất cả các giao diện khác extend từ index --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- asset vut vao trong public --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    @stack('styles')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
        <!-- side bar -->
            @include('admin.layout.sidebar')
            <div class="col-9 offset-3 p-0 position-relative">
                <!-- header -->
                @include('admin.layout.header')

                <!-- main -->
                @yield('content')
                <!-- footer -->
                @include('admin.layout.footer')
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @stack('script')
</body>

</html>