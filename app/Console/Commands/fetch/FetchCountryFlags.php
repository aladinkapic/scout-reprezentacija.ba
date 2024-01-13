<?php

namespace App\Console\Commands\fetch;

use App\Models\Core\Country;
use App\Traits\API\CoreTrait;
use App\Traits\API\FilesTrait;
use Illuminate\Console\Command;

class FetchCountryFlags extends Command
{
    use FilesTrait, CoreTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:country-flags';

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
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $countries = Country::get();

        foreach ($countries as $country){
            $flag = $country->code . '.svg';

            $this->fetchAndSave($country->flag, public_path('images/country-flags/'), $flag);
            $country->update([
                'flag' => $flag
            ]);
        }
        return 0;
    }
}
