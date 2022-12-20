<?php

namespace Database\Factories;

use App\Models\Ad;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    protected array $arr=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->getRandomType(),
            'title' => Str::random(10),
            'description' => Str::random(20),
            'category_id' => $this->getRandomId(),
            'advertiser_id' => $this->getRandomId(),
            'start_date' => $this->getDate()
        ];
    }

    protected function getRandomId(): int
    {
        shuffle($this->arr);
        return $this->arr[0];
    }

    protected function getRandomType(): string
    {
        $random = rand(0,1);
        return $random ? 'free' : 'paid';
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
