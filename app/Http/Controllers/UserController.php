<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;

class UserController extends Controller
{
    private $firestore;

    public function __construct()
    {
        // Configurar la conexión a Firestore en el constructor
        $this->firestore = app('firebase.firestore')->database();
    }

    public function index()
    {
        // Obtener documentos de la colección "Customers"
        $usersRef = $this->firestore->collection('Customers');
        $documents = $usersRef->documents();

        $users = [];
        foreach ($documents as $document) {
            $user = $document->data();
            $user['id'] = $document->id();  // Agregar el ID del documento al array
            $users[] = $user;
        }
        // dd($users);

        return view('modules.user.index')->with([
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('modules.user.create')->with([
            'id' => null
        ]);
    }

    public function store(Request $request)
    {
        // Agregar un nuevo documento a la colección "Customers"
        $this->firestore->collection('Customers')->add($request->except(['_token']));

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        // dd($id);
        // Obtener un documento específico de la colección "Customers"
        $userRef = $this->firestore->collection('Customers')->document($id);
        $user = $userRef->snapshot()->data();
        $user['id'] = $id;  // Agregar el ID del documento al array
        // dd($user);

        return view('modules.user.create')->with([
            'user' => $user,
            'id' => $id
        ]);
    }

    public function update($id, Request $request)
    {
        // Actualizar un documento específico en la colección "Customers"
        $this->firestore->collection('Customers')->document($id)->set($request->except(['_token', '_method']));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        // Eliminar un documento específico de la colección "Customers"
        $this->firestore->collection('Customers')->document($id)->delete();

        return back();
    }
}
