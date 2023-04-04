<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batiment extends Model
{
    use HasFactory;

    protected $fillable = ['id_batiment', 'nom_batiment'];

    public function salles()
    {
        return $this->hasMany(Salle::class)->withPivot('id_salle', 'id_batiment');
    }

    public static function createBatiment($nom_batiment)
    {
        return DB::transaction(function () use ($nom_batiment) {
            return self::create([
                'nom_batiment' => $nom_batiment,
            ]);
        });
    }

    public static function findById($id_batiment)
    {
        return self::findOrFail($id_batiment);
    }

    public static function updateBatiment($id_batiment, $nom_batiment)
    {
        return DB::transaction(function () use ($id_batiment, $nom_batiment) {
            $batiment = self::findOrFail($id_batiment);
            $batiment->nom_batiment = $nom_batiment;
            $batiment->save();
            return true;
        });
    }

    public static function deleteBatiment($id_batiment)
    {
        return DB::transaction(function () use ($id_batiment) {
            $batiment = self::findOrFail($id_batiment);
            $batiment->delete();
            return true;
        });
    }

    public static function getAllBatiments()
    {
        return self::all();
    }
}
