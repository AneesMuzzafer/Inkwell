<?php

namespace App\Commands;

use App\Services\DatabaseMigration;
use Core\Console\Command;
use Core\Console\Commander;

class Migration extends Command
{
    protected $key = "migrate";
    protected $description = "Custom migration handler.";

    public function __construct(private Commander $commander, public DatabaseMigration $migration)
    {
        parent::__construct();
    }

    public function handle()
    {
        console_log("Running migrations...");

        $args = $this->commander->getArgs();

        if (!isset($args[1])) {
            $this->run();
            return;
        }

        switch ($args[1]) {
            case "fresh":
                $this->deleteAndRun();
                break;
            case "delete":
                $this->delete();
                break;
            default:
                $this->run();
        }
    }

    public function run()
    {
        $this->migration->up();
    }

    public function delete()
    {
        $this->migration->down();
    }

    public function deleteAndRun()
    {
        $this->delete();
        $this->run();
    }
}
