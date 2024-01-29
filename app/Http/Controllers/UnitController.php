<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;

class UnitController extends Controller
{
    private $firestore;

    public function __construct()
    {
        $this->firestore = app('firebase.firestore')->database();
    }

    public function index()
    {
        $unitsRef = $this->firestore->collection('units');
        $documents = $unitsRef->documents();

        $units = [];
        foreach ($documents as $document) {
            $unit = $document->data();
            $unit['id'] = $document->id();
            $units[] = $unit;
        }

        return view('modules.unit.index')->with([
            'units' => $units,
        ]);
    }

    public function create()
    {
        return view('modules.unit.create')->with([
            'id' => null
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3',
            'abbreviation' => 'nullable|string|max:5',
            // 'equivalence' => 'nullable|numeric',
        ];

        $messages = [
            'name.required' => 'Ingresa el nombre de la unidad',
            'name.min' => 'El nombre de la unidad debe tener al menos 3 caracteres',
            // 'equivalence.numeric' => 'La equivalencia debe ser un número',
        ];

        $request->validate($rules, $messages);

        

        $this->firestore->collection('units')->add($request->except(['_token']));

        return redirect()->route('units.index')->with('success', 'Unidad de medicamento creada correctamente.');
    }

    public function edit($id)
    {
        $unitRef = $this->firestore->collection('units')->document($id);
        $unit = $unitRef->snapshot()->data();
        $unit['id'] = $id;

        return view('modules.unit.create')->with([
            'unit' => $unit,
            'id' => $id,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:10',
            'equivalence' => 'required|numeric',
        ]);

        $this->firestore->collection('units')->document($id)->set($request->except(['_token', '_method']));

        return redirect()->route('units.index')->with('success', 'Unidad de medicamento actualizada correctamente.');
    }

    public function destroy($id)
    {
        $this->firestore->collection('units')->document($id)->delete();

        return redirect()->route('units.index')->with('success', 'Unidad de medicamento eliminada correctamente.');
    }
}
