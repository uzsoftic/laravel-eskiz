<?php

namespace Uzsoftic\LaravelEskiz\Commands;

use Illuminate\Console\Command;

class LaravelEskizCommand extends Command
{
    protected $signature = 'laravel-eskiz:generate';

    protected $description = 'Eskiz SMS Generate Token';

    public function handle(): bool
    {
        try {
            $this->success('Command is working');
        }catch (\Exception $e){
            $this->danger('Error: '.$e->getMessage());
        }

        return true;
    }

}
