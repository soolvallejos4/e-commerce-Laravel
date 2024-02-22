<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Product;
use Auth;
use DB;
use Illuminate\Http\Request;
use Storage;
use Str;

class ProductsController extends Controller
{

    /*Validacion*/

    private array $validationRules = [
        'title' => 'required|min:3',
        'description' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|numeric|exists:categories'
    ];

    private array $validationMessages = [
        'title.required' => 'El campo título es requerido.',
        'title.min' => 'El título debe contener al menos :min caracteres.',
        'description.required' => 'El campo descripción es requerido.',
        'price.required' => 'El campo precio es requerido.',
        'price.numeric' => 'El campo precio debe ser un número.',
        'category_id.required' => 'El campo categoria es obligatorio.',
        'category_id.numeric' => 'El campo categoria debe ser un numero entero.',
        'category_id.exists' => 'El campo categoria provisto no existe en la base de datos.',
    ];

    public function index()
    {

        $user = Auth::user();
        $products = Product::with(['category', 'tags'])->get();

        if ($user && $user->role_id === 1) {
            return view('admin.products.index', [
                'products' => $products
            ]);
        } else {
            return view('products.index', [
                'products' => $products
            ]);
        }
    }

    public function view(int $id)
    {
        $user = Auth::user();
        $product = Product::with(['category', 'tags'])->findOrFail($id);

        if ($user && $user->role_id === 1) {
            return view('admin.products.view', [
                'product' => $product
            ]);
        } else {
            return view('products.view', [
                'product' => $product
            ]);
        }
    }

    public function formNew()
    {
        return view('admin.products.formNew', [
            'categories' => Category::all(), // Agrego la lista de categorias para poder pasarlo en el formulario como opciones.
            'tags' => Tag::orderBy('name')->get()
        ]);
    }

    public function processNew(Request $request)
    {
        $data = $request->except(['_token']);
        /*
        Validaciones.
        */
        $request->validate($this->validationRules, $this->validationMessages);

        if ($request->hasFile('cover')) {
            $data['cover'] = $this->uploadCover($request);
        }

        $product =  Product::create($data);
        $product->tags()->attach($data['tag_id'] ?? []);
        return redirect()
            ->route('admin.products')
            ->with('feedback.message', 'El producto <b> ' . e($data['title']) . '</b> ha sido creado con éxito.');
    }

    public function formEdit(int $id)
    {
        return view('admin.products.form-edit', [
            'product' => Product::findOrFail($id),
            'categories' => Category::all(),
            'tags' => Tag::orderBy('name')->get()
        ]);
    }

    public function processEdit(int $id, Request $request)
    {
        $product = Product::findOrFail($id);
        $request->validate($this->validationRules, $this->validationMessages);
        $data = $request->except(['_token']);
        $oldCover = null;

        if ($request->hasFile('cover')) {

            $data['cover'] = $this->uploadCover($request);
            $oldCover = $product->cover;
        }

        $product->update($data);
        $product->tags()->sync($data['tag_id'] ?? []);

        $this->deleteCover($oldCover);

        return redirect()
            ->route('admin.products')
            ->with('feedback.message', 'El producto <b> ' . e($product['title']) . '</b> ha sido editado con éxito.');
    }

    public function confirmDelete(int $id)
    {
        return view('admin.products.confirm-delete', [
            'product' => Product::findOrFail($id),
        ]);
    }
    public function processDelete(int $id)
    {
        $product = Product::findOrFail($id);

        try {
            DB::beginTransaction();
            $product->tags()->detach();
            $product->delete();

            //Sin error, guardamos los cambios.
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->route('admin.products.confirmDelete', ['id' => $id])
                ->with('feedback.message', 'Ocurrió un error al tratar de eliminar el producto. Intente nuevamente en unos minutos');
        }
        $this->deleteCover($product->cover);
        return redirect()
            ->route('admin.products')
            ->with('feedback.message', 'El producto <b> ' . e($product['title']) . '</b> ha sido eliminado con éxito.');
    }

    protected function uploadCover(Request $request): string
    {

        $cover = $request->file('cover');
        $coverName = date('YmdHis_') . Str::slug($request->input('title')) . "." . $cover->guessExtension();
        $cover->move(public_path('img'), $coverName);
        return $coverName;
    }

    protected function deleteCover(?string $file): void
    {

        if ($file !== null && file_exists(public_path('img/' . $file))) {
            unlink(public_path('img/' . $file));
        }
    }
   public function productStatistics()
{
    $mostPurchasedProducts = DB::table('order_details')
        ->select('order_details.product_id', 'products.title', DB::raw('SUM(order_details.quantity) as total_quantity'))
        ->join('products', 'order_details.product_id', '=', 'products.product_id')
        ->groupBy('order_details.product_id', 'products.title')
        ->orderByDesc('total_quantity')
        ->take(1) // Obtener los 10 productos más comprados
        ->get();

    $leastPurchasedProducts = DB::table('order_details')
        ->select('order_details.product_id', 'products.title', DB::raw('SUM(order_details.quantity) as total_quantity'))
        ->join('products', 'order_details.product_id', '=', 'products.product_id')
        ->groupBy('order_details.product_id', 'products.title')
        ->orderBy('total_quantity')
        ->take(1) // Obtener los 10 productos menos comprados
        ->get();

    $totalOrders = DB::table('orders')->count();

    return view('admin.product-statistics', [
        'mostPurchasedProducts' => $mostPurchasedProducts,
        'leastPurchasedProducts' => $leastPurchasedProducts,
        'totalOrders' => $totalOrders,
    ]);
}

    
}
