<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')Rentalin</title>
    @yield('header')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>



<style>

    body {
        background-color:rgb(0, 28, 105);
        }



    <style>
    .logout-form {
    margin-top: 10px;
    }

    .logout-btn {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 20px; 
    border-radius: 5px; 
    cursor: pointer;
    }

    .logout-btn:hover {
    background-color: #c82333;
    }


    .container{
        background-color: aliceblue;
        padding: 5px 25px 25px 25px;
        margin-top: 45px;
        border-radius: 25px;
        margin-bottom: 45px;
    }

    .imglogo{
        padding-right: 15px;
    }

    .navbar {
        background-color:deepskyblue;
    }

    .navbar-brand {
        padding: 0.5rem 1rem;
        font-size: 1.25rem;
        line-height: inherit;
        white-space: nowrap;
    }

    .navbar-nav {
        flex-direction: row;
    }

    .navbar-nav .nav-link {
        padding-right: 0.5rem;
        padding-left: 0.5rem;
    }

    .navbar-nav .nav-item.dropdown {
        position: static;
    }

    .navbar-nav .nav-item.dropdown .dropdown-menu {
        position: absolute;
    }

    .navbar-nav.ml-auto {
        margin-right: 0;
    }


    .navbar-nav.ml-auto .nav-link img {
        margin-right: 10px; 
    }

    .navbar-nav.ml-auto .nav-link img.rounded-circle {
        border: 1px solid #ddd; 
    }


</style>


<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">
        <img class="imglogo" src="{{ asset('images/logorentalin.png') }}" alt="Logo Perusahaan" height="60">
        Rentalin
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/dashboardadm">dashbord</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">list</a>
            </li>
        </ul>
    </div>

    <div class="navbar-nav ml-auto">
        <a class="nav-link" href="#">
            <img src="{{ asset('images/logorentalin.png') }}" alt="Foto Profil" height="60" class="rounded-circle">
        </a>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger ml-3" id="logout-btn">Logout</button>
    </form>
</nav>

{{-- list mobil --}}
<div class="container">
    @yield('content')
</div>

</body>
<footer>
    @yield('footer')
</footer>
</html>
