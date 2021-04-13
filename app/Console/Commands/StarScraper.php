<?php

namespace App\Console\Commands;

use App\Star;
use App\StarFortune;
use Illuminate\Console\Command;
use Goutte\Client as GuttoeClient;
use Illuminate\Support\Facades\Config;

class StarScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:starScraper';

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
        $this->guttoeClient = new GuttoeClient();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $starUrl = "https://astro.click108.com.tw/";
        $starList = Star::all();
        foreach ($starList as $oneStar) {
            $urlParam = "?iAcDay=" . date('Y-m-d') . "&iAstro=" . ($oneStar->id - 1);
            $crawler = $this->guttoeClient->request('GET', $starUrl . "daily_" . ($oneStar->id - 1) . ".php" . $urlParam);
            $fortuneTypeList = Config::get('StarScraper.fortune');
            foreach ($fortuneTypeList as $typeOfFortune) {
                $starFortune = new StarFortune;
                $starFortune->star_id = $oneStar->id;
                $starFortune->date = date('Y-m-d');
                $starFortune->type = $typeOfFortune['type'];
                $starFortune->rate = substr_count($crawler->filter(".TODAY_CONTENT")->filter("." . $typeOfFortune['keywords'])->text(), "★");
                $starFortune->description = $crawler->filter(".TODAY_CONTENT")->filter("." . $typeOfFortune['keywords'])->parents('p')->nextAll()->text();
                $starFortune->save();
            }
        }
    }
}
