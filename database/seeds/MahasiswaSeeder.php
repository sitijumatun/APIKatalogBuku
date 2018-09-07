<?php

use Illuminate\Database\Seeder;
use App\Buku;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //membuat data dummy
        $faker = \Faker\Factory::create();

        $jumlah_buku = 24;
        for($i=1;$i<=$jumlah_buku;$i++){
        	$bukus = new Buku;
       		$bukus->sampul =$faker->image($dir='public/foto',$width=640, $height=480,'people');
        	$bukus->nama = $faker->realText($maxNbChars = 25, $indexSize = 2);
        	$bukus->pengarang =$faker->name;
            $bukus->tahun_terbit =$faker->year;
            $bukus->isbn =$faker->isbn13;
        	$bukus->save();
        }
       

    }
}
