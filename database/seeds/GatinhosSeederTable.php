<?php

use Illuminate\Database\Seeder;
use App\Gatinho;


class GatinhosSeederTable extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		for ($i = 1; $i <=20; $i++) {
			Gatinho::create([
				                'nome'  => 'Thiago ' . $i,
				                'lindo' => TRUE
			                ]);


		}



	}
}

