@component('mail::message')
# Welcome Back

Here is your One Time Password, please don't share it with anyone.


@component('mail::promotion')
   <h1 style="color:#1e90ff;font-size:2em;">{{$data['data']}}</h1>
@endcomponent

Thanks,<br>
{{ config('app.name') }} Apps
@endcomponent
