<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDeadline extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentDeadlineFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = "payments_deadline";
}
