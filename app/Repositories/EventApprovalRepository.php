<?php

namespace App\Repositories;

use App\Repositories\Interfaces\EventApprovalRepositoryInterface;
use App\Models\Event;

class EventApprovalRepository implements EventApprovalRepositoryInterface
{
    protected $model;

    public function __construct(Event $event) {
        $this->model = $event;
    }

    public function getAllEventApproval()
    {
        return $this->model->where('IsApproved', 0)->get();
    }

    public function approval($eventID, $isApproved)
    {
        $event = $this->model->find($eventID);

        if ($event) {
            $event->IsApproved = $isApproved;
            $event->update();
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
}
?>