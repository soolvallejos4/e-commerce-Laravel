<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use Auth;
use Carbon\Carbon; //Carbon es una popular biblioteca de PHP que facilita la manipulación y formateo de fechas y horas. 
use Illuminate\Http\Request;
use Storage;
use Str;

class NewsController extends Controller
{

    private array $validationRules = [
        'title' => 'required|min:3',
        'subtitle' => 'required',
        'body' => 'required',
        'news_date' => 'required'
    ];
    private array $validationMessages = [
        'title.required' => 'El campo título es requerido.',
        'title.min' => 'El título debe contener al menos :min caracteres.',
        'subtitle.required' => 'El campo subtítulo es requerido.',
        'body.required' => 'Es necesario tener un cuerpo de noticia para mostrar.',
        'news_date.required' => 'Es necesaria una fecha de publicacion',
    ];

    public function index()
    {

        $news = News::all();
        $user = Auth::user();

        if ($user && $user->role_id === 1) {
            return view('admin.news.index', [
                'news' => $news
            ]);
        } else {
            return view('news.index', [
                'news' => $news
            ]);
        }
    }

    public function view(int $id)
    {
        $news = News::findOrFail($id);
        $user = Auth::user();

        if ($user && $user->role_id === 1) {
            return view('admin.news.view', [
                'news' => $news
            ]);
        } else {
            return view('news.view', [
                'news' => $news
            ]);
        }
    }


    public function formNew()
    {
        return view('admin.news.formNew');
    }
    public function processNew(Request $request)
    {
        $data = $request->except(['_token']);

        // Asignar el email del usuario automaticmanete para la noticia.
        $data['author'] = auth()->user()->email;

        // Fecha automatica actual
        $data['news_date'] = Carbon::now();

        /*
        Validaciones.
        */

        $request->validate($this->validationRules, $this->validationMessages);

        /*Carga de imagenes*/

        if ($request->hasFile('cover')) {
            $data['cover'] = $this->uploadCover($request);
        }

        News::create($data);

        return redirect()
            ->route('admin.news')
            ->with('feedback.message', 'La noticia <b>' . e($data['title']) . '</b> ha sido creada con éxito');
    }

    public function formEdit(int $id)
    {
        return view('admin.news.form-edit', [
            'news' => News::findOrFail($id),
        ]);
    }

    public function processEdit(int $id, Request $request)
    {
        $news = News::findOrFail($id);
        $request->validate($this->validationRules, $this->validationMessages);
        $data = $request->except(['_token']);
        $oldCover = null;

        if ($request->hasFile('cover')) {

            $data['cover'] = $this->uploadCover($request);
            $oldCover = $news->cover;
        }

        $news->update($data);

        $this->deleteCover($oldCover);

        return redirect()
            ->route('admin.news')
            ->with('feedback.message', 'La noticia <b>' . e($data['title']) . '</b> ha sido editada con éxito');
    }

    public function confirmDelete(int $id)
    {
        return view('admin.news.confirm-delete', [
            'news' => News::findOrFail($id),
        ]);
    }

    public function processDelete(int $id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        $this->deleteCover($news->cover);



        return redirect()
            ->route('admin.news')
            ->with('feedback.message', 'La noticia <b> ' . e($news['title']) . '</b> ha sido eliminada con éxito.');
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
}
