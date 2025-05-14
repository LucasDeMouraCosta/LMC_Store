<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestEmail extends Command
{
    protected $signature = 'email:test {email}';
    protected $description = 'Envia um e-mail de teste para o endereço especificado';

    public function handle()
    {
        $email = $this->argument('email');

        Mail::raw('Este é um e-mail de teste.', function ($message) use ($email) {
            $message->to($email)
                    ->subject('Teste de E-mail');
        });

        $this->info("E-mail de teste enviado para {$email}");
    }
}