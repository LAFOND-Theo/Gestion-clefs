<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
}

class Utilisateur extends Personne
{
    use HasFactory;

    protected $table = 'utilisateur';
}

class Possesseur_de_clef extends Personne
{
    use HasFactory;

    protected $table = 'possesseur_de_clef';
}