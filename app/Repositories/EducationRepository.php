<?php
namespace App\Repositories;

use App\Models\Education;

class EducationRepository{
    public static function allColumn(){
        return Education::where('status', true)->get();
    }
}
?>
