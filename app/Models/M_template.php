<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use Illuminate\Support\Facades\Storage;

class M_template extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_templates';

    protected $guarded = [];

    public $timestamps = true;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $templates = is_array($model) ? $model : [$model];

            foreach ($templates as $template) {
                if ($template->image && Storage::disk('public')->exists($template->image)) {
                    Storage::disk('public')->delete($template->image);
                }
            }
        });
    }

    public function template_type()
    {
        return $this->belongsTo(M_template_type::class, 'template_type_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(M_transaction::class, 'template_id', 'id');
    }
}
