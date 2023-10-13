<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Streak;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'color',
        'status',
        'type',
        'description',
    ];

    // public function scopePopular(Builder $query): void
    // {
        // $query->where('votes', '>', 100);
    // }

    public function streaks()
    {
        return $this->hasMany(Streak::class);
    }
}
