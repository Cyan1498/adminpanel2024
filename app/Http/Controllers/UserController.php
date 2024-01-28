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

        $rules = [
            'name' => 'required|string|max:255|min:3',
            'lastname' => 'nullable|string|max:255',
            'age' => 'nullable|numeric',
            // 'email' => 'required|string|email|max:255|unique:customers',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:9',
            'country' => 'nullable|string|max:255',
        ];
    
        $messages = [
            'name.required' => 'Ingresa el nombre',
            'name.min' => 'El nombre del cliente debe tener al menos 3 caracteres',
            'name.max' => 'El nombre no debe superar los 255 caracteres',
            'lastname.string' => 'El apellido debe ser una cadena de texto',
            'lastname.max' => 'El apellido no debe superar los 255 caracteres',
            'age.numeric' => 'La edad debe ser un número',
            'email.required' => 'Ingresa el correo',
            'email.email' => 'Ingresa un correo válido',
            'email.max' => 'El correo electrónico no debe superar los 255 caracteres',
            // 'email.unique' => 'El email ya existe en el sistema',
            'phone.string' => 'El teléfono debe ser una cadena de texto',
            'phone.max' => 'El teléfono no debe superar los 9 caracteres',
            'country.string' => 'El país debe ser una cadena de texto',
            'country.max' => 'El país no debe superar los 255 caracteres',
        ];
        $existingUser = $this->firestore
            ->collection('Customers')
            ->where('email', '=', $request->input('email'))
            ->documents();

        if (!$existingUser->isEmpty()) {
            // El email ya existe, puedes manejar la respuesta de validación aquí
            // return response()->json(['error' => 'El email ya está en uso.'], 422);
            return redirect()->back()->withErrors(['email' => 'El email ya está en uso.']);
        }


        $request->validate($rules, $messages);
        // Agregar un nuevo documento a la colección "Customers"
        $this->firestore->collection('Customers')->add($request->except(['_token']));

        // notify()->success('Registro éxitoso ⚡️');
        // notify()->preset('notify-custom', ['title' => 'Registro realizado con éxito']);
        // drakify('success');
        // notify()->success('Welcome to Laravel Notify ⚡️');
        toastr()->success('Usuario registrado con Exito', 'Registro exitoso');
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
