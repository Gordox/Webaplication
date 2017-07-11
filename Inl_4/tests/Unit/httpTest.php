<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class httpTest extends TestCase
{
    public function testHome()
    {
      $response = $this->get('/');
      $response->assertStatus(200);
    }

    public function testProducts()
    {
      $response = $this->get('/products');
      $response->assertStatus(200);
    }

    public function testCreate()
    {
      $response = $this->get('/products/create');
      $response->assertStatus(302);
    }

    public function testEdit()
    {
      $response = $this->get('/products/edit/1');
      $response->assertStatus(302);
    }
}
 ?>
