<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'continent_code',
        'currency_code',
        'iso2_code',
        'iso3_code',
        'iso_numeric_code',
        'fips_code',
        'calling_code',
        'common_name',
        'official_name',
        'endonym',
        'demonym'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('continent_code', 'like', '%' . request('search') . '%')
            ->orWhere('currency_code', 'like', '%' . request('search') . '%')
            ->orWhere('iso2_code', 'like', '%' . request('search') . '%')
            ->orWhere('iso3_code', 'like', '%' . request('search') . '%')
            ->orWhere('iso_numeric_code', 'like', '%' . request('search') . '%')
            ->orWhere('fips_code', 'like', '%' . request('search') . '%')
            ->orWhere('calling_code', 'like', '%' . request('search') . '%')
            ->orWhere('common_name', 'like', '%' . request('search') . '%')
            ->orWhere('official_name', 'like', '%' . request('search') . '%')
            ->orWhere('endonym', 'like', '%' . request('search') . '%')
            ->orWhere('demonym', 'like', '%' . request('search') . '%');
        }
    }
}