<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Google\Cloud\Firestore\FirestoreClient;

class HomeController extends Controller
{
    private $firestore;

    public function __construct()
    {
        // Configurar la conexión a Firestore en el constructor
        $this->firestore = app('firebase.firestore')->database();
    }

    public function index()
    {
        // Obtener la cantidad de usuarios
        $usersCount = $this->firestore->collection('users')->documents()->size();

        // Obtener la cantidad de unidades (ajusta el nombre de la colección según sea necesario)
        $unitsCount = $this->firestore->collection('units')->documents()->size();
        $excerCount = $this->firestore->collection('excercises')->documents()->size();

        // Pasar los datos a la vista
        return View::make('modules.home')->with([
            'usersCount' => $usersCount,
            'unitsCount' => $unitsCount,
            'excerCount' => $excerCount,
        ]);
    }
}

