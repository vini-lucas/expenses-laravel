<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    /** @use HasFactory<\Database\Factories\InstallmentFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];

    protected $table = "installments";

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
