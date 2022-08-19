<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    public function index()
    {
        $list = [];
        if (auth()->user()->userType == 2) {
            $list =  Business::where('userId', auth()->user()->id)->get();
        }
        if (auth()->user()->userType == 1) {
            $list = DB::table('business AS b')->leftJoin('users as u', 'u.id', 'b.userId')
                ->select('b.*', 'u.fullname')->get();
        }
        return view('business.view', compact('list'));
    }
    public function create()
    {
        return view('business.add');
    }
    public function show($id)
    {
        $data = null;
        if (auth()->user()->userType == 2) {
            $data =  Business::where('userId', auth()->user()->id)
                ->where('id', $id)->first();
        }
        if (auth()->user()->userType == 1) {
            $data = DB::table('business AS b')->leftJoin('users as u', 'u.id', 'b.userId')
                ->leftJoin('applicants AS a', 'u.id', 'a.userId')->where('b.id', $id)
                ->select('b.*', 'u.fullname', 'a.address', 'a.address2', 'a.state', 'a.City', 'a.phone')->first();
        }
        return view('business.details', compact('data'));
    }
    public function store(Request $request)
    {
        try {
            $request["userId"] = auth()->user()->id;
            $save = Business::create($request->all());
            if ($save) {
                return $this->response('Business information successfully saved', true);
            }
            return $this->response('Business registration fail', false, []);
        } catch (\Throwable $ex) {
            return $this->response($ex->getMessage(), false, []);
        }
    }
    public function update(Request $request)
    {
        try {
            Business::where('id', $request->id)->update(['status' => $request->status]);
            return $this->response('Status changed', true);
        } catch (\Throwable $ex) {
            return $this->response($ex->getMessage(), false, []);
        }
    }
}
