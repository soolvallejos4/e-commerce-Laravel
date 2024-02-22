<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function index()
    {

        $users = User::with(['products', 'orders' => function ($query) {
            $query->orderBy('order_date', 'desc'); // Ordenar por fecha de pedido descendente
        }])->get();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }
    public function buyProduct(int $id)
    {
        $user = Auth::user(); // Obtener el usuario autenticado

        // Verificar si el usuario existe y el producto también
        if ($user && $product = Product::find($id)) {
            $user->products()->attach($product); // Asociar el producto al usuario

            // Realizar cualquier otra acción que necesites después de la compra

            return redirect()
                ->route('products.index')
                ->with('feedback.message', 'El producto se compró con éxito.');
        }
    }
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile.show', [
            'user' => $user,
        ]);
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit', [
            'user' => $user,
        ]);

    }


    public static function validationMessages(): array
    {
        return [
            'email.required' => 'Por favor, ingrese su email',
            'password.required' => 'Por favor, ingrese su contraseña.',
            'current_password.required' => 'Por favor, ingrese su contraseña actual.',
            'current_password.current_password' => 'Clave actual incorrecta.',
            'new_password.confirmed' => 'La confirmación de la nueva clave no coincide.',
            'new_password.required_with' => 'El campo :attribute es obligatorio cuando se proporciona una nueva contraseña.',
        ];
    }
    public function updateProfile(Request $request)

    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'current_password' => 'nullable|required_with:new_password|current_password',
            'new_password' => 'nullable|confirmed',
        ], static::validationMessages());

        if ($validator->fails()) {
            return redirect()
                ->route('profile.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'email' => $request->input('email'),
        ];

        // actualizo contraseña solo si se puso una nueva contraseña
        if ($request->filled('new_password')) {
            $data['password'] = Hash::make($request->input('new_password'));
        }

        $user->update($data);

        return redirect()
            ->route('profile.show')
            ->with('feedback.message', 'Perfil actualizado con éxito.');
    }
}
