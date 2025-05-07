<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\EventManageServiceInterface;
use Illuminate\Support\Facades\Validator;

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

        return view('admin.event_manage', compact('events'));
    }

    public function add()
    {
        return view('admin.create_event');
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
            'Participant',
        ]);

        $data['ImageURL'] = $imagePath;

        $data['OrganizerID'] = session('user')->UserID;

        $result = $this->eventManageService->create($data);

        if ($result) {
            return redirect()->route('event_manage');
        }

        return redirect()->route('event_manage')->with('error', 'Tạo sự kiện thất bai!');
    }

    public function show($eventID)
    {
        $event = $this->eventManageService->show($eventID);

        if (!$event) {
            return redirect()->route('event_manage')->with('error', 'Sự kiện không tồn tại!');
        }

        return view('admin.event_detail', compact('event'));
    }

    public function edit($eventID)
    {
        $event = $this->eventManageService->getEventByID($eventID);

        if (!$event) {
            return redirect()->route('event_manage')->with('error', 'Sự kiện không tồn tại!');
        }

        return view('admin.edit_event', compact('event'));
    }

    public function update(Request $request, $eventID)
    {
        $validator = Validator::make($request->all(), [
            'EventName' => 'string|max:255',
            'Description' => 'string',
            'ImageURL' => 'image|mimes:jpg,jpeg,png,gif|max:51200',
            'Location' => 'string',
            'EventTypeID' => 'int',
            'StartDate' => 'date',
            'EndDate' => 'date|after: StartDate',
            'IsMandatory' => 'int',
            'Points' => 'int',
            'Participant' => 'int',
        ]);

        $imagePath = $request->file('ImageURL')->store('img', 'public');

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

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
            'Participant',
        ]);

        $data['ImageURL'] = $imagePath;

        $result = $this->eventManageService->update($eventID, $data);

        if ($result) {
            return redirect()->route('event_manage');
        }

        return redirect()->route('event_manage')->with('error', 'Cập nhật sự kiện thất bại!');
    }

    public function delete($eventID)
    {
        $result = $this->eventManageService->delete($eventID);

        if ($result) {
            return redirect()->route('event_manage');
        }

        return redirect()->route('event_manage')->with('error', 'Xóa sự kiện thất bại!');
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
}
