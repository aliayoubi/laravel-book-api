<?php

use App\Review;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReviewTest extends TestCase
{
    use DatabaseMigrations;

    public function test_a_review_can_be_created()
    {
        $user = factory(App\User::class)->create();
        $book = factory(App\Book::class)->create();

        $review = $user->reviews()->create([
            'title' => 'This book is so awesome!',
            'description' => 'My only regret is not having read it before. Just read it!',
            'note' => 10,
            'book_id' => $book->id,
        ]);

        $latest_review = Review::latest()->first();

        $this->assertEquals('This book is so awesome!', $latest_review->title);
        $this->assertEquals('My only regret is not having read it before. Just read it!', $review->description);
        $this->assertEquals(10, $review->note);

        $this->seeInDatabase('reviews', ['id' => 1, 'title' => 'This book is so awesome!']);
    }
}
