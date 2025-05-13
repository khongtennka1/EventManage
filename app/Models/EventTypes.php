<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTypes extends Model
{
    use HasFactory;
    
    protected $table = 'event_types';
    protected $primarykey = 'EventTypeID';
    
    protected $fillable = [
        'EventTypeName',
        'Description'
    ];

    public function events()
    {
        return $this->hasMany(Events::class, 'EventTypeID');
    }
}
