@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style_users.css">
   

    <script>
        $(document).ready(function() {
            $(".nav>li>a").removeClass("active"); //this will remove the active class from  
            //previously active menu item 
            $('#users').addClass('active');
        });
    </script>




</head>

<body>


    <div style="background-color:#e1ecf2;" class="jumbotron vertical-center text-center">
        <div class="container pad">
            <div class="container-sm">
                @include('partials.alerts')
            </div>
            <div class="capt">Lietotāju saraksts</div>
        </div>
        <div class="pogas-cont">
            <button type="button" class="button btn-primary pievienot-lietotaju" data-toggle="modal" data-target="#registerModal">{{ __('Pievienot jaunu') }}</button>
        </div>


        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered w-auto">
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
                                <button type="submit" class="btn btn-danger btn-sm" style="margin-left:5px;">Dzēst</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>


    <!-- Modalais logs -->

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModal">{{ __('Register') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form method="POST" id="registerForm" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vārds') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Uzvārds') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="VSN" class="col-md-4 col-form-label text-md-right">{{ __('VSN') }}</label>

                            <div class="col-md-6">
                                <input id="VSN" type="VSN" class="form-control @error('VSN') is-invalid @enderror" name="VSN" value="{{ old('VSN') }}" required autocomplete="VSN">

                                @error('VSN')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Epasts  ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>