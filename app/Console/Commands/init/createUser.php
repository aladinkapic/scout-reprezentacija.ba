<?php

namespace App\Console\Commands\init;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:root';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to create root user wit initial credentials';

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
        try{
            User::create([
                'name' => 'Root Admin',
                'email' => 'root',
                'password' => Hash::make('password'),
                'email_verified_at' => time(),
                'api_token' => hash('sha256', 'root'. '+'. time())
            ]);
        }catch (\Exception $e){ return $e->getMessage(); }

        return 1;
    }
}
