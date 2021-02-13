<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Serie extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];
    protected $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/series/' . $this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios',
        ];
    }

    protected function serializeDate(\DateTimeInterface $date): string
    {
        return \Carbon\Carbon::instance($date)->toIso8601String();
    }
}
