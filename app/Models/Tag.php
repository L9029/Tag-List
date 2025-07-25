<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Obtiene el slug para la etiqueta.
     *
     * @return string
     */
    public function getSlugAttribute(): string
    {
        return strtolower(str_replace(' ', '-', $this->name));
    }
}
