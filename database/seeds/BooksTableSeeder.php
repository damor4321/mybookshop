<?php

use App\Model\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Book::truncate();
        
        $faker = \Faker\Factory::create();
        
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            $quantity= $faker->randomDigit;
            Book::create([
                'title' => $faker->sentence,
                'author' => $faker->firstName . " " . $faker->lastName,
                'editor' => $faker->company,
                'price' => $faker->randomFloat(2,5,50),
                'quantity' => $quantity,
                'available' => $quantity != 0
            ]);
        }
    }
}
