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
            <h1>Crear Venta</h1>
           
        </div>
        
        <form action="{{route('shop.store')}}" method="POST">
            @method('PATCH')
        @csrf
        <div class="row">
            
            <div class="col-6">
                <div class="form-floating">
                    <select class="form-select" id="productSelect" name="product" aria-label="Floating label select example" required>
                      <option selected>Selecione una opcion</option>
                        @forelse ($productos as $pr)
                        <option value="{{$pr->id}}">{{$pr->name}}</option>
                        @empty
                        <option >No hay categorias</option>
                        @endforelse
                    </select>
                    <label for="productSelect">Categoria</label>
                  </div>
                  @error('product')
                  <div class="alert alert-danger rounded rounded-3 my-2">
                      {{ $message }}
                  </div>
                  @enderror

                  @if(session('title'))
                  <div class="alert alert-danger rounded rounded-3 my-2">
                    <p class="fw-bold">{{session('title')}}</p>
                    <p>{{session('Body')}}</p>
                </div>
                  @endif
            </div>
            <div class="col-6">

                  <div class="">
                    <button type="submit" class="btn btn-primary w-75">Crear</button>
                  </div>
                 
            </div>
        </div>
        </form>
    </div>


</body>

</html>
