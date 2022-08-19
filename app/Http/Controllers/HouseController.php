<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function index()
    {
        $list = [];
        if (auth()->user()->userType == 2) {
            $list =  House::where('userId', auth()->user()->id)->get();
        }
        if (auth()->user()->userType == 1) {
            $list = DB::table('home AS h')->leftJoin('users as u', 'u.id', 'h.userId')
                ->select('h.*', 'u.fullname')->get();
        }
        return view('house.view', compact('list'));
    }
    public function create()
    {
        return view('house.add');
    }
    public function show($id)
    {
        $data = null;
        if (auth()->user()->userType == 2) {
            $data =  House::where('userId', auth()->user()->id)
                ->where('id', $id)->first();
        }
        if (auth()->user()->userType == 1) {
            $data = DB::table('home AS h')->leftJoin('users as u', 'u.id', 'h.userId')
                ->leftJoin('applicants AS a', 'u.id', 'a.userId')->where('h.id', $id)
                ->select('h.*', 'u.fullname', 'a.address', 'a.address2', 'a.state', 'a.City', 'a.phone')->first();
        }
        return view('house.details', compact('data'));
    }
    public function store(Request $request)
    {
        try {
            $request["userId"] = auth()->user()->id;
            $save = House::create($request->all());
            if ($save) {
                return $this->response('Home information successfully saved', true);
            }
            return $this->response('Home registration fail', false, []);
        } catch (\Throwable $ex) {
            return $this->response($ex->getMessage(), false, []);
        }
    }
    public function update(Request $request)
    {
        try {
            House::where('id', $request->id)->update(['status' => $request->status]);
            return $this->response('Status changed', true);
        } catch (\Throwable $ex) {
            return $this->response($ex->getMessage(), false, []);
        }
    }
}
