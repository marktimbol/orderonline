<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Cuisine;

class CuisineTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{			
		$cuisines = [
			'Ainu',
			'Akan',
			'Arab',
			'Assyrian',
			'Berber',
			'Buddhist',
			'Chinese',
			'Indian',
			'Inuit',
			'Italian-American',
			'Jewish',
			'Kurdish',
			'Maharashtrian',
			'Mordovian',
			'Native American',
			'Pakistani',
			'Parsi',
			'Pennsylvania Dutch',
			'Peranakan',
			'Sami',
			'Tatar'
		];
		
		foreach( $cuisines as $cuisine ) {

			Cuisine::create([
				'cuisine' => $cuisine
				]);
			
		}

	}

}
