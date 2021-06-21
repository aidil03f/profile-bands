<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lyric extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function album()
    {
        return $this->BelongsTo(Album::class);
    }

    public function band()
    {
        return $this->BelongsTo(Band::class);
    }
}
