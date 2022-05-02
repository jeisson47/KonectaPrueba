<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba tecnica Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-white ">
        <div class="container p-4">
          <a class="navbar-brand fw-bold" href="/">Prueba Tenica</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('products.index')}}">Productos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('shop.index')}}">ventas</a>
              </li>

            </ul>
          </div>
        </div>
      </nav>

    <div class="container my-5 bg-white p-4">
        <div class=" w-100">
            <h1>Ventas</h1>
            <div class="text-end">
                <a href="{{route('shop.create')}}"  class="btn btn-primary mx-3">Crear Venta</a>
            </div>
           
        </div>
        
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ventas as $vta)
                <tr>
    
                    <td>{{$vta->product_name}}</td>
                    <td>${{number_format($vta->value)}}</td>
                    <td>{{$vta->created_at}}</td>

                </tr>
                @empty
                <tr>
    
                    <td>No hay ventas</td>

                </tr>
                @endforelse
    
    
            </tbody>
        </table>
    </div>


</body>

</html>
