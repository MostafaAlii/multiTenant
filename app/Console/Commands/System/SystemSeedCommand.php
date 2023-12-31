<?php
namespace App\Console\Commands\System;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SystemSeedCommand extends Command {
    protected $signature = 'system:seed {class}';
    protected $description = 'System database seeding';
    protected $seeder_path = 'database\seeders\system';
    protected $seeding_action = 'db:seed';
    protected $database_conn = 'system';
    
    public function handle() {
        $this->info('Seeding system database...');
        $class = $this->argument('class');
        $this->info('Seeding system: ' . $class . ' IN - ' . $this->seeder_path);
        $this->info('...........');
        Artisan::call($this->seeding_action, [
            '--class' => 'Database\Seeders\System\\' . $class . 'TableSeeder',
            '--database' => $this->database_conn,
        ]);
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}