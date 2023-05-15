<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categorias::all();

        if ($request->ajax()) {
            $data = Categorias::select('nome','id')->get();
            return datatables()->of($data)->addIndexColumn()
                ->make(true);
        }

        return view('categorias', compact('categorias'));
    }

    public function store(Request $request)
    {
        $formData = array(
            'nome' => 'required',
        );
        $error = Validator::make($request->all(), $formData);
        
        if ($error->fails()) {
            session()->flash('message', 'Erro ao criar categoria.');
        } else {
            $categoria = new Categorias();
            $categoria->fill($error->valid());
            $categoria->save();
            session()->flash('message', 'categoria adicionada.');
            return redirect()->action([CategoriaController::class, 'index']);
        }
    }

    public function delete()
    {
        // dd('here');
        $categoria = Categorias::find($_POST['id']);

        $categoria->delete();
        return redirect()->action([CategoriaController::class, 'index']);
    }

    public function edit()
    {
        $id = $_GET['id'];
        $categoria = Categorias::where('id', '=', $id)->first();
        return $categoria;
    }

    public function update(Request $request, $id)
    {
        $formData = array(
            'nome' => 'required',
        );
        $error = Validator::make($request->all(), $formData);
        
        if ($error->fails()) {
            session()->flash('message', 'Erro ao atualizar categoria.');
        } else {
            $categoria = Categorias::find($id);
            $categoria->fill($error->valid());
            $categoria->save();
            session()->flash('message', 'categoria Atualizado.');
            return redirect()->action([CategoriaController::class, 'index']);
        }
    }
}
