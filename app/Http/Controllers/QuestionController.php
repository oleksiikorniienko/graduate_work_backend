<?php

namespace App\Http\Controllers;

use App\Property;
use App\Question;
use Illuminate\Contracts\View\View;

class QuestionController extends Controller
{
    public function index(): View
    {
        return view('questions', [
            'questions' => Question::all()->sortBy('property_id'),
            'properties' => Property::all()
        ]);
    }
}
