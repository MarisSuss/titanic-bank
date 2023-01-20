<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_user_id',
        'receiver_user_id',
        'sender_account_id',
        'receiver_account_id',
        'amount',
        'currency',
        'created_at',
        'updated_at'
    ];
}
