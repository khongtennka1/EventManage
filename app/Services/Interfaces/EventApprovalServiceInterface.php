<?php

namespace App\Services\Interfaces;

interface EventApprovalServiceInterface
{
    public function getAllEventApproval();
    public function approval($eventID, $isApproved);
    public function delete($eventID);
}
?>