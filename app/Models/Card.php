<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    protected $fillable = [
        'bank',
        'end',
        'user_id',
        'current_invoice',
        'invoice_history'
    ];

    protected $table = "cards";

    protected $casts = [
    'invoice_history' => 'array'
];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
