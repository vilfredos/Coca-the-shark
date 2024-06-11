<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COCA THE SHARK</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <header class="my-4 text-center">
            <h1>COCA THE SHARK</h1>
            <p>Productos Frescos</p>
        </header>

        <section class="search-subscribe my-4">
            <div class="search-bar">
                <form action="{{ route('home') }}" method="GET">
                    <div class="form-group d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Buscar productos">
                        <button type="submit" class="btn btn-success ml-2">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="subscribe">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group d-flex align-items-center">
                        <label for="email" class="mr-2">Suscríbete</label>
                        <input type="email" name="email" class="form-control" placeholder="Tu correo electrónico o número de celular" required>
                        <button type="submit" class="btn btn-success ml-2">
                            <i class="fas fa-user-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <section class="main-promotion my-4">
            <div class="text-center">
                <h2>“Descubre la delicia de la personalización"</h2>
                <p>¡Crea tu propio sabor! ¡Elegido por ti y para ti!</p>
                <p>Por tan solo: $5.49</p>
                <a href="{{ route('select.flavors') }}" class="btn btn-primary">Seleccionar Sabores</a>
            </div>
        </section>

        <section class="products my-4">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $product['image_url'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <p class="card-text"><strong>por tan solo:s${{ $product['price'] }}</strong></p>
                            <p class="card-text"><strong>Disponibilidad: siempre</strong></p>
                            <button class="btn btn-primary buy-now" data-toggle="modal" data-target="#qrModal">¡Compre ahora!</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <div class="my-4 text-center">
            <div class="d-inline-block mr-3">
                <p>RESERVAS O PEDIDOS AL: 74587511</p>
            </div>
            <div class="d-inline-block">
                <a href="#" id="whatsapp-link" data-toggle="modal" data-target="#qrModal">
                    <img src="{{ asset('img/what.png') }}" alt="WhatsApp Logo" width="100px">
                </a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">Escanea el siguiente QR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('img/qr.png') }}" alt="QR Code" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>