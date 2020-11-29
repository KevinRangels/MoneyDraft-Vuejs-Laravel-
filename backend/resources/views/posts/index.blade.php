<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Compras y Ventas Bitcoin VE-CO</h1>
 <table class="table">
      <thead>
        <tr>
          <th scope="col">Compra VE</th>
          <th scope="col">Ventas VE</th>
          <th scope="col">Compra CO</th>
          <th scope="col">Ventas CO</th>
        </tr>
      </thead>
      <tbody>

 {{--         @foreach ($buysCo  as  $index=>$buyCo)
          @if($buyCo->data->max_amount <= "20000000000" and $buyCo->data->max_amount != null )

        <tr>
          <th>{{$index}}-{{$buyCo->data->temp_price}}-cantidad:{{$buyCo->data->max_amount}}COP </th>
          
          <th></th>
          <th></th>

        </tr>
@endif
         @endforeach --}}

        <tr>
          <th>{{$cantidadTotal}}</th>
          
          <th></th>
          <th></th>

        </tr>
      </tbody>
    </table>

		
		{{-- 	<div class="panel panel-default">
				<div class="panel-body">
					Compra: {{$buyVe->data->temp_price}}
				</div>
			</div> --}}
	</div>
</body>
</html>