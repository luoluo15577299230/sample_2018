<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Sample_2018') - Laravel Study_Test</title>
       <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @include('layouts._header')
        <div class="container-fluid">
            @yield('content')
        </div>
        @include('layouts._footer')
    </body>
</html>