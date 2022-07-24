<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefleshDatabase;
class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testBooks()
    {
        $response = $this->get('/books');
        $response->assertSee('Books');
    }
}
