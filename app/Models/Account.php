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
        'DepartmentID',
        'ClassName',
        'Gender'
    ];
    public $timestamps = false;

    public function events()
    {
        return $this->hasMany(Event::class, 'OrganizerID');
    }

    public function department() 
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class, 'InstituteID', 'InstituteID');
    }

    public function getAuthPassword()
    {
        return $this->Password();
    }
}

