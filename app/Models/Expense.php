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
        'due_date',
        'payment_method_id',
        'user_id',
        'card_id',
        'category_id'
    ];

    protected $table = "expenses";
}
