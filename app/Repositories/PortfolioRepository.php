<?php
namespace App\Repositories;

use App\Models\Award;
use App\Models\Portfolio;

class PortfolioRepository{
    public static function allColumn(){
        return Portfolio::where('status', true)->get();
    }
}
?>
