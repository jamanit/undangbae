<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use Illuminate\Support\Facades\Storage;

class M_gallery extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_galleries';

    protected $guarded = [];

    public $timestamps = true;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $galleries = is_array($model) ? $model : [$model];

            foreach ($galleries as $gallery) {
                if ($gallery->photo && Storage::disk('public')->exists($gallery->photo)) {
                    Storage::disk('public')->delete($gallery->photo);
                }
            }
        });
    }

    public function invitation()
    {
        return $this->belongsTo(M_invitation::class, 'invitation_id', 'id');
    }
}
