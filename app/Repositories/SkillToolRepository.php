<?php
namespace App\Repositories;

use App\Models\SkillTool;

class SkillToolRepository{
    public static function allColumn(){
        return SkillTool::all();
    }
}
?>
