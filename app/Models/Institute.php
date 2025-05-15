<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = 'institutes';
    protected $primaryKey = 'InstituteID';

    protected $fillable = [
        'InstituteName'
    ];

    public $timestamps = false;

    public function events()
    {
        return $this->hasMany(Event::class, 'InstituteID');
    }

    public function account()
    {
        return $this->hasMany(Account::class, 'DepartmentID');
    }
}
?>