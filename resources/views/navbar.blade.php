<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title', 'Laravel Application')</title>
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575d63;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .profile-photo-upload {
            margin-bottom: 15px;
        }
        img{
            vertical-align: middle;
            width: 64px;
        }
    </style>
</head>
<body>
    <div class="sidebar">    
        <a href="#"><img src="{{ asset('images/profile.png') }}" alt="Avatar" class="avatar">
        </a>
        <a href="{{ route('form') }}">Dashboard</a>
        
        <a href="{{ route('emailconfig') }}">Email Config</a>
        {{-- <a href="{{ route('profile') }}">Profile</a> --}}
        <a href="">Payment</a>
        <!-- In your blade file -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="{{ route('logout') }}">logout</a>
            </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
