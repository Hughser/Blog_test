<html lang="en">

<head>
    @include('head')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('editor.md/css/editormd.min.css') }}" rel="stylesheet">
</head>

<body>

    @include('admin.nav')

    <div class="row">

        @include('admin.side')
        <div class="col-md-10">
            <div class="side-body">
                @yield('admin.sidecontent')
            </div>
        </div>

    </div>

    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/side.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('editor.md/editormd.min.js') }}"></script>
    @yield('editor_js')

</body>

</html>
