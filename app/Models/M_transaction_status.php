<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;

class M_transaction_status extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_transaction_statuses';

    protected $guarded = [];

    public $timestamps = true;

    public function transactions()
    {
        return $this->hasMany(M_transaction::class, 'transaction_status_id', 'id');
    }
}
