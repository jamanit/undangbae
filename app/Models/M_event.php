<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_event extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_events';

    protected $guarded = [];

    public $timestamps = true;

    public function invitation()
    {
        return $this->belongsTo(M_invitation::class, 'invitation_id', 'id');
    }
}
