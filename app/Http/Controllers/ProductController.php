<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Datos de ejemplo para los productos
        $products = [
            [
                'id' => 1,
                'name' => 'Coca Machucada Banana',
                'description' => 'Sabor banana, con stevia.',
                'price' => 4.99,
                'is_available' => true,
                'main_promotion' => 'Compra ahora por solo $4.99',
                'image_url' => asset('img/banana.png') // Agrega esta línea
            ],
            [
                'id' => 2,
                'name' => 'Coca Machucada Chocolate',
                'description' => 'Sabor Chocolate, con stevia.',
                'price' => 4.99,
                'is_available' => false,
                'main_promotion' => 'Oferta especial 14.99',
                'image_url' => asset('img/chocolate.png') // Agrega esta línea
            ],
            [
                'id' => 3,
                'name' => 'Coca Machucada ChocoBanana',
                'description' => 'Sabor ChocoBanana, con stevia.',
                'price' => 4.99,
                'is_available' => false,
                'main_promotion' => 'Oferta especial 4.99',
                'image_url' => asset('img/chocobabano.png') // Agrega esta línea
            ],
            [
                'id' => 4,
                'name' => 'Coca Machucada limon',
                'description' => 'Sabor limon, con stevia.',
                'price' => 4.99,
                'is_available' => true,
                'main_promotion' => 'Promoción de temporada $4.99',
                'image_url' => asset('img/limon.png') // Agrega esta línea
            ]
        ];

        return view('welcome', compact('products'));
    }

    public function show($id)
    {
        // Datos de ejemplo para un producto específico
        $product = [
            'id' => $id,
            'name' => 'Coca Machucada ' . $id,
            'description' => 'Descripción del producto ' . $id . '.',
            'price' => 9.99 + ($id - 1) * 5,
            'is_available' => $id % 2 == 0 ? false : true
        ];

        return view('product', compact('product'));
    }
    // ProductController.php
    public function selectFlavors()
    {
        // Puedes agregar lógica para obtener los sabores disponibles desde una base de datos si es necesario.
        $flavors = [
            'Fresa',
            'Limón',
            'Mango',
            'Cereza',
            'Uva',
            'Piña',
            'Mora',
            'Melón',
            'Coco',
            'Manzana',
            'Naranja',
            'Banana',
            'Kiwi',
            'Papaya',
            'Maracuyá',
            'Grosella',
            'Lichi',
            'Durazno',
            'Pera',
            'Ciruela',
            'Frambuesa',
            'Arándano',
            'Mandarina',
            'Sandía',
            'Melocotón',
            'Granada',
            'Higo',
            'Almendra',
            'Avellana',
            'Caramelo',
            'Vainilla',
            'Chocolate',
            'Menta',
            'Café',
            'Té verde',
            'Canela',
            'Nuez',
            'Pistacho',
            'Tiramisú'
        ];

        return view('select-flavors', compact('flavors'));
    }
    public function orderFlavors(Request $request)
    {
        // Obtén los sabores seleccionados
        $selectedFlavors = $request->input('flavors', []);

        // Lógica para procesar la selección de sabores, por ejemplo, agregar al carrito
        // ...

        // Redirige a alguna página, por ejemplo, al carrito
        return redirect()->route('cart')->with('success', 'Sabores añadidos a la cesta!');
    }
}
