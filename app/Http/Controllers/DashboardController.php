<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\EventManageServiceInterface;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    protected $eventManageService;

    public function __construct(EventManageServiceInterface $eventManageService)
    {
        $this->eventManageService = $eventManageService;
    }

    public function getAllEvent()
    {
        $events =  $this->eventManageService->getAllEvent();

        return view('user.dashboard', compact('events'));
    }

}