<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\EventManageServiceInterface;
use Illuminate\Support\Facades\Validator;

class EventManageController extends Controller
{
    protected $eventManageService;

    public function __construct(EventManageServiceInterface $eventManageService) {
        $this->eventManageService = $eventManageService;
    }

    public function getAllEvent() 
    {
        $event = $this->eventManageService->getAllEvent();

        return view('organizer.event_manage', compact('events'));
    }

    public function add()
    {
        return view('organizer.create_event');
    }

    public function create(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'EventName' => 'required|string|max:255|unique:events,EventName',
            'Description' => 'string',
            'ImageURL' => 'required|image|mimes:jpg,jpeg,png,gif|max:51200',
            'Location' => 'required|string',
            'EventTypeID' => 'required|int',
            'StartDate' => 'required|date',
            'EndDate' => 'required|date|after: StartDate',
            'IsMandatory' => 'required|int',
            'Points' => 'required|int',
            'Participant' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = $request->file('ImageURL')->store('img', 'public');

        $data = $request->only([
            'EventName',
            'Description',
            'ImageURL',
            'Location',
            'EventTypeID',
            'StartDate',
            'EndDate',
            'IsMandatory',
            'Points',
            'Participant'
        ]);

        $data['ImageURL'] = $imagePath;

        $this->eventManageService->create($data);

        return redirect()->route('organizer.event_manage')->with('success', "Event Created Successfully");
    }
}
