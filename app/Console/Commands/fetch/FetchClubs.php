<?php

namespace App\Console\Commands\fetch;

use App\Models\Additional\Club;
use App\Models\Core\Country;
use App\Traits\API\CoreTrait;
use App\Traits\API\FilesTrait;
use Illuminate\Console\Command;
use PHPUnit\Framework\Constraint\Count;

class FetchClubs extends Command{
    use FilesTrait, CoreTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:clubs {args*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all teams by league or country. Command is executed as php artisan fetch:clubs country bosnia';

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
        $what  = $this->argument()['args'][0];
        $value = $this->argument()['args'][1];
        $client = new \GuzzleHttp\Client(['base_uri' => $this->getBaseURI()]);

        $totalInserted = 0;

        if($what == 'country'){
            $response = $client->request('GET', 'teams', [
                'headers' => $this->getApiSportHeaders(),
                'query' => [
                    'country' => $value
                ]
            ]);

            $teams = json_decode($response->getBody()->getContents());

            foreach ($teams->response as $team){
                try{
                    $club = Club::where('api_id', $team->team->id)->first();

                    if(!$club){
                        $clubFlag = $team->team->code . "-" . $team->team->id . ".png";
                        $country  = Country::where('name', $team->team->country)->first();

                        /* First, fetch an image of team */
                        $this->fetchAndSave($team->team->logo, public_path('images/club-images/'), $clubFlag);

                        try{
                            if(!$team->team->national){
                                Club::create([
                                    'api_id' => $team->team->id,
                                    'title' => $team->team->name,
                                    'image' => $clubFlag,
                                    'country' => $country->id,
                                    'city' => $team->venue->city ?? '',
                                    'year' => ($team->team->founded) ? $team->team->founded : 1900,
                                    'category' => 3
                                ]);
                            }else {
                                // dump("Club: ");
                                // dump($team->team);
                            }

                        }catch (\Exception $e){
                            dump("Error while inserting club: " . $team->team->name, $e->getMessage());
                        }

                        $totalInserted ++;
                    }
                }catch (\Exception $e){ dump("Error: " . $e->getMessage()); }
            }

        }else if($what == 'league'){

        }

        dd("Total clubs inserted: " . $totalInserted);

        return "Total clubs inserted: " . $totalInserted;
    }
}
