<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Fornecedor::create([
            'nome'=> 'Fornecedor 01',
            'site'=> 'fornecedor01.com.br',
            'uf'=> 'RS',
            'email'=> 'forneceor01@gmail.com'
        ]);
    }
}
