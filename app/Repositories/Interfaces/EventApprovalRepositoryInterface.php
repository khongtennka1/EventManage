<?php
namespace App\Repositories\Interfaces;

use App\Models\events;

interface EventApprovalRepositoryInterface
{
    public function getAllEventApproval();
    public function approval($eventID, array $data);
    public function delete($eventID);
}
?>