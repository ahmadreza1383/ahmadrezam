<?php

namespace App\Console\Commands;

use App\Mail\NewPassword as MailNewPassword;
use App\Models\Article;
use App\Repositories\UsersRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class NewPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:new-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genearate new password for owner';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = UsersRepository::owner();

        $password = Str::password(12);
        $passwordHash = Hash::make($password);

        if(isset($user->password)){
            $user->password = $passwordHash;
            $save = $user->save();

            if($save == true){
                Mail::to( config('app.owner_email'))->send(new MailNewPassword($password));
            }
        }
    }
}
