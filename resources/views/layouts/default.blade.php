<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Sample_2018') - Laravel Study_Test</title>
        <link rel="stylesheet" href="/css/app.css">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>
    <body>
        @include('layouts._header')
        <div class="container-fluid">
            @yield('content')
        </div>
        @include('layouts._footer')

    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>