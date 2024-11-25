<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_gift_type extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_gift_types';

    protected $guarded = [];

    public $timestamps = true;
}
