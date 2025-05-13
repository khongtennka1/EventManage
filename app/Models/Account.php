<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'account';
    protected $primaryKey = 'UserID'; 

    protected $fillable = [
        'UserName',
        'StudentCode',
        'Password',
        'Email',
        'Points',
        'IsActive',
        'Role',
        'PhoneNumber',
        'FullName',
        'dob',
        'Avatar',       
        'Address',
    ];
    public $timestamps = false;

    public function events()
    {
        return $this->hasMany(Events::class, 'OrganizerID');
    }

    public function getAuthPassword()
    {
        return $this->Password();
    }
}

