<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\EventManageServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\EventType;
use App\Models\Department;
use App\Models\Institute;
class EventManageController extends Controller
{
    protected $eventManageService;

    public function __construct(EventManageServiceInterface $eventManageService)
    {
        $this->eventManageService = $eventManageService;
    }

    public function getAllEvent()
    {
        $events =  $this->eventManageService->getAllEvent();
        $eventTypes = EventType::all();
        $departments = Department::all();
        $institutes = Institute::all();

        return view('event-list', compact('events', 'eventTypes', 'departments', 'institutes'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'EventName' => 'required|string|max:255|unique:events,EventName',
            'Description' => 'string',
            'ImageURL' => 'required|image|mimes:jpg,jpeg,png,gif|max:51200',
            'Location' => 'required|string',
            'EventTypeID' => 'required|int',
            'DepartmentID' => 'exists:departments,DepartmentID',
            'InstituteID' => 'exists:institutes,InstituteID',
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
            'DepartmentID',
            'InstituteID',
            'StartDate',
            'EndDate',
            'IsMandatory',
            'Points',
            'Participant',
        ]);

        $data['ImageURL'] = $imagePath;

        $data['OrganizerID'] = session('user')->UserID;

        $result = $this->eventManageService->create($data);

        if ($result) {
            return redirect()->route('event-list');
        }

        return redirect()->route('event-list')->with('error', 'Tạo sự kiện thất bai!');
    }

    public function show($eventID)
    {
        $event = $this->eventManageService->show($eventID);

        if (!$event) {
            return redirect()->route('event-list')->with('error', 'Sự kiện không tồn tại!');
        }

        return view('event-details', compact('event'));
    }

    public function update(Request $request, $eventID)
    {
        $validator = Validator::make($request->all(), [
            'EventName' => 'string|max:255',
            'Description' => 'string',
            'ImageURL' => 'image|mimes:jpg,jpeg,png,gif|max:51200',
            'Location' => 'string',
            'EventTypeID' => 'int',
            'DepartmentID' => 'exists:departments,DepartmentID',
            'InstituteID' => 'exists:institutes,InstituteID',
            'StartDate' => 'date',
            'EndDate' => 'date|after: StartDate',
            'IsMandatory' => 'int',
            'Points' => 'int',
            'Participant' => 'int',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'EventName',
            'Description',
            'ImageURL',
            'Location',
            'EventTypeID',
            'DepartmentID',
            'InstituteID',
            'StartDate',
            'EndDate',
            'IsMandatory',
            'Points',
            'Participant',
        ]);

        if ($request->hasFile('ImageURL')) {
            $imagePath = $request->file('ImageURL')->store('img', 'public');
            $data['ImageURL'] = $imagePath;
        }

        $result = $this->eventManageService->update($eventID, $data);

        if ($result) {
            return redirect()->route('event-list');
        }

        return redirect()->route('event-list')->with('error', 'Cập nhật sự kiện thất bại!');
    }

    public function delete($eventID)
    {
        $result = $this->eventManageService->delete($eventID);

        if ($result) {
            return redirect()->route('event-list');
        }

        return redirect()->route('event_list')->with('error', 'Xóa sự kiện thất bại!');
    }

    public function find(Request $request)
    {
        $eventName = $request->input('EventName');
        $event = $this->eventManageService->find($eventName);

        if ($event) {
            return response()->json($event);
        }

        return response()->json(['error' => 'Sự kiện không tồn tại!'], 404);
    }

    public function filterEvents(Request $request)
    {
        $startDate = $request->input('StartDate');
        $eventTypeID = $request->input('EventTypeID');
        $departmentID = $request->input('departmentID');

        $events = $this->eventManageService->filterEvents($startDate, $eventTypeID, $departmentID);

        $eventTypes = EventType::all();
        // $departments = Department::all();

        return view('event-list', compact('events', 'eventTypes', 'departments'));
    }
}


