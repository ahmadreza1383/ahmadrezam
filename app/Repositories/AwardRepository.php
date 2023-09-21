<?php
namespace App\Repositories;

use App\Models\Award;
class AwardRepository{
    public static function allColumn(){
        return Award::all();
    }
}
?>
