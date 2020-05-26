<?php

namespace App\Http\Controllers;

use App\Dto\TypeDeterminateDto;
use App\Services\TypeDeterminateService;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeController extends Controller
{
    /** @var TypeDeterminateService */
    private $typeDeterminateService;

    public function __construct(TypeDeterminateService $typeDeterminateService)
    {
        $this->typeDeterminateService = $typeDeterminateService;
    }

    public function show(Type $type): Response
    {
        $view = view('type', [
            'type' => Type::find($type->id)
        ]);

        return new Response($view);
    }

    public function determine(Request $request)
    {
        $dto = (new TypeDeterminateDto())
            ->setQuestions($request->input('questions'))
            ->setMaxPriority($request->input('max-priority'))
            ->setMinPriority($request->input('min-priority'));

        $typeId = $this->typeDeterminateService->determinate($dto);

        return redirect('/types/' . $typeId);
    }
}
