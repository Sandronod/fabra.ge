<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nn_transactions extends Model
{
    protected $table = 'nn_transactions';

    protected $fillable = [
        'job_id',
        'company_id',
        'user_id',
        'iban',
        'transaction_id',
        'user_offered_budget',
        'payment_budget',
        'user_offered_left_budget',
        'status',
    ];
}
