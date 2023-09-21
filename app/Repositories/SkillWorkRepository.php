<?php
namespace App\Repositories;

use App\Models\SkillWork;

class SkillWorkRepository{
    public static function allColumn(){
        return SkillWork::all();
    }
}
?>
