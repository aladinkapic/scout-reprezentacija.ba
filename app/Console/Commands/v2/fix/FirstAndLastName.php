<?php

namespace App\Console\Commands\v2\fix;

use App\User;
use Illuminate\Console\Command;

class FirstAndLastName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'v2:fix:first-last-name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $users = User::where('role', '=', 1)->get();

        $total = 0;
        foreach ($users as $user){
            try{
                $name = explode(' ', $user->name);
                $user->update([
                    'fname' => $name[0] ?? '-',
                    'lname' => $name[1] ?? '-'
                ]);

                $total ++;
            }catch (\Exception $e){}
        }

        dd("Total " . $total . " of " . $users->count());
        return 0;
    }
}
