<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'usuario_id',
    ];

    public $timestamps = true;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categorias::class);
    }
}
