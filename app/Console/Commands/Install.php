<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install {password=admin} {name=admin} {email=admin@local}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'visitorqr: Use composer compile-project to compile the system assets. Use this command to perform other actions (DB migration, creating admin user etc).';

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
     * @return int
     */
    public function handle()
    {
        Artisan::call('key:generate'); // Generate key
        $this->info('Key generated!');

        Artisan::call('migrate'); // Migrate the database
        $this->info('Database migrated!');

        User::upsert([
            ['name' => 'admin', 'email' => $this->argument('email'), 'password' => Hash::make($this->argument('password'))],
        ], ['email'], ['name', 'password']);
        $this->info('A user with the admin user was successfully created or updated!');

        Artisan::call('storage:link'); // Create symbolic links
        $this->info('Symbolic links created!');

        $this->info('System was successfully installed!');
    }
}
