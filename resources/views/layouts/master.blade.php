<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel vue spa</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div id="app">
    <ul class="nav nav-tabs">
        <li role="presentation" class="{{Request::getPathInfo() === '/'?'active':''}}">
            <router-link to="/">Home</router-link>
        </li>
        <li role="presentation"class="{{Request::getPathInfo() === '/about'?'active':''}}">
            <router-link to="/about">About</router-link>
        </li>
        <li role="presentation" class="{{Request::getPathInfo() === '/message'?'active':''}}">
            <router-link to="/message">Messages</router-link>
        </li>
    </ul>
    <router-view></router-view>
</div>
<script src="/js/app.js"></script>
</body>
</html>