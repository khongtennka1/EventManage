<?php

namespace App\Services;

use App\Repositories\Interfaces\EventApprovalRepositoryInterface;
use App\Services\Interfaces\EventApprovalServiceInterface;

class EventApprovalService implements EventApprovalServiceInterface
{
    protected $eventApprovalRepo;

    public function __construct(EventApprovalRepositoryInterface $eventApprovalRepo) {
        $this->eventApprovalRepo = $eventApprovalRepo;
    }

    public function getAllEventApproval()
    {
        return $this->eventApprovalRepo->getAllEventApproval();
    }

    public function approval($eventID, $isApproved)
    {
        return $this->eventApprovalRepo->approval($eventID, $isApproved);
    }
}
?>