<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    // Các thuộc tính có thể được gán giá trị một cách an toàn
    protected $fillable = [
        'user_id',
        'consignee_name',
        'phone_number',
        'specific',
        'street',
        'wards_id',
        'districts_id',
        'provinces_id',
        'is_default',
    ];

    /**
     * Quan hệ với model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Quan hệ với model Ward.
     */
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'wards_id');
    }

    /**
     * Quan hệ với model District.
     */
    public function district()
    {
        return $this->belongsTo(District::class, 'districts_id');
    }

    /**
     * Quan hệ với model Province.
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }
}
