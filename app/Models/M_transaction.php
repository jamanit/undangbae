<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use Illuminate\Support\Facades\Storage;

class M_transaction extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_transactions';

    protected $guarded = [];

    public $timestamps = true;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($transaction) {
            // Hapus file yang terkait
            // transaction 
            if ($transaction) {
                if ($transaction->payment_receipt && Storage::disk('public')->exists($transaction->payment_receipt)) {
                    Storage::disk('public')->delete($transaction->payment_receipt);
                }
            }

            if ($transaction) {
                if ($transaction->refund_receipt && Storage::disk('public')->exists($transaction->refund_receipt)) {
                    Storage::disk('public')->delete($transaction->refund_receipt);
                }
            }
        });
    }

    public function transaction_status()
    {
        return $this->belongsTo(M_transaction_status::class, 'transaction_status_id', 'id');
    }

    public function template()
    {
        return $this->belongsTo(M_template::class, 'template_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function invitation()
    {
        return $this->hasOne(M_invitation::class, 'transaction_id', 'id');
    }
}
