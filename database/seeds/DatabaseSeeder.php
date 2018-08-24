<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->truncateTables([
            'categories',
            'comments'
            'properties',
            'clients',
            'users',
            'posts',
            'countries',
            'departaments',
            'municipalities',
            'locations',
            'neighborhoods',
            'type_properties',
            'identifications',
            'civilstatuses'
        ]);
        $this->call(UserTableSeeder::class);
        $this->call(CivilstatusTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(DepartamentTableSeeder::class);
        $this->call(MunicipalityTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(NeighborhoodTableSeeder::class);
        $this->call(IdentificationTableSeeder::class);
        $this->call(TypePropertyTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        //$this->call(PropertiesTableSeeder::class);
    }
     protected function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        foreach($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
    }
}
