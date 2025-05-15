<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $primaryKey = 'DepartmentID';

    protected $fillable = [
        'DepartmentName',
        'InstituteID'
    ];

    public $timestamps = false;

    public function events() 
    {
        return $this->hasMany(Event::class, 'DepartmentID');
    }

    public function account()
    {
        return $this->hasMany(Account::class, 'DepartmentID');
    }
}
