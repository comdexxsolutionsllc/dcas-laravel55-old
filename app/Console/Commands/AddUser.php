<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class AddUser extends Command
{
    protected $signature = 'user:add {email}';
    protected $description = 'Creates a new user';

    public function handle()
    {
        $email = $this->argument('email');
        if ($this->confirm('Let system generate password for you?')) {
            $password = str_random(16);
            $this->info("Your password: $password");
        } else {
            $password = $this->secret('Please enter your new password');
        }
        $password = bcrypt($password);
        User::create(compact('email', 'password'));
    }
}