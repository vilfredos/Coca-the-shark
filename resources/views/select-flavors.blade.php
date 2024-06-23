<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Sabores</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="flavors-header my-4 text-center">
            <h1>Seleccionar tus Sabores</h1>
            <p>Elige los sabores para tu Coca Machucada (hasta un máximo de 7 sabores)</p>
        </header>

        <div class="row">
            <div class="col-md-8">
                <div class="flavors-container">
                    <form action="{{ route('order.flavors') }}" method="POST" id="flavors-form">
                        @csrf
                        <div class="form-row">
                            @foreach($flavors as $index => $flavor)
                            @if($index % 10 == 0 && $index != 0)
                        </div>
                        <div class="form-row">
                            @endif
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="flavors[]" value="{{ $flavor }}" id="flavor-{{ $flavor }}">
                                    <label class="form-check-label" for="flavor-{{ $flavor }}">
                                        {{ $flavor }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-primary mt-3" id="submit-btn" data-toggle="modal" data-target="#qrModal">Añadir a la cesta</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/mezcla.jpg') }}" alt="Científico" class="img-fluid">
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
    <script>
        // Script to limit the number of checkboxes selected
        document.addEventListener('DOMContentLoaded', function() {
            const maxFlavors = 7;
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const submitBtn = document.getElementById('submit-btn');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    let checkedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;
                    if (checkedCount > maxFlavors) {
                        this.checked = false;
                        alert('Puedes seleccionar hasta un máximo de ' + maxFlavors + ' sabores.');
                    }
                });
            });

            // Abrir el modal cuando se haga clic en el botón "Añadir a la cesta"
            submitBtn.addEventListener('click', function(e) {
                e.preventDefault(); // Evitar que el formulario se envíe
                $('#qrModal').modal('show'); // Mostrar el modal
            });
        });
    </script>
</body>

</html>