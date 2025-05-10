<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\EventApprovalServiceInterface;

class EventApprovalController extends Controller
{
    protected $eventApprovalService;

    public function __construct(EventApprovalServiceInterface $eventApprovalService)
    {
        $this->eventApprovalService = $eventApprovalService;
    }

    public function show()
    {
        $event = $this->eventApprovalService->getAllEventApproval();

        if ($event->isEmpty()) {
            return response()->json(['message' => 'No events found for approval.'], 404);
        }

        return view('admin.event_approval', ['events' => $event]);
    }

    public function eventApprovalHandler(Request $request, $eventID)
    {
        $isApproved = $request->input('IsApproved');

        if ($isApproved == '1') {
            $this->eventApprovalService->approval($eventID, 1);
            return redirect()->route('event_manage')->with('success', 'Event approved successfully.');
        } elseif ($isApproved == '0') {
            $this->eventApprovalService->approval($eventID, 0);
            return redirect()->route('event_manage')->with('success', 'Event rejected successfully.');
        } else {
            return redirect()->route('event_manage')->with('error', 'Invalid approval status.');
        }
    }
}
