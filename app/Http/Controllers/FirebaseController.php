<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;

class FirebaseController extends Controller
{
    public function index()
    {
        $firebase = (new Factory)
            ->withServiceAccount('C:\Users\tonga\Google Drive (gaston.herrerabaron@gmail.com)\Importaciones Genshin\builds-e1f2e-firebase-adminsdk-o7bw3-9808c7731f.json')
            ->withDatabaseUri('https://builds-e1f2e-default-rtdb.firebaseio.com');
 
        $database = $firebase->createDatabase();
 
        /* $blog = $database
        ->getReference('blog');
 
        echo '<pre>';
        print_r($blog->getvalue());
        echo '</pre>'; */
    }
}
