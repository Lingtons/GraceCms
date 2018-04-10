<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('categories')->insert([
            'name' => 'Events',
                        
        ]); 
		
		DB::table('categories')->insert([
            'name' => 'Lessons',
                       
        ]); 
		
		 DB::table('categories')->insert([
            'name' => 'Series',
            			

        ]); 
    }
}
