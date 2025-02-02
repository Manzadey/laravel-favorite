<?php

namespace Manzadey\LaravelFavorite\Test\Unit;

use Manzadey\LaravelFavorite\Contracts\FavoriteabilityContract;
use Manzadey\LaravelFavorite\Contracts\FavoriteableContract;
use Manzadey\LaravelFavorite\Test\TestCase;

class FavoriteModelTest extends TestCase
{
    public function testRelationships() : void
    {
        /* @var FavoriteabilityContract $user */
        $user = $this->users->get(0);

        $user->addFavorite($this->articles->get(0));
        $this->assertCount(1, $user->favorites);

        $favorite = $user->favorites->first();
        $this->assertInstanceOf(FavoriteabilityContract::class, $favorite->user);
        $this->assertInstanceOf(FavoriteableContract::class, $favorite->favoriteable);
    }
}
