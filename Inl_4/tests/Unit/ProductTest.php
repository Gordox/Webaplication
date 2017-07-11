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
      'image' => 'http://www.three.co.uk/static/images/device_pages/MobileVersion/Apple/iPhone_5s/Space_Grey/desktop/1.jpg',
      'description' => 'Apples iPhone 5S är uppgraderingen av iPhone 5. 5S har samma mått och skärmtyp som föregångaren, men telefonen har nu en fingeravtrycksläsare samt ny kamera med tvåfärgsblixt',
      'price' => 2999
    ]);
  }

/*
  public function testAddProduct()
  {
    $this->visit('/products/create')
    ->type('Marcus', 'title')
    ->type('Le Phone', 'brand')
    ->type(1337, 'price')
    ->type('http://imgur.com/gallery/B9GGS', 'image')
    ->type('A phone of exceptional splendor', 'description')
    ->check('Siba')
    ->press('Save Product')
    ->seePageIs('/products');
  }
  */
}
