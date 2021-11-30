<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateSecUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:secretaria-user {name} {email} {password} {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria usuário do tipo secretaria';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');
        $username = $this->argument('username');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'username' => $username,
            'role' => 'secretaria'
        ]);

        $this->info('Usuário cadastro com sucesso!');
    }
}
