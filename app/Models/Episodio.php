<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episodio extends Model
{
    use SoftDeletes;
    protected $fillable = ['temporada', 'numero', 'assistido'];
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    protected function serializeDate(\DateTimeInterface $date): string
    {
        return \Carbon\Carbon::instance($date)->toIso8601String();
    }
}