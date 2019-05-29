BooksTableSeeder.php<?php

use App\Model\Address;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Address::truncate();
        
        $faker = \Faker\Factory::create();
        
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 4; $i++) {
            
            $main = $i == 0 ? 1 : 0;
            Address::create([
                'user_id' => 1,
                'address' => $faker->address,
                'code' => $faker->postcode,
                'city' => $faker->city,
                'phone' => $faker->phoneNumber,
                'main' => $main
            ]);
        }
    }
}