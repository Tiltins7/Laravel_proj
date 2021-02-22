<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: #e1ecf2;
        }

        .wrapper {
            margin: 10px;
        }

        .wrapper .top_navbar {
            width: calc(100% - 20px);
            height: 60px;
            display: flex;
            position: fixed;
            top: 10px;
        }

        .wrapper .top_navbar .hamburger {
            width: 70px;
            height: 100%;
            background: #2e4ead;
            padding: 15px 17px;

            cursor: pointer;
        }

        .wrapper .top_navbar .hamburger div {
            width: 35px;
            height: 4px;
            background: #92a6e2;
            margin: 5px 0;
            border-radius: 5px;
        }

        .wrapper .top_navbar .top_menu {
            width: calc(100% - 70px);
            height: 100%;
            background: #fff;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .wrapper .top_navbar .top_menu .logo {
            color: #2e4ead;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .wrapper .top_navbar .top_menu ul {
            display: flex;

        }

        .wrapper .top_navbar .top_menu ul li a {
            display: block;
            margin: 0 10px 0px 5px;
            width: 35px;
            height: 35px;
            line-height: 35px;
            text-align: center;
            border: 1px solid #2e4ead;
            border-radius: 50%;
            background: #4360b5;
            color: #fff;
        }



        .sanu_navig {
            position: fixed;
            top: 70px;
            left: 10px;
            background: #2e4ead;
            height: calc(100% - 80px);

            transition: all 0.3s ease;
        }

        .sanu_navig ul li a {
            display: block;
            padding: 20px;
            color: #fff;
            position: relative;
            margin-bottom: 1px;
            color: #92a6e2;
            white-space: nowrap;
            text-decoration: none;
        }

        .sanu_navig ul li a:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: #92a6e2;
            display: none;
        }

        .sanu_navig ul li a span.ikona {
            margin-right: 10px;
            display: inline-block;
        }

        .sanu_navig ul li a span.virsraksts {
            display: inline-block;
        }

        .sanu_navig ul li a:hover,
        .sanu_navig ul li a.active {
            background: #4360b5;
            color: #fff;
        }

        .sanu_navig ul li a:hover:before,
        .sanu_navig ul li a.active:before {
            display: block;
        }

        .wrapper.collapsible .sanu_navig {
            width: 70px;
        }

        .wrapper.collapsible .sanu_navig ul li a {
            text-align: center;
        }

        .wrapper.collapsible .sanu_navig ul li a span.ikona {
            margin: 0;
        }

        .wrapper.collapsible .sanu_navig ul li a span.virsraksts {
            display: none;
        }



        .lg_out {
            font-size: 90%;
            cursor: pointer;
            color: #2e4ead;
            margin: 15px 0px 0px 0px;
        }

        .lg_out:hover {
            text-decoration: underline;
        }

        .userinfo {
            font-size: 90%;
            cursor: pointer;
            color: #2e4ead;
        }

        .userinfo:hover {
            text-decoration: underline;
            font-size: 100%;
        }

        .pad {
            padding-top: 65px;
            text-align: center;
            width: 80%;
        }
    </style>


    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("collapsible");
            });
        });
    </script>

    <script>

    </script>



</head>

<body>
    <div id="app" class="wrapper">
        <div class="top_navbar">
            <div class="hamburger">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="top_menu">
                <ul class="userinfo">
                    <span style="margin:22px 0 0 0">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                    <li style="margin:15px 0 0 0"><a href="#"><i class="far fa-user"></i></a></li>
                </ul>
                <ul>
                    <span class="lg_out" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" style="color:#2e4ead"></i>
                        <span>{{ __('Iziet') }}</span>
                    </span>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>


        <div class="sanu_navig">
            <ul class="navig">
                <li><a href="/home" id="home">
                        <span class="ikona">
                            <i class="fas fa-chart-bar" aria-hidden="true"></i>
                        </span>
                        <span class="virsraksts">Pārskats</span>
                    </a></li>
                <li><a href="/animal_species">
                        <span class="ikona">
                            <i class="fas fa-paw"></i>
                        </span>
                        <span class="virsraksts">Dzīvnieku dati</span>
                    </a></li>
                <li><a href="#" class="" id="medicine">
                        <span class="ikona">
                            <i class="fa fa-hospital-o" aria-hidden="true"></i>
                        </span>
                        <span class="virsraksts">Medikamenti</span>
                    </a></li>
                @can('manage-users')
                <li><a href="/admin/users" id="users">
                        <span class="ikona">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="virsraksts">Lietotāja reģistrācija</span>
                    </a></li>
                @endcan
            </ul>
        </div>
    </div>



</body>

</html>