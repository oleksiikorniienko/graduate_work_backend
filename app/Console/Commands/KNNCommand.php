<?php

namespace App\Console\Commands;

use App\Services\SamplesGenerator;
use App\Type;
use Illuminate\Console\Command;

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

        $samples = $samplesGenerator->generate($type);
        $this->info(count($samples));
    }
}
