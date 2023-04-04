<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porte extends Model
{
    protected $fillable = ['id_porte', 'id_barillet'];

    public function salles()
    {
        return $this->hasMany(Salle::class)->withPivot('id_porte', 'id_salle');
    }

    public function barillet()
    {
        return $this->belongsTo(Barillet::class,'id_barillet');
    }

    public static function createPorte($id_porte, $id_barillet)
    {
        return DB::transaction(function () use ($id_porte, $id_barillet) {
            $barillet = Barillet::findOrFail($id_barillet);
            return self::create([
                'id_porte' => $id_porte,
                'barillet_id' => $barillet->id,
            ]);
        });
    }

    public static function findPorteById($id_porte)
    {
        return self::findOrFail($id_porte);
    }

    public static function updatePorte($id_porte, $id_barillet)
    {
        return DB::transaction(function () use ($id_porte, $id_barillet) {
            $porte = self::findOrFail($id_porte);
            $barillet = Barillet::findOrFail($id_barillet);
            $porte->barillet()->associate($barillet);
            $porte->save();
            return true;
        });
    }

    public static function deletePorte($id_porte)
    {
        return DB::transaction(function () use ($id_porte) {
            $porte = self::findOrFail($id_porte);
            $porte->delete();
            return true;
        });
    }

    public static function getAllPortes()
    {
        return self::all();
    }
}