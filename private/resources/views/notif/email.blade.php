@component('mail::message')

@component('mail::promotion')
<h1 style="color:red">{{$data["isi"]}}</h1>
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
