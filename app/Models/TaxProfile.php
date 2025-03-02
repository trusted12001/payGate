<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'taxpayer_type', 'full_name', 'business_name', 'email', 'phone_number',
        'local_government', 'tax_category', 'business_reg_number',
        'identification_number', 'registered_address', 'assigned_agent_id', 'status'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_agent_id');
    }
}
