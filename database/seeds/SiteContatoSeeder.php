<?php

use Illuminate\Database\Seeder;
use App\SiteContato;
use Faker\Factory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        SiteContato::create([
           'name'=>'Sabrina Rodrigues Fernandes',
           'telefone'=>'55984448888',
           'email'=>'sabrinarfernandes@gmail.com',
           'motivo_contato'=> 1,
           'mensagem'=>'Olá! Estou entrando em contato para solicitar'
        ]);
        */
        factory(SiteContato::class,100)->create();
    }
}
