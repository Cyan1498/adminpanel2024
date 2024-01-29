<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Firebase\Factory;


class UserController extends Controller
{
    private $firestore;

    public function __construct()
    {
        // Configurar la conexión a Firestore en el constructor
        $this->firestore = app('firebase.firestore')->database();
    }

    public function firebaseAuth()
    {
        $firebase = (new Factory)
            ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')));

        return $firebase->createAuth();
    }


    public function index()
    {
        // Obtener documentos de la colección "Customers"
        $usersRef = $this->firestore->collection('users');
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
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:9',
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
            'password.required' => 'Ingresa la contraseña',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
            'phone.string' => 'El teléfono debe ser una cadena de texto',
            'phone.max' => 'El teléfono no debe superar los 9 caracteres',
            'country.string' => 'El país debe ser una cadena de texto',
            'country.max' => 'El país no debe superar los 255 caracteres',
        ];

        $existingUser = $this->firestore
            ->collection('users')
            ->where('email', '=', $request->input('email'))
            ->documents();

        if (!$existingUser->isEmpty()) {
            // El email ya existe, puedes manejar la respuesta de validación aquí
            // return response()->json(['error' => 'El email ya está en uso.'], 422);
            return redirect()->back()->withErrors(['email' => 'El email ya está en uso.']);
        }


        $request->validate($rules, $messages);
        // Agregar un nuevo documento a la colección "Customers"
        // $this->firestore->collection('users')->add($request->except(['_token']));

        // / Crear usuario en la autenticación
        $auth = $this->firebaseAuth();
        $userProperties = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            // Agrega más propiedades según tus necesidades
        ];

        try {
            $userRecord = $auth->createUser($userProperties);
            $uid = $userRecord->uid;

            // Crear el usuario en la colección de Firestore
            $this->firestore->collection('users')->document($uid)->set([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'age' => $request->input('age'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'country' => $request->input('country'),
                'uid' => $uid
                // Agrega más datos según tus necesidades
            ]);

            toastr()->success('Usuario registrado con éxito', 'Registro exitoso');
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['password' => 'Error al crear el usuario: ' . $e->getMessage()]);
        }

        // toastr()->success('Usuario registrado con Exito', 'Registro exitoso');
        // return redirect()->route('users.index');
    }

    public function edit($id)
    {
        // dd($id);
        // Obtener un documento específico de la colección "Customers"
        $userRef = $this->firestore->collection('users')->document($id);
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
        $this->firestore->collection('users')->document($id)->set($request->except(['_token', '_method']));

        return redirect()->route('users.index');
    }





    // public function destroy($id)
    // {
    //     // Eliminar un documento específico de la colección "Customers"
    //     $this->firestore->collection('users')->document($id)->delete();

    //     return back();
    // }

    public function destroy($id)
    {
        // Obtener el documento y su contenido antes de eliminarlo
        $userRef = $this->firestore->collection('users')->document($id);
        $userSnapshot = $userRef->snapshot();

        // Verificar si el usuario existe en Firestore
        if ($userSnapshot->exists()) {
            // Obtener el UID del usuario desde Firestore
            $uid = $userSnapshot->get('uid');

            // Verificar si se encontró el UID del usuario
            if ($uid) {
                try {
                    // Eliminar el usuario de la autenticación de Firebase
                    $this->firebaseAuth()->deleteUser($uid);

                    // Eliminar el documento de la colección en Firestore
                    $userRef->delete();

                    // return back()->with('success', 'Usuario eliminado correctamente.');
                    toastr()->success('Usuario Eliminado con éxito', 'Eliminacion exitosa');
                    return back();
                } catch (\Exception $e) {
                    return back()->with('error', 'Error al eliminar el usuario: ' . $e->getMessage());
                }
            }
        }

        return back()->with('error', 'Usuario no encontrado en Firestore.');
    }
}
