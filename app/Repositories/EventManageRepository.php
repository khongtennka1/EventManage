<?php

namespace App\Repositories;
use App\Models\Events;

use App\Repositories\Interfaces\EventManageRepositoryInterface;

class EventManageRepository implements EventManageRepositoryInterface
{
    protected $model;

    public function __construct(Events $event) {
        $this->model = $event;
    }

    public function getAllEvent()
    {
        return $this->model->where('IsApproved', 1)->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($eventID, array $data)
    {
        $event = $this->model->find($eventID);
        
        if ($event) {
            $event->update($data);
            return true;
        }

        return false;
    }

    public function delete($eventID)
    {
        $event = $this->model->find($eventID);
        
        if ($event) {
            $event->delete();
            return true;
        }

        return false;
    }

    public function find($eventName)
    {
        return $this->model::where('EventName', 'like', "%{$eventName}")->get();
    }

    public function show($eventID)
    {
        return $this->model->find($eventID);
    }

    public function getEventByID($eventID)
    {
        return $this->model->find($eventID);
    }
}
?>