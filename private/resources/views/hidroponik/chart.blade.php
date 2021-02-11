<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistik</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
</head>
<body style="width: 1080px;">
    <canvas id="myChart" width="10%" height="3%"></canvas>

    <script>
        var ctx = document.getElementById('myChart');
        var label = {{json_encode($label)}};
        if(label.length == 7){
                var tytyd = [];
                label.forEach(element => {
                    tytyd.push("Day "+element)
                });
                label = tytyd;
        }
        else if(label.length < 7){
            var tytyd = [];
                label.forEach(element => {
                    tytyd.push("Week "+element)
                });
                label = tytyd;
        }
       
        var dataset = {{json_encode($data)}};
        var data =  {
        labels:  label,
        datasets: [{
            label: 'suhu',
            data: dataset,
            backgroundColor: [
                'rgba(106,255,0, 0.3)'
            ],
            borderColor: [
                'rgba(255,0,170, 1)'
            ],
            pointBackgroundColor: getColor(dataset.length),
            pointRadius:8
           
        }]
    };
    var op = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    min:0,
                    max:60
                }
            }]
        }
    };
var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: op
});

function getColor(int){
    var color = ['rgb(255,0,0)','rgb(237,185,185)','rgb(143,35,35)','rgb(0,0,0)',
                'rgb(255,255,0)', 'rgb(185,215,237)','rgb(35,98,143)', 'rgb(115,115,115)',
                'rgb(0,234,255)', 'rgb(231,233,185)', 'rgb(143,106,35)', 'rgb(204,204,204)',
                'rgb(170,0,255)','rgb(220,185,237)','rgb(107,35,143)','rgb(255,127,0)',
                'rgb(185,237,224)','rgb(79,143,35)', 'rgb(191,255,0)', 'rgb(0,149,255)',
                'rgb(255,0,170)','rgb(255,212,0)', 'rgb(106,255,0)','rgb(0,64,255)'];
    var colorNeeded = new Array();
    for(i=0;i<int;i++){
        colorNeeded.push(color[23-i]);
    }
    return colorNeeded;
}

    </script>
</body>
</html>