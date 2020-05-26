<?php

namespace App\Services;

use App\Dto\TypeDeterminateDto;
use App\Property;
use App\Type;
use Illuminate\Support\Arr;
use Phpml\Preprocessing\Normalizer;

class TypeDeterminateService
{
    /** @var SamplesGenerator */
    private $samplesGenerator;

    public function __construct(SamplesGenerator $samplesGenerator)
    {
        $this->samplesGenerator = $samplesGenerator;
    }

    public function determinate(TypeDeterminateDto $dto)
    {
        // init importance
        $importance = [];
        $properties = Property::all()->sortBy('id');
        foreach ($properties as $type) {
            switch ((int) $type->id) {
                case $dto->getMaxPriority():
                    $importance[] = 1.4;
                    break;
                case $dto->getMinPriority():
                    $importance[] = .6;
                    break;
                default:
                    $importance[] = 1;
            }
        }

        $types = Type::all()->sortBy('id');
        $samples = [];
        $names = [];
        foreach ($types as $type) {
            // init samples
            $newSamples = $this->samplesGenerator->generate($type);
            $samples = array_merge($samples, $newSamples);

            // init names
            $newNames = array_fill(0, count($newSamples), $type->id);
            $names = array_merge($names, $newNames);
        }

        $userInput = $dto->getQuestions();
        ksort($userInput);
        $wrapUserInput = [
            array_map(function ($item) {
                return (int) $item;
            }, array_values($userInput))
        ];

        $normalizer = new Normalizer(Normalizer::NORM_STD);
        $normalizer->transform($samples);
        $normalizer->transform($wrapUserInput);

        $knn = new KNearestNeighborsSuspended(7, new VehicleDistance($importance));
        $knn->train($samples, $names);

        return $knn->predict(Arr::first($wrapUserInput));
    }
}
