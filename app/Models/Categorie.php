<?php

namespace App\Models;
use App\Models\Ouvrage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'categorie_id',
        'photo',
        'livre_pdf',
    ];
    /**
     * Get all of the ouvrages for the Categorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ouvrages()
    {
        return $this->hasMany(Ouvrage::class);
    }
}
