<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_invitation_status extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_invitation_status';

    protected $guarded = [];

    public $timestamps = true;

    public function invitations()
    {
        return $this->hasMany(M_invitation::class, 'invitation_status_id', 'id');
    }
}
