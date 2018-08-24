<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'ISMAEL E. LASTRE ALVAREZ',
            'email' => 'ismaelfac@gmail.com',
            'password' => bcrypt('BrwQ12-123'),
            'is_admin' => '1'
        ]);
        User::create([
            'name' => 'ELIANA ROBLES',
            'email' => 'directora@inversionesyproyectos.com',
            'password' => bcrypt('Inversiones'),
        ]);
        User::create([
            'name' => 'VALERIA VASQUEZ CUESTA',
            'email' => 'vvasquez02@gmail.com',
            'password' => bcrypt('BrwQ12-123'),
        ]);
    }
}
