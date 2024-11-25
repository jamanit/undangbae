<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_service extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_services';

    protected $guarded = [];

    public $timestamps = true;
}
