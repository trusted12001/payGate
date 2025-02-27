<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tax_category',
        'lga',
        'additional_info',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
