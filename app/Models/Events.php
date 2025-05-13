<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'EventID';

    protected $fillable = [
        'EventName',
        'Description',
        'ImageURL',
        'StartDate',
        'EndDate',
        'Location',
        'EventTypeID',
        'OrganizerID',
        'IsMandatory',
        'Points',
        'Participant',
        'IsApproved',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventTypes::class, 'EventTypeID', 'EventTypeID');    
    }

    public function organizer()
    {
        return $this->belongsTo(Account::class, 'OrganizerID', 'UserID');
    }
}
