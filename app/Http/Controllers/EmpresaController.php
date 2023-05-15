<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Empresa;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Livewire;

class EmpresaController extends Controller
{
    public function index(Request $request)
    {
        $empresa = new Empresa();
        $usuario = Usuario::all();

        if ($request->ajax()) {
            $data = Empresa::join('usuarios', 'empresas.usuario_id', '=', 'usuarios.id')
                ->select(['empresas.nome', 'usuario_id', 'empresas.id'])->get();
            return datatables()->of($data)->addIndexColumn()
                ->make(true);
        }

        return view('empresas', compact('usuario', 'empresa'));
    }

    public function store(Request $request)
    {
        $formData = array(
            'nome' => 'required',
            'usuario_id' => 'required',
        );
        $error = Validator::make($request->all(), $formData);

        if ($error->fails()) {
            session()->flash('message', 'Erro ao criar empresa.');
        } else {
            $empresa = new Empresa();
            $empresa->fill($error->valid());
            $empresa->save();
            session()->flash('message', 'empresa adicionada.');
            return redirect()->action([EmpresaController::class, 'index']);
        }
    }

    public function delete()
    {
        $empresa = Empresa::find($_POST['id']);

        $empresa->delete();
        return redirect()->action([EmpresaController::class, 'index']);
    }

    public function edit()
    {
        $id = $_GET['id'];
        $empresa = Empresa::where('id', '=', $id)->first();
        return $empresa;
    }

    public function update(Request $request, $id)
    {
        $formData = array(
            'nome' => 'required',
            'usuario_id' => 'required',
        );
        $error = Validator::make($request->all(), $formData);

        if ($error->fails()) {
            session()->flash('message', 'Erro ao atualizar empresa.');
        } else {
            $empresa = Empresa::find($id);
            $empresa->fill($error->valid());
            $empresa->save();
            session()->flash('message', 'empresa Atualizado.');
            return redirect()->action([EmpresaController::class, 'index']);
        }
    }
}
