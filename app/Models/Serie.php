<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    protected function serializeDate(\DateTimeInterface $date): string
    {
        return \Carbon\Carbon::instance($date)->toIso8601String();
    }
}
