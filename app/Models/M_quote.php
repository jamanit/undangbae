<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use Illuminate\Support\Facades\Storage;

class M_quote extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_quotes';

    protected $guarded = [];

    public $timestamps = true;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $quotes = is_array($model) ? $model : [$model];

            foreach ($quotes as $quote) {
                if ($quote->image && Storage::disk('public')->exists($quote->image)) {
                    Storage::disk('public')->delete($quote->image);
                }
            }
        });
    }

    public function invitation()
    {
        return $this->belongsTo(M_invitation::class, 'invitation_id', 'id');
    }
}
