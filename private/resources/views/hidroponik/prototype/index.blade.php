<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .outer {
            display: table;
            position: relative;
            top: 15%;
            left: 0;
            width: 100%;
        }

        .middle {
            display: table-cell;
            /* vertical-align: middle; */
        }

        .inner {
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        .card {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
        }
    </style>
    <title>Hidroponiks App</title>
</head>
@extends('atemplate')
@section('head')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

<body class="container" style=" overflow-x: hidden;height: 100%">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" style="height: 10%;">
        <div class="navbar-brand" href="#" style="">
            <i class="fa fa-leaf" style="font-size: 2em;"> Hidroponik</i>
        </div>
    </nav>
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div class="row">
                    <div class="col-sm-12" style="margin-bottom: 1em;position: sticky;top:10px;">
                        <div class="card" style="width: 90%;">
                            <div class="card-body">
                                <h5 class="card-title"> {{$account['full_name']}} </h5>
                                <p> {{$account['phone_number']}} , {{$account['address']}} <br> Created At :
                                    {{$account['created_at']->format('d F Y')}}
                                    <br>You have {{count($data)}} devices.</p>
                                <form action="{{ url('prototype', []) }}" method="POST">
                                    @csrf
                                    <input type="SUBMIT" class="btn btn-primary" value="Add Devices">
                                </form>

                            </div>
                        </div>
                    </div>
                    {{-- break --}}
                    @foreach ($data as $item)
                    <div class="col-sm-12" style="margin-bottom: 1em;">
                        {{-- onclick="redirect('{{ url('prototype', [$item->prototype_id]) }}')"> --}}
                        <div class="card" style="width: 90%;">
                            <div class="card-body">
                                <i class="material-icons" style="font-size: 3em;">settings</i>
                                <h5 class="card-title">Device : {{$item->prototype_id}} </h5>
                                <a href="{{ url('prototype', [$item->prototype_id]) }}" class="btn btn-primary">Go To
                                    Prototype</a>
                                <button class="btn btn-danger" onclick="del('{{$item->prototype_id}}')">Delete
                                    Devices</button>
                                <br>
                                <form action="{{ url('prototype', [$item->prototype_id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" id="del{{$item->prototype_id}}" hidden>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function redirect(link){
    window.location.href = link;
   }
   function del(id){
    if(confirm("delete this devices?")){
        document.getElementById('del'+id).click();
    }
   }
    </script>
</body>

</html>