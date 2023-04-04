<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['id_salle', 'nom_salle', 'id_batiment'];

    public function batiment()
    {
        return $this->belongsTo(Batiment::class, 'id_batiment');
    }

    public function portes()
    {
        return $this->belongsToMany(Porte::class)->withPivot('id_porte', 'id_salle');
    }

    public static function createSalle($nom_salle, $id_batiment)
    {
        return DB::transaction(function () use ($nom_salle, $id_batiment) {
            $salle = new Salle();
            $salle->nom_salle = $nom_salle;
            $salle->id_batiment = $id_batiment;
            $salle->save();
            return $salle;
        });
    }

    public static function findById($id_salle)
    {
        return self::findOrFail($id_salle);
    }

    public static function updateSalle($id_salle, $nom_salle, $id_batiment)
    {
        return DB::transaction(function () use ($id_salle, $nom_salle, $id_batiment) {
            $salle = self::findOrFail($id_salle);
            $salle->nom_salle = $nom_salle;
            $salle->id_batiment = $id_batiment;
            $salle->save();
            return true;
        });
    }

    public static function deleteSalle($id_salle)
    {
        return DB::transaction(function () use ($id_salle) {
            $salle = self::findOrFail($id_salle);
            $salle->delete();
            return true;
        });
    }

    public static function getAllSalles()
    {
        return self::all();
    }
}
