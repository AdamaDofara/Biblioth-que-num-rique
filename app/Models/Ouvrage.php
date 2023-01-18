<?php

namespace App\Models;
use App\Models\Categorie;
use App\Models\Specialite;
use App\Models\Emprunt;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titre',
        'description',
        'categorie_id',
        'photo',
        'livre_pdf',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the emprunts for the Ouvrage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }

}
