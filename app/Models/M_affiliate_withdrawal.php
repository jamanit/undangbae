<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use Illuminate\Support\Facades\Storage;

class M_affiliate_withdrawal extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_affiliate_withdrawals';

    protected $guarded = [];

    public $timestamps = true;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($affiliate_withdrawal) {
            // Hapus file yang terkait
            // affiliate_withdrawal 
            if ($affiliate_withdrawal) {
                if ($affiliate_withdrawal->payment_receipt && Storage::disk('public')->exists($affiliate_withdrawal->payment_receipt)) {
                    Storage::disk('public')->delete($affiliate_withdrawal->payment_receipt);
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_affiliate_id', 'id');
    }
}
