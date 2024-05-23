<?php

namespace App\Console\Commands\SysAPI;

use App\Models\Additional\ApiStatistics;
use App\Models\Additional\Club;
use App\Models\Additional\ClubData;
use App\Models\Additional\NatTeamData;
use App\Models\Core\Country;
use App\Models\Core\Keywords\Keyword;
use App\Traits\API\CoreTrait;
use App\Traits\API\FilesTrait;
use App\User;
use Illuminate\Console\Command;

class FetchPlayersStatistics extends Command{
    use FilesTrait, CoreTrait;

    protected $_seasons = [];

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
    public function __construct(){
        parent::__construct();
    }

    protected function getSeasons(){
        for ($i=(date('Y') + 1); $i>1970; $i--){
            $this->_seasons[$i] = $i;
        }
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
        $users = User::where('from_api', 1)->where('player_id', '!=', null)->get();
        $users = User::where('id', 26)->where('player_id', '!=', null)->get();

        $client = new \GuzzleHttp\Client(['base_uri' => $this->getPlayersBaseURI(2983)]);

        $this->getSeasons();

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
                    try{
                        $redCards = 0; $yellowCards = 0;
                        foreach ($statistics as $key => $val){
                            if($key == "Red card") $redCards = $val;
                            if($key == "Yellow card") $yellowCards = $val;
                        }

                        $season = "";

                        /* Get season name */
                        foreach ($this->_seasons as $_season){
                            $year = (string)$_season;
                            if(strpos($statistics->season_name, $year) ){
                                $season = ($_season) . " / " . ($_season + 1);
                            }
                        }

                        $season = Keyword::where('keyword', 'seasons')->where('value', $season)->first();

                        $country = Country::where('name', $statistics->team_name)->first();
                        if($country){
                            $apiNat = NatTeamData::where('user_id', $user->id)->where('season_name', $statistics->season_name)->first();

                            if(!$apiNat){
                                try{
                                    NatTeamData::create([
                                        'user_id' => $user->id,
                                        'season' => $season->id,
                                        'season_name' => $statistics->season_name,
                                        'country_id' => $country->id,
                                        'no_games' => $statistics->played,
                                        'goals' => $statistics->Goals,
                                        'assistance' => $statistics->Assist,
                                        'minutes' => $statistics->career_minutes,
                                        'red_cards' => $redCards,
                                        'yellow_cards' => $yellowCards
                                    ]);
                                }catch (\Exception $e){ dump($e->getMessage()); }
                            }
                        }else{
                            $club   = Club::where('title', $statistics->team_name)->first();
                            $apiStat = ClubData::where('user_id', $user->id)->where('season_name', $statistics->season_name)->first();

                            if(!$apiStat){
                                try{
                                    ClubData::create([
                                        'user_id' => $user->id,
                                        'season' => $season->id,
                                        'season_name' => $statistics->season_name,
                                        'club_id' => $club->id ?? NULL,
                                        'no_games' => $statistics->played,
                                        'goals' => $statistics->Goals,
                                        'assistance' => $statistics->Assist,
                                        'minutes' => $statistics->career_minutes,
                                        'red_cards' => $redCards,
                                        'yellow_cards' => $yellowCards
                                    ]);
                                }catch (\Exception $e){ dump($e->getMessage()); }
                            }
                        }
                    }catch (\Exception $e){ dump($e->getMessage()); }
                }
            }catch (\Exception $e){ dump($e->getMessage()); }
        }

        return 0;
    }
}
