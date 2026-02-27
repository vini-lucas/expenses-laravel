<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'payment_deadline_id',
        'payment_method_id',
        'user_id',
        'card_id',
        'category_id',
        'installment_id'
    ];

    protected $table = "expenses";

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function installment()
    {
        return $this->belongsTo(Installment::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function payment_deadline()
    {
        return $this->belongsTo(PaymentDeadline::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
