<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_discount extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_discounts';

    protected $guarded = [];

    public $timestamps = true;
}
