<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AdvertiserReminder;
use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function send(){
        $ads = $this->getTomorrowReminder();
        foreach($ads as $ad){
            Mail::to($ad->advertiser->email)->send(new AdvertiserReminder($ad));
        }
    }

    protected function getTomorrowReminder(){
        return Ad::where('start_date', Carbon::tomorrow()->format('Y-m-d'))->with('advertiser')->get();
    }
}
