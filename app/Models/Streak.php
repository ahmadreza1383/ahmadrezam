<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streak extends Model
{
    use HasFactory;

    const STARTYEAR = "2023";
    const STARTDATE = "2023/01/01";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project',
        'status',
        'type',
        'description',
        'date',
    ];
}
