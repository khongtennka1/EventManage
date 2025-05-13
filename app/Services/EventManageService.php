<?php

namespace App\Services;

use App\Repositories\Interfaces\EventManageRepositoryInterface;
use App\Services\Interfaces\EventManageServiceInterface;

class EventManageService implements EventManageServiceInterface
{
    protected $eventManageRepo;

    public function __construct(EventManageRepositoryInterface $eventManageRepo) {
        $this->eventManageRepo = $eventManageRepo;
    }

    public function getAllEvent()
    {
        return $this->eventManageRepo->getAllEvent();
    }

    public function create(array $data)
    {
        return $this->eventManageRepo->create($data);
    }

    public function update($eventID, array $data)
    {
        return $this->eventManageRepo->update($eventID, $data);
    }

    public function delete($eventID)
    {
        return $this->eventManageRepo->delete($eventID);
    }

    public function find($eventName)
    {
        return $this->eventManageRepo->find($eventName);   
    }

    public function show($eventID)
    {
        return $this->eventManageRepo->show($eventID);
    }

    public function getEventByID($eventID)
    {
        return $this->eventManageRepo->getEventByID($eventID);
    }

    public function filterEvents($startDate, $eventTypeID, $departmentID)
    {
        return $this->eventManageRepo->filterEvents($startDate, $eventTypeID, $departmentID);
    }
}
?>