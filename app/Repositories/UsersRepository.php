<?php
namespace App\Repositories;

use App\Models\User;

class UsersRepository
{
    public static function owner()
    {
        $user = User::where(['email' => config('app.owner_email')])->first();

        return $user;
    }

    public static function update(array $conditions, $date)
    {
        $user = User::where($conditions)->update($date);

        return $user;
    }
}
?>
