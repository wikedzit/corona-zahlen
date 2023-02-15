<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CovidDeath extends Model
{
    use HasFactory;

    protected $fillable = [
            'deaths',
            'date'
        ];

    protected $casts = [
            'deaths' => 'integer',
            'date' => 'date'
        ];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getDateAttribute() {
        return Carbon::parse($this->attributes['date'])->format('Y-m-d');
    }
}
