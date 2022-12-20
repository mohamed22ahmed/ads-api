<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert([
            'type' => $this->getRandomType(),
            'title' => Str::random(80),
            'description' => Str::random(20),
            'category_id' => rand(1, 20),
            'advertiser_id' => rand(1, 20),
            'start_date' => $this->getDate()
        ]);
    }

    protected function getRandomType(): string
    {
        $random = rand(0,1);
        return $random ? 'free' : 'paid';
    }
    protected function getIdsRandomly(): string
    {
        return (string)rand(1,20);
    }

    protected function getDate(): string
    {
        $min = strtotime(today());
        $max = strtotime(Carbon::now()->addYears(2));

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d', $val);
    }
}
