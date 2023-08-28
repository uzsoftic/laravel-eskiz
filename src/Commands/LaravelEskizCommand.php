<?php

namespace Uzsoftic\LaravelEskiz\Commands;

use Illuminate\Console\Command;

class LaravelEskizCommand extends Command
{
    protected $signature = 'laravel-eskiz:generate';

    protected $description = 'Eskiz SMS Generate Token';

    public function handle(): int
    {
        $this->success('Command is working');
        return self::SUCCESS;
    }

}
