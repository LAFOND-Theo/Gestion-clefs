<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variure extends Model
{
    protected $fillable = ['id_variure', 'libelle_variure'];

    //Relation 1,n
    public function barillets()
    {
        return $this->belongsToMany(Barillet::class)
    }

    public static function createVariure($libelle_variure)
    {
        return DB::transaction(function () use ($libelle_variure) {
            return self::create([
                'libelle_variure' => $libelle_variure,
            ]);
        });
    }

    public static function findById($id_variure)
    {
        return self::findOrFail($id_variure);
    }

    public static function updateVariure($id_variure, $libelle_variure)
    {
        return DB::transaction(function () use ($id_variure, $libelle_variure) {
            $variure = self::findOrFail($id_variure);
            $variure->libelle_variure = $libelle_variure;
            $variure->save();
            return true;
        });
    }

    public static function deleteVariure($id_variure)
    {
        return DB::transaction(function () use ($id_variure) {
            $variure = self::findOrFail($id_variure);
            $variure->delete();
            return true;
        });
    }

    public static function getAllVariures()
    {
        return self::all();
    }
}

