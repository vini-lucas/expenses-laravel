<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class PaymentMethod extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    /** @use HasFactory<\Database\Factories\PaymentMethodFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = "payment_methods";

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
