<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
  public function testDatabase()
  {
    $this->assertDatabaseHas('products', [
      'id' => 1,
      'title' => 'iPhone 5s',
      'brand' => 'Apple',
      'image' => 'Random',
      'description' => 'Random',
      'price' => 2999
    ]);
  }
}
