<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coca Machucada</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="my-4">
            <h1 class="text-center">Coca Machucada</h1>
            <p class="text-center">Mejor precio online garantizado</p>
        </header>

        <section class="search-bar my-4">
            <form action="{{ route('home') }}" method="GET">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar productos">
                </div>
            </form>
        </section>

        <section class="main-promotion my-4">
            <div class="jumbotron text-center">
                <h2>Promoción principal</h2>
                <p>Compra ahora por solo $9.99</p>
            </div>
        </section>

        <section class="products my-4">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text"><strong>${{ $product->price }}</strong></p>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="subscribe my-4">
            <form action="{{ route('subscribe') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Suscríbete a nuestro boletín</label>
                    <input type="email" name="email" class="form-control" placeholder="Tu correo electrónico" required>
                </div>
                <button type="submit" class="btn btn-success">Suscribirse</button>
            </form>
        </section>

        <footer class="my-4 text-center">
            <p>Teléfono: 123-456-7890</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>