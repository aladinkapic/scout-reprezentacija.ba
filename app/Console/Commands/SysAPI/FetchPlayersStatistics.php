<?php

namespace App\Console\Commands\SysAPI;

use App\Models\Additional\ApiStatistics;
use App\Traits\API\CoreTrait;
use App\Traits\API\FilesTrait;
use App\User;
use Illuminate\Console\Command;

class FetchPlayersStatistics extends Command{
    use FilesTrait, CoreTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sys-api:fetch-players-statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch players statistics from www.reprezentacija.ba API system';

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
        $users = User::where('from_api', 1)->where('player_id', '!=', null)->get();
        $client = new \GuzzleHttp\Client(['base_uri' => $this->getPlayersBaseURI(2983)]);

        foreach ($users as $user){
            try{
                $response = $client->request('GET', 'api/players', [
                    'headers' => $this->getHeaders(),
                    'query' => [
                        'id' => $user->player_id
                    ]
                ]);

                $player = json_decode($response->getBody()->getContents());

                try{
                    /* Photo Update */
                    $imgExt = substr(strrchr(isset($player->player->photo) ? $player->player->photo : '', "."), 1);
                    $imgName = $user->username . '.' . $imgExt;

                    $this->fetchAndSave($player->player->photo, public_path('images/profile-images/'), $imgName);

                    $user->update(['image' => $imgName]);
                }catch (\Exception $e){ dd($e); }

                /* User Statistics */
                foreach ($player->player->stat as $statistics){
                    $apiStat = ApiStatistics::where('user_id', $user->id)->where('season', $statistics->season_name)->first();
                    if(!$apiStat){
                        try{
                            $redCards = 0; $yellowCards = 0;
                            foreach ($statistics as $key => $val){
                                if($key == "Red card") $redCards = $val;
                                if($key == "Yellow card") $yellowCards = $val;
                            }


                            ApiStatistics::create([
                                'user_id' => $user->id,
                                'season' => $statistics->season_name,
                                'team_name' => $statistics->team_name,
                                'no_games' => $statistics->played,
                                'goals' => $statistics->Goals,
                                'assistance' => $statistics->Assist,
                                'minutes' => $statistics->career_minutes,
                                'red_cards' => $redCards,
                                'yellow_cards' => $yellowCards
                            ]);
                        }catch (\Exception $e){ dd($e); }
                    }
                }
            }catch (\Exception $e){ dump($e->getMessage()); }
        }
        return 0;
    }
}
