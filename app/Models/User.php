<?php



namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // ✅ Correct way to define relationship
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
}

