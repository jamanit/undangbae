<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_payment_method extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_payment_methods';

    protected $guarded = [];

    public $timestamps = true;
}
