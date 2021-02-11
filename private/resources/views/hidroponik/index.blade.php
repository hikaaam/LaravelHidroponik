<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .outer {
            display: table;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .middle {
            display: table-cell;
            vertical-align: middle;
        }

        .inner {
            margin-left: auto;
            margin-right: auto;
            width: 400px;
            /*whatever width you want*/
        }
        
    </style>
    <title>Hidroponiks App</title>
</head>
@extends('atemplate')
@section('head')
@endsection

<body class="container">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div class="d-flex justify-content-center">
                    <div class="row">
                        @if (\Session::has('error'))
                        <div class="col-sm-12 text-center">
                            <div class="alert alert-danger">
                               {!! \Session::get('error') !!}
                                
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-12 text-center" style="margin-bottom: 1em;">
                            <i class="fa fa-leaf" style="font-size: 2em;"> Hidroponik</i>
                        </div>
                        <div class="col-sm-12 text-center">
                            <form action="{{ url('account', []) }}" method="post">
                                @csrf
                                <input type="text" name="id" placeholder="email" class="form-control">
                                <br>
                                <input name="pw" placeholder="password" type="password" class="form-control">
                                <br>
                                <input type="submit" value="login" class="btn btn-success" style="width: 100%;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>