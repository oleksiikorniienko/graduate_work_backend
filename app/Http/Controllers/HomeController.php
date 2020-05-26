<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $view = view('home');

        return new Response($view);
    }
}
