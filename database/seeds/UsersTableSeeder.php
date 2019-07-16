<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		User::create([
			'name'=> 'Raissa Arruda',
			'email'=> 'raissa@email.com',
			'password'=> bcrypt(123456)
		             ]);
		User::create([
			             'name'     => 'Angela Filadelfo',
			             'email'    => 'angela@email.com',
			             'password' => bcrypt(123456)
		             ]);

	}
}
