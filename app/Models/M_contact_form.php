<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_contact_form extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_contact_forms';

    protected $guarded = [];

    public $timestamps = true;
}
