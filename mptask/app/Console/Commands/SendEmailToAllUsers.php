<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendEmail; // Assuming you have a Mailable class named SendEmail

class SendEmailToAllUsers extends Command
{
    protected $signature = 'email:send-all';
    protected $description = 'Send email to all users';

    public function handle()
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            \Mail::to($user->email)->send(new SendEmail());
        }

        $this->info('Email sent to all users successfully!');
    }
}
?>