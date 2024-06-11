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
                            <button type="submit" class="btn btn-primary mt-3" id="submit-btn">Añadir a la cesta</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/mezcla.jpg') }}" alt="Científico" class="img-fluid">
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
        });
    </script>
</body>

</html>