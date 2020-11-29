
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MoneyDraft</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- VUE -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet"> <!--Añadimos el css generado con webpack-->
    <!-- TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/testimonies.css')}}">

    <script src="https://kit.fontawesome.com/ef87ffd06d.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body class="" style="padding-right: 0 !important; width: 100% !important" >
<div id="app" class="content"><!--La equita id debe ser app, como hemos visto en app.js-->
    @yield('ltewrapper')

    </div>
    <!-- ./wrapper -->
    <script src="{{asset('js/app.js')}}"></script> <!--Añadimos el js generado con webpack, donde se encuentra nuestro componente vuejs-->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>
</body>

</html>
<script>
  @if(Session::has('message'))
    var type="{{ Session::get('alert-type', 'info') }}"
    switch(type){
        case 'success':
        toastr.success("{{ Session::get('message') }}", {timeOut: 525000});
                toastr.options.closeDuration = 111300;

        break;
        case 'error':
        toastr.info("{{ Session::get('message') }}");
        break;
    }
@endif  
</script>
