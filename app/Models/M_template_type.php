<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_template_type extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_template_types';

    protected $guarded = [];

    public $timestamps = true;

    public function templates()
    {
        return $this->hasMany(M_template::class, 'template_type', 'id');
    }
}
