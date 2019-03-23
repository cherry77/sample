<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{padding: 0;margin: 0}
        .container{width: 1200px;margin: 10px auto}
        .container .header{width: 1200px;height: 150px;background: #bce8f1}
        .container .center{width: 1200px;margin-top: 15px;}
        .container .sidebar{float: left;width: 200px;height: 400px;margin-right: 20px;background: #bce8f1;}
        .container .content{float: left;width: 980px;height: 400px;background: #bce8f1;}
        .clearfloat{clear:both}
        .container .footer{height: 100px;background: #bce8f1;margin-top: 15px;}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @section('header')
            头部
            @show
        </div>
        <div class="center">
            <div class="sidebar">
                @section('sidebar')
                    侧边栏
                @show
            </div>
            <div class="content">
                @yield('content','主要内容区域')
            </div>
            <div class="clearfloat"></div>
        </div>
        <div class="footer">
            @section('footer')
                footer
            @show
        </div>
    </div>
</body>
</html>