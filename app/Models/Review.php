<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

/**
 * Dit model stelt een review voor in de database.
 */
class Review extends Model
{
    // Deze velden mogen in één keer gevuld worden (mass assignment)
    protected $fillable = [
        'user_id', // De ID van de gebruiker die de review plaatst
        'name',    // De naam die de gebruiker opgeeft
        'rating',  // De score (aantal sterren)
        'message', // Het eigenlijke bericht van de review
    ];

    /**
     * Een review hoort bij één specifieke gebruiker.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
