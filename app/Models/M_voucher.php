<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_voucher extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_vouchers';

    protected $guarded = [];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_affiliate_id', 'id');
    }
}
