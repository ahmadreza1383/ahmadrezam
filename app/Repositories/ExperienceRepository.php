<?php
namespace App\Repositories;

use App\Models\Experience;

class ExperienceRepository{
    public static function allColumn(){
        return Experience::where('status', true)->get();
    }
}
?>
