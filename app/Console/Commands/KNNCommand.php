<?php

namespace App\Console\Commands;

use App\Services\KNearestNeighborsSuspended;
use App\Services\SamplesGenerator;
use App\Services\VehicleDistance;
use App\Type;
use Illuminate\Console\Command;
use Phpml\Preprocessing\Normalizer;

class KNNCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'knn:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run knn';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        /** @var Type $type */
        $type = Type::find(1);

        $samplesGenerator = new SamplesGenerator();
        $samples=[];
        for ($i = 0; $i < 10; $i++) {
            $samples = array_merge($samples, $samplesGenerator->generate($type));
        }

        $names = array_fill(0, count($samples), 'type');
        // normal 1
        // high 1.4
        // low 0.6
        $importance = [1, .6, 1.4, 1, 1, 1, 1, 1];
        $userInput = [[4, 4, 4, 4, 4, 4, 4, 4]];

        $normalizer = new Normalizer(Normalizer::NORM_STD);
        $normalizer->transform($samples);
        $normalizer->transform($userInput);
        $k = new KNearestNeighborsSuspended(7, new VehicleDistance($importance));
        $k->train($samples, $names);
        $result = $k->predict($userInput[0]);
        var_dump($result);

//        $this->info(count($samples));
    }
}
