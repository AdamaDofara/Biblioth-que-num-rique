<?php

namespace App\Models;
use App\Models\User;
use App\Models\Ouvrage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Emprunt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ouvrage that owns the Emprunt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ouvrage()
    {
        return $this->belongsTo(Ouvrage::class);
    }
}
