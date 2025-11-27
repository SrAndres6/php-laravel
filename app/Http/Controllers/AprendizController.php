<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAprendizRequest;
use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AprendizController extends Controller
{
    public function index(Request $request)
    {
        // Búsqueda
        $q = $request->query('q');

        // Campo a ordenar
        $sort = $request->query('sort', 'nombre');

        // Dirección del orden
        $direction = $request->query('direction', 'asc');

        // Consulta
        $aprendices = Aprendiz::query()
            ->when($q, function ($query) use ($q) {
                $query->where('nombre', 'like', "%{$q}%")
                    ->orWhere('documento', 'like', "%{$q}%");
            })
            ->orderBy($sort, $direction)
            ->paginate(10)
            ->withQueryString();

        return view('aprendices.index', compact('aprendices', 'q', 'sort', 'direction'));
    }

    public function create()
    {
        $aprendiz = new Aprendiz();
        return view('aprendices.create', compact('aprendiz'));
    }

    public function store(StoreUpdateAprendizRequest $request)
    {
        Aprendiz::create($request->validated());
        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz creado');
    }

    public function edit($id)
    {
        $aprendiz = Aprendiz::findOrFail($id);
        return view('aprendices.edit', compact('aprendiz'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'documento' => [
                'required',
                Rule::unique('aprendices')->ignore($id),
            ],
            'nombre'    => 'required|string|max:255',
            // otras reglas aquí...
        ]);

        $aprendiz = Aprendiz::findOrFail($id);
        $aprendiz->update($request->all());

        return redirect()->route('aprendices.index')->with('ok', 'Aprendiz actualizado correctamente');
    }

    public function destroy($id)
    {
        $aprendiz = Aprendiz::findOrFail($id);
        $aprendiz->delete();

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz eliminado');
    }
}
