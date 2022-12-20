<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'category_id',
        'advertiser_id',
        'start_date'
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d'
    ];

    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function advertiser() :BelongsTo
    {
        return $this->belongsTo(Advertiser::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
