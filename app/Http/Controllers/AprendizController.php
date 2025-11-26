<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAprendizRequest;
use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    public function index(Request $request)
    {
        $q          = $request->query('q');
        $aprendices = Aprendiz::query()
            ->when($q, function ($query) use ($q) {
                $query->where('nombre', 'like', "%{$q}%")
                    ->orWhere('documento', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('aprendices.index', compact('aprendices', 'q'));
    }

    public function create()
    {
        $aprendiz = new Aprendiz();
        return view('aprendices.create', compact('aprendiz'));
    }

    public function store(StoreUpdateAprendizRequest $request)
    {
        Aprendiz::create($request->validated());
        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz creado');
    }

    public function edit($id)
    {
        $aprendiz = Aprendiz::findOrFail($id);
        return view('aprendices.edit', compact('aprendiz'));
    }

    public function update(Request $request, $id)
    {
        $aprendiz = Aprendiz::findOrFail($id);
        $aprendiz->update($request->all());
        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz actualizado correctamente');
    }

    public function destroy($id)
    {
        $aprendiz = Aprendiz::findOrFail($id);
        $aprendiz->delete();
        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz eliminado');
    }
}
