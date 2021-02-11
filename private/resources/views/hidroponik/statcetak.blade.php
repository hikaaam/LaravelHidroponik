
<head>

    <style>
        #textHeader {
            color: #000000;
            text-align: center;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 1em;
            margin-top: 2%;
        }
    
        #bottomHeader {
            color: #000000;
            text-align: center;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 0.8em;
        }
    
        hr {
            background-color: #000000;
            height: 1px;
        }
    
        #text {
            color: #000000;
            font-weight: bold;
        }
    
        table {
            width: 100%;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            background-color: #000000;
            text-align: center;
        }
    
        tbody {
            color: #fff;
            font-weight: bold;
            font-size: 12px;
            background-color: #333;
            text-align: center;
        }
        p{
            margin-bottom: -10px;
        }
    </style>
    </head>
    <body class="dark hi">
        <div class="container" style="background-color: #ffffffaa">
            <div class="row" id="header">
                <p class="col-sm-12" id="textHeader">
                    Hidroponik Apps Report
                </p>
                <br>
            </div>
    
            <hr>
            <div class="row" id="ket">
                <p id="text" class="col-md-12">
                    Id Prototype : {{$id}}
                </p>
                <p id="text" class="col-md-12">
                    Sensor : {{$sensor}}
                </p>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                    <td style="width: 5%">No</td>
                    <td>Tanggal</td>
                    <td>Nilai Rata-Rata Sensor</td>
                </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($data as $item)
                    <tr>
                        <td> {{$i}} </td>
                        <td>
                            @php
                            $time = strtotime($item['created_at']);
                            $tanggal = date('d M Y',$time);
                            @endphp
                            {{$tanggal}}
                        </td>
                        <td> {{$item['value']}} {{$nama}} </td>
                        @php
                        $i++;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
        </div>
    </body>