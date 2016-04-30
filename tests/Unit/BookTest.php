<?php

use App\Book;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BookTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_a_book_can_be_created()
    {

        $book = Book::create(['name' => 'The Hobbit', 'author' => 'J.R.R Tolkien']);

        $latest_book = $book->latest()->first();

        $this->assertEquals($book->id, $latest_book->id);
        $this->assertEquals('The Hobbit', $latest_book->name);
        $this->assertEquals('J.R.R Tolkien', $latest_book->author);

        $this->seeInDatabase('books', ['id' => 1, 'name' => 'The Hobbit', 'author' => 'J.R.R Tolkien']);
        $this->notSeeInDatabase('books', ['name' => 'Harry Potter']);

    }
}
