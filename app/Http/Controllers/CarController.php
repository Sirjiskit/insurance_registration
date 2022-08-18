<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $list = [];
        if (auth()->user()->userType == 2) {
            $list =  Car::where('userId', auth()->user()->id)->get();
        }
        if (auth()->user()->userType == 1) {
            $list = DB::table('cars AS c')->leftJoin('users as u', 'u.id', 'c.userId')
                ->select('c.*', 'u.fullname')->get();
        }
        return view('cars.view', compact('list'));
    }
    public function show($id)
    {
        $data = null;
        if (auth()->user()->userType == 2) {
            $data =  Car::where('userId', auth()->user()->id)
                ->where('id', $id)->first();
        }
        if (auth()->user()->userType == 1) {
            $data = DB::table('cars AS c')->leftJoin('users as u', 'u.id', 'c.userId')
                ->leftJoin('applicants AS a', 'u.id', 'a.userId')->where('c.id', $id)
                ->select('c.*', 'u.fullname', 'a.address', 'a.address2', 'a.state', 'a.City', 'a.phone')->first();
        }
        return view('cars.details', compact('data'));
    }
    public function create()
    {
        $carMake = $this->carMakes();
        $bodyType = $this->carBodyType();
        return view('cars.add', compact('carMake', 'bodyType'));
    }
    public function store(Request $request)
    {
        try {
            $request["userId"] = auth()->user()->id;
            $save = Car::create($request->all());
            if ($save) {
                return $this->response('Car information successfully saved', true);
            }
            return $this->response('Car registration fail', false, []);
        } catch (\Throwable $ex) {
            return $this->response($ex->getMessage(), false, []);
        }
    }
    public function update(Request $request)
    {
        try {
            Car::where('id', $request->id)->update(['status' => $request->status]);
            return $this->response('Status changed', true);
        } catch (\Throwable $ex) {
            return $this->response($ex->getMessage(), false, []);
        }
    }
}
