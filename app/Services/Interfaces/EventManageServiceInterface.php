<?php

namespace App\Services\Interfaces;

interface EventManageServiceInterface
{
    public function getAllEvent();
    public function create(array $data);
    public function update($eventID, array $data);
    public function delete($eventID);
    public function find($eventName);
    public function show($eventID);
    public function getEventByID($eventID);
}
?>