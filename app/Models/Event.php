<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
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
        'DepartmentID'
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'EventTypeID', 'EventTypeID');    
    }

    public function organizer()
    {
        return $this->belongsTo(Account::class, 'OrganizerID', 'UserID');
    }

    public function department()
    {
        return $this->belongTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

    public function institute()
    {
        return $this->belongTo(Institute::class, 'InstituteID', 'InstituteID');
    }
}
?>
