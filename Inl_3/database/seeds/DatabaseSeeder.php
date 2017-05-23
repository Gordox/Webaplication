<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(products::class);
      $this->call(stores::class);
      $this->call(reviews::class);
      $this->call(product_store::class);
    }
}
