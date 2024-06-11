<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="my-4 text-center">
            <h1>{{ $product['name'] }}</h1>
        </header>

        <section class="product-detail my-4">
            <div class="row">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/300" class="img-fluid" alt="{{ $product['name'] }}">
                </div>
                <div class="col-md-6">
                    <p>{{ $product['description'] }}</p>
                    <p><strong>Precio: ${{ $product['price'] }}</strong></p>
                    <p><strong>Disponibilidad: </strong>{{ $product['is_available'] ? 'Disponible' : 'No disponible' }}</p>
                    <button class="btn btn-success">Comprar ahora</button>
                </div>
            </div>
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