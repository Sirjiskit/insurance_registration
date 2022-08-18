<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        try {
            $request["userType"] = 2;
            $arrFullname = explode(' ', $request->fullname);
            $request["lastName"] = count($arrFullname) >= 1 ? $arrFullname[0] : '';
            $request["firstName"] = count($arrFullname) >= 2 ? $arrFullname[1] : '';
            $request["password"] = Hash::make($request["password"]);
            unset($request->confirmPassword, $request->fullname);
            $create = User::create($request->all());
            if ($create) {
                return $this->response('You have successfully registered', true, route('login.show'));
            }
            return $this->response('Registration fail', false, []);
        } catch (\Throwable $th) {
            return $this->response($th->getMessage(), false, []);
        }
    }

    public function update(Request $request)
    {
        try {
            $user = array('lastName' => $request->lastName, 'firstName' => $request->firstName);
            $appl = $request->all();
            unset($appl['lastName'], $appl['firstName'], $appl['_token']);
            User::where('id', auth()->user()->id)->update($user);
            $update = DB::table('applicants')->where('userId', auth()->user()->id)->update($appl);
            return $this->response('Successfully changed', true);
        } catch (\Throwable $th) {
            return $this->response('Update fail', false, []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
