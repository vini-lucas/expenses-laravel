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
        'end'
    ];

    protected $table = "cards";

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
