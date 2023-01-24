<?php
namespace App\Console\Commands\Tenants;
use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TenantSeedCommand extends Command {
    protected $signature = 'tenant:seed {class}';
    protected $description = 'Tenant database seeding';
    protected $seeder_path = 'database\seeders\tenants';
    protected $seeding_action = 'db:seed';
    protected $database_conn = 'tenant';

    public function handle() {
        $this->info('Seeding tenant database...');
        $class = $this->argument('class');
        $this->info('Seeding tenant: ' . $class . ' IN - ' . $this->seeder_path);
        $tenants = Tenant::whereDomainType('tenant')->get();
        $tenants->each(function($tenant) use ($class) {
            TenantService::setTenantConnection($tenant);
            $this->info('Seeding tenant: ' . $tenant->domain . ' - ' . $tenant->name . ' - database name : ' . $tenant->database_name);
            $this->info('...........');
            Artisan::call($this->seeding_action, [
                '--class' => 'Database\Seeders\Tenants\\' . $class . 'TableSeeder',
                '--database' => $this->database_conn,
            ]);
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}