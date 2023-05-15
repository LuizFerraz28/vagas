<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Usuario::all();

        if ($request->ajax()) {
            $data = Usuario::select('nome','id')->get();
            return datatables()->of($data)->addIndexColumn()
                ->make(true);
        }

        return view('usuarios', compact('usuario'));
    }

    public function store(Request $request)
    {
        $formData = array(
            'nome' => 'required',
        );
        $error = FacadesValidator::make($request->all(), $formData);

        if ($error->fails()) {
            session()->flash('message', 'Erro ao criar user.');
        } else {
            $user = new Usuario();
            $user->fill($error->valid());
            $user->save();
            session()->flash('message', 'user adicionado.');
            return redirect()->action([UsuarioController::class, 'index']);
        }
    }

    public function delete()
    {
        $usuario = Usuario::find($_POST['id']);

        $usuario->delete();
        return redirect()->action([UsuarioController::class, 'index']);
    }

    public function edit()
    {
        $id = $_GET['id'];
        $usuario = Usuario::where('id', '=', $id)->first();
        return $usuario;
    }

    public function update(Request $request, $id)
    {
        $formData = array(
            'nome' => 'required',
        );
        $error = FacadesValidator::make($request->all(), $formData);
        
        if ($error->fails()) {
            session()->flash('message', 'Erro ao atualizar usuario.');
        } else {
            $usuario = Usuario::find($id);
            $usuario->fill($error->valid());
            $usuario->save();
            session()->flash('message', 'Usuario Atualizado.');
            return redirect()->action([UsuarioController::class, 'index']);
        }
    }
}
