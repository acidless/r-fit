<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <style>
        .material-icons {
            user-select: none;
        }

        body {
            background-color: #1b1e21;
        }
    </style>
</head>
<body>
<div style="height: 100vh;" class="d-flex flex-column">
    <header class="mb-5">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url("/")}}">R-Fit</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/auth/logout")}}">Logout</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{url("/auth/login")}}">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main class="flex-fill">
        <div class="container">
            @yield("content")
        </div>
    </main>
</div>
@include("layouts.includes.globalError")
<script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
