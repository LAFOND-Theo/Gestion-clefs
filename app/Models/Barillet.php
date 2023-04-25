<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barillet extends Model
{
    use HasFactory;

    protected $fillable = ['id_barillet', 'code_clef', 'stock_clef', 'id_variure'];

    //Relation 1,1
    public function variure()
    {
        return $this->belongsTo(Variure::class, 'id_variure');
    }

    //Relation 1,n avec une table pivot se trouvant entre la table Barillet et la table Exemplaire
    public function exemplaires()
    {
        return $this->belongsToMany(Exemplaire::class)->withPivot('id_barillet', 'id_exemplaire');
    }

    //Relation 1,n avec une table pivot se trouvant entre la table Barillet et la table Personne
    public function personnes()
    {
        return $this->belongsToMany(Personne::class)->withPivot('id_barillet', 'id_personne');
    }

    public static function createBarillet($code_clef, $stock_clef, $id_variure)
    {
        return DB::transaction(function () use ($code_clef, $stock_clef) {
            $barillet = new barillet();
            $barillet->code_clef = $code_clef;
            $barillet->stock_clef = $stock_clef;
            $barillet->id_variure = $id_variure;
            $barillet->save();
            return $barillet;
        });
    }

    public static function findById($id_barillet)
    {
        return self::findOrFail($id_barillet);
    }

    public static function updateBarillet($id_barillet, $code_clef, $stock_clef, $id_variure)
    {
        return DB::transaction(function () use ($id_barillet, $code_clef, $stock_clef, $id_variure) {
            $barillet = self::findOrFail($id_barillet);
            $barillet->code_clef = $code_clef;
            $barillet->stock_clef = $stock_clef;
            $barillet->id_variure = $id_variure;
            $barillet->save();
            return true;
        });
    }

    public static function deleteBarillet($id_barillet)
    {
        return DB::transaction(function () use ($id_barillet) {
            $barillet = self::findOrFail($id_barillet);
            $barillet->delete();
            return true;
        });
    }

    public static function getAllBarillets()
    {
        return self::all();
    }
}