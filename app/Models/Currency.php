<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'iso_code',
        'iso_numeric_code',
        'common_name',
        'official_name',
        'symbol'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('iso_code', 'like', '%' . request('search') . '%')
            ->orWhere('iso_numeric_code', 'like', '%' . request('search') . '%')
            ->orWhere('common_name', 'like', '%' . request('search') . '%')
            ->orWhere('official_name', 'like', '%' . request('search') . '%')
            ->orWhere('symbol', 'like', '%' . request('search') . '%');
        }
    }
}
