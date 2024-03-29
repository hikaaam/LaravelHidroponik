<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.dev.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> 
 
    <link href="{{ asset('private/assets/css/app.css') }}" rel="stylesheet">
    <title> {{env("APP_NAME")}} </title>
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
            position: relative;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
        }

        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 95%;
            height: 25px;
            /* border-radius: 5px; */
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            margin-left: 2.5%;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }
    </style>
</head>


<body class="container" style="height: 100%">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand" href="#" style="">
            <i class="fa fa-leaf" style="font-size: 2em;"> Hidroponik aa</i>
        </div>
    </nav>
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div class="row">

                    {{-- break --}}

                    <div class="col-sm-12" style="margin-bottom: 1em;">
                        <div class=" card" style="width: 90%;">
                            <div class="slidecontainer" style="margin-top: 1em;">
                                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Temperature</h5>
                                <p>Value: <span id="demo"></span></p>
                                <p class="card-text" id='Temperature'></p>
                                <a href="#" class="btn btn-primary">A Button?</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12" style="margin-bottom: 1em;">
                        <div class=" card" style="width: 90%;">
                            <div class="slidecontainer" style="margin-top: 1em;">
                                <input type="range" min="1" max="5000" value="150" class="slider" id="myRange2">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Total Dissolved Solid</h5>
                                <p>Value: <span id="demo2"></span></p>
                                <p class="card-text" id='Tds'></p>
                                <a href="#" class="btn btn-primary">A Button?</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12" style="margin-bottom: 1em;">
                        <div class=" card" style="width: 90%;">
                            <div class="slidecontainer" style="margin-top: 1em;">
                                <input type="range" min="1" max="100" value="50" class="slider" id="myRange3">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Water Level</h5>
                                <p>Value: <span id="demo3"></span></p>
                                <p class="card-text" id='wl'></p>
                                <a href="#" class="btn btn-primary">A Button?</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <script>
        var query = '{{$id}}';
        var local = 'http://localhost:4000';
        var link = 'http://ta2020.xyz:4000';
        var socket = io.connect(local);
        socket.on('connect', function (data) {
            socket.emit('new user', 'P'+query);
			createData('P'+query);
            kirimData(query,'myRange','temp','Temperature');
            kirimData(query,'myRange2','tds','Tds');
            kirimData(query,'myRange3','wl','wl');
			
        });

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value + '°C';
        status(slider.value, 'temp');

        slider.oninput = function () {
            output.innerHTML = this.value + '°C';
            status(this.value, 'temp');
            var text = document.getElementById("Temperature");
            socket.emit('temp', {
                _val: this.value,
                _msg: text.innerHTML,
				_id:query
            });
        }

        var slider2 = document.getElementById("myRange2");
        var output2 = document.getElementById("demo2");
        output2.innerHTML = slider2.value + ' PPM';
        status(slider2.value, 'tds');

        slider2.oninput = function () {
            output2.innerHTML = this.value + ' PPM';
            status(this.value, 'tds');
            var text = document.getElementById("Tds");
            socket.emit('tds', {
                _val: this.value,
                _msg: text.innerHTML,
                _id:query
            });
        }

        var slider3 = document.getElementById("myRange3");
        var output3 = document.getElementById("demo3");
        output3.innerHTML = slider3.value + '%';
        status(slider3.value, 'wl');

        slider3.oninput = function () {
            output3.innerHTML = this.value + '%';
            status(this.value, 'wl');
            alert('tolol')
            var text = document.getElementById("wl");
            socket.emit('rwl', {
                _val: this.value,
                _msg: text.innerHTML,
                _id:query
            });
        }

        function status(value, type) {
            if (type == 'temp') {
                var text = document.getElementById("Temperature");
                if (value <= 20) {
                    text.innerHTML = "Suhu Terlalu Dingin Untuk Tanaman Hidroponik";
                } else if (value > 20 && value <= 40) {
                    text.innerHTML = "Suhu Ini Sudah Cocok Untuk Tanaman Hidroponik";
                } else {
                    text.innerHTML = "Suhu Ini Terlalu Panas Untuk Tanaman Hidroponik";
                }
            } else if (type == 'tds') {
                var text = document.getElementById("Tds");
                if (value <= 1200) {
                    text.innerHTML = "Pupuk Cair Hampir Habis Tolong Segera Isi Ulang Pupuk";
                } else if (value > 1200 && value <= 3700) {
                    text.innerHTML = "Pupuk Pada Tanaman Hidroponik Berada Di Status Aman";
                } else {
                    text.innerHTML = "Pupuk Masih Banyak";
                }
            } else {
                var text = document.getElementById("wl");
                if (value <= 35) {
                    text.innerHTML = "Segera Isi Tangki Air Tanaman Hidroponik Kamu";
                } else if (value > 35 && value <= 80) {
                    text.innerHTML = "Tangki Air Tanaman Hidroponik Berada Di Status Aman";
                } else {
                    text.innerHTML = "Tangki Air Tanaman Hidroponik Kamu Masih Penuh";
                }
            }
        }

        function getQueryParams(qs) {
            qs = qs.split('+').join(' ');

            var params = {},
                tokens,
                re = /[?&]?([^=]+)=([^&]*)/g;

            while (tokens = re.exec(qs)) {
                params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
            }

            return params;
        }

        function kirimData(id, data, tujuan,stat) {
            var text = document.getElementById(stat);
            var slider = document.getElementById(data);
            socket.emit(tujuan,  {
                _val: slider.value,
                _msg: text.innerHTML,
				_id:id
				
            });
			var data = {
				_id:'P'+id,
				_val:slider.value,
				_name:tujuan
			}
			updateData(data,tujuan);
        }
		function updateData(_data,_tujuan){
			socket.emit('currentData',{
				data:_data,
				time:Date()
			})
		}
	
		function createData(id){
			var _temp = document.getElementById('myRange').value;
			var _tds = document.getElementById('myRange2').value;
			var _wl = document.getElementById('myRange3').value;
			var _time = Date();
			var _data = {[id]:{
				temp:{data:_temp,time:_time,_name:'temp'},
				tds:{data:_tds,time:_time,_name:'tds'},
				wl:{data:_wl,time:_time,_name:'wl'},
				}};
			console.log(_data);
			socket.emit('createData',_data);
		}
    </script>
</body>

</html>