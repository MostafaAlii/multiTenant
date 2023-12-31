<?php

namespace App\Console\Commands\System;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SystemMigrateCommand extends Command {
    protected $signature = 'system:migrate';
    protected $description = 'Migrate default system database';
    protected $migration_path = 'database/migrations/system';
    protected $migrate_action = 'migrate';
    protected $database_conn = 'system';
    protected $migration_options;

    public function handle() {
        $this->info('Migrating system database...');
        if($this->migration_options == null) {
                Artisan::call($this->migrate_action,[
                    '--path' => $this->migration_path,
                    '--database' => $this->database_conn
                ]);
                $this->info(Artisan::output());
            } else {
                Artisan::call($this->migrate_action . ':' . $this->migration_options, [
                    '--path' => $this->migration_path,
                    '--database' => $this->database_conn,
                ]);
                $this->info(Artisan::output() . ' successfully ' . $this->migration_options);
            } 
        return Command::SUCCESS;
    }
}