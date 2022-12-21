<?php

namespace App\Console\Commands;

use App\Mail\AdvertiserReminder;
use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertiser:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command for reminder the advertisers who have an ad will start tomorrow';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ads = $this->getTomorrowReminder();
        foreach($ads as $ad){
            Mail::to($ad->advertiser->email)->send(new AdvertiserReminder($ad));
        }

        return 'reminders sent successfully';
    }

    protected function getTomorrowReminder(){
        return Ad::where('start_date', Carbon::tomorrow()->format('Y-m-d'))->with('advertiser')->get();
    }
}
