@component('mail::message')


<h1 style="color:red">{{$data["isi"]}}</h1>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
