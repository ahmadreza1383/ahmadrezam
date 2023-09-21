<?php
namespace App\Repositories;

use App\Models\SocialNetwork;

class SocialNetworkRepository{
    public static function allColumn(){
        return SocialNetwork::all();
    }
}
?>
