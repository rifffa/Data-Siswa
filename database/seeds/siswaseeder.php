<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $positions = [
            'Sistem Informasi',
            'Akuntansi',
            'Manajemen',
            'Arsitektur'
        ];

        for ($i = 0; $i < 50; $i++) {
            DB::table('siswas')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'kelas' => $faker->randomElement($positions),
            ]);
        }
    }
}
