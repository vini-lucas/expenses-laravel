<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PaymentDeadline extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    /** @use HasFactory<\Database\Factories\PaymentDeadlineFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = "payments_deadline";

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
