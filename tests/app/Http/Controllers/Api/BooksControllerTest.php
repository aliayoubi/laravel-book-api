<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class BooksControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function index_should_return_all_books()
    {
        $books = factory(App\Book::class, 10)->create();

        $this
            ->get(route('api.books.index'))
            ->seeStatusCode(200);

        foreach ($books as $book) {
            $this->seeJson(['name' => $book->name, 'author' => $book->author]);
        }
    }
}
