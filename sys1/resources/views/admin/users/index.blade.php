@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style_users.css">

    <script>
        $(document).ready(function() {
            $(".nav>li>a").removeClass("active"); //this will remove the active class from  
            //previously active menu item 
            $('#users').addClass('active');
        });
    </script>


</head>

<body>
    <div class="container-sm pad">
        @include('partials.alerts')
    </div>
    <div class="jumbotron vertical-center">
        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered w-auto">
                <caption class="capt">Lietotāju saraksts</caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vārds</th>
                        <th>Uzvārds</th>
                        <th>Loma</th>
                        <th>VSN</th>
                        <th>E-pasts</th>
                        <th>Darbības</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr id="dati">
                        <th>{{$user -> id}}</th>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> surname}}</td>
                        <td>{{ implode(', ', $user -> roles()->get()->pluck('name')->toArray())}}</td>
                        <td>{{$user -> VSN}}</td>
                        <td>{{$user -> email}}</td>
                        <td>
                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button" class="btn btn-primary btn-sm float-left">Labot</button></a>
                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-sm">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>