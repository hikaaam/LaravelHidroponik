<!DOCTYPE html>
<html lang="en">
<head>
  @yield('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{env("APP_NAME")}} </title>
    {{-- online library --}}

 
    {{-- <link rel="stylesheet" type="text/css"    href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
     --}}

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css"> 


    {{-- offline library --}}
      <!-- Bootstrap core CSS -->
      <link href="{{ asset('private/assets/css/app.css') }}" rel="stylesheet">


    <!-- Custom styles for this template -->


   <!-- js placed at the end of the document so the pages load faster -->


 <!--common script for all pages-->

 <!--script for this page-->

    

</head>
<body>
  
<!--header end-->
<!--sidebar end-->
        @yield('main')
    
    @yield('footer')



</body>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<!-- Datatables -->
{{-- <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> --}}
<!-- Bootstrap -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
<script>
      $(document).ready(function() {
        $('#table').DataTable();
      });
    </script>
</html>