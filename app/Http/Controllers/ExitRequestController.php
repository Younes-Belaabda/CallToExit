<?php

namespace App\Http\Controllers;

use App\Enums\ExitRequestStatusEnum;
use App\Models\ExitRequest;
use Illuminate\Http\Request;

class ExitRequestController extends Controller
{
    public function index(){
        $requests = ExitRequest::all();
        return view('admin.exit-requests.index' , ['requests' => $requests]);
    }

    public function progress(){
        $requests = ExitRequest::where('status' , ExitRequestStatusEnum::PROGRESS)->get();
        return view('admin.exit-requests.progress' , ['requests' => $requests]);
    }

    public function approved(){
        $requests = ExitRequest::where('status' , ExitRequestStatusEnum::APPROVED)->get();
        return view('admin.exit-requests.approved' , ['requests' => $requests]);
    }

    public function rejected(){
        $requests = ExitRequest::where('status' , ExitRequestStatusEnum::REJECTED)->get();
        return view('admin.exit-requests.rejected' , ['requests' => $requests]);
    }

    public function approve(ExitRequest $request){
        $request->status = ExitRequestStatusEnum::APPROVED;
        $request->save();
        return back();
    }

    public function reject(ExitRequest $request){
        $request->status = ExitRequestStatusEnum::REJECTED;
        $request->save();
        return back();
    }
}
