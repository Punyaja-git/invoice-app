<?php

// app/Models/Invoice.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{


    // Define the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'client_name',
        'client_email',
        'amount',
        'due_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

