<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Fillable fields for a tag.
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the video associated with the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function videos()
    {
        return $this->belongsToMany('App\Video');
    }
}
