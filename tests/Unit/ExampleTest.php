<?php

namespace Tests\Unit;

use App\Service\Book;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testRandomBook()
    {
        $book = Book::getRandomBook($randId);
        $this->assertInstanceOf(\App\Models\Book::class,$book, 'id ='.$randId);

    }
}
