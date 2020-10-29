<?php

namespace App;

use App\Ahex\Fake\Domain\Fakeuser;
use Illuminate\Database\Eloquent\Model;
use App\Ahex\Zkeleton\Domain\SearchInterface as Search;

class Destinatario extends Model implements Search
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = array(
        'nombre',
        'direccion',
        'codigo_postal',
        'ciudad',
        'estado',
        'pais',
        'referencias',
        'telefono',
        'created_by',
        'updated_by',
    );

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function getLocalidadAttribute()
    {
        $localidad = array();

        foreach(['ciudad','estado','pais',] as $attr)
        {
            if( isset($this->$attr) )
                array_push($localidad, $this->$attr);
        }

        return implode(', ', $localidad);
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'like', "%{$value}%")
                    ->orWhere('direccion', 'like', "%{$value}%")
                    ->orWhere('codigo_postal', 'like', "%{$value}%")
                    ->orWhere('ciudad', 'like', "%{$value}%")
                    ->orWhere('telefono', 'like', "%{$value}%")
                    ->orderBy('id', 'desc')
                    ->get();
    }

    public static function prepare($validated)
    {
        $prepared = [
            'nombre' => capitalize($validated['nombre']),
            'direccion' => $validated['direccion'],
            'codigo_postal' => $validated['codigo_postal'],
            'ciudad' => capitalize($validated['ciudad']),
            'estado' => capitalize($validated['estado']),
            'pais' => capitalize($validated['pais']),
            'referencias' => $validated['referencias'] ?? null,
            'telefono' => $validated['telefono'],
            'updated_by' => Fakeuser::live(),
        ];

        if( request()->isMethod('post') )
            $prepared['created_by'] = Fakeuser::live();

        return $prepared;
    }
}
