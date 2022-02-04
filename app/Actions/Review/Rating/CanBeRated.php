<?php

namespace App\Actions\Review\Rating;

use Illuminate\Support\Str;
use InvalidArgumentException;
use App\Models\{User, Review};

trait CanBeRated
{
    /**
     * Rate the product.
     *
     * @param int       $rating
     * @param User|null $user
     */
    public function rate($rating, $user = null)
    {
        if ($rating > 5 || $rating < 0.5) {
            throw new InvalidArgumentException('Ratings must be between 0.5-5.');
        }

        $userId = $user ? $user->id : auth()->id();

        $this->ratings()->updateOrCreate(['user_id' => $userId], compact('rating'));
    }

    public function getVotesPluralAttribute()
    {
        return Str::plural('vote', $this->countRateds());
    }

    public function countRateds()
    {
        return $this->ratings()->count();
    }

    public function getNumberFormatRatingAttribute()
    {
        return number_format($this->rating(), 1);
    }

    public function scoreProgressRating($number)
    {
        return $this->ratings()->count() * $number / 100;
    }

    /**
     * Fetch the average rating for the product.
     *
     * @return int
     */
    public function rating()
    {
        return $this->ratings()->avg('rating');
    }

    /**
     * Fetch the rating for the given user.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function ratingFor(User $user)
    {
        return $this->ratings()->where('user_id', $user->id)->value('rating');
    }

    public function ratingForGuest()
    {
        return $this->ratings()->value('rating');
    }

    /**
     * Get all ratings for the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(Review::class);
    }
}
