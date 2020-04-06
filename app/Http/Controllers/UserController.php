<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        // $users = User::get();
        // logger($users);
        $user = Auth::user();
        logger($user);
        // if ($user->role == "user") {
        //     $users = User::where('id', '!=',$user->id)->get();
        // } else {
            $users = User::all();
        // }
    	return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
    	$roleList = ['ticket_admin' => 'Ticket Admin', 'user' => 'User'];
    	return view('user.edit', compact('user', 'roleList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->id == 1) {
            Session::flash('alert-danger', 'No permission to update');
            return redirect('user');
        } else {
            $user->name = $request->name;
            $user->role = $request->role;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->save();
            // flash()->success('Successfully Updated');
            Session::flash('alert-success', 'Successfully Updated');
            return redirect('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->id == 1) {
            Session::flash('alert-danger', 'No permission to Delete');
            return redirect('user');
        } else {
            $user->delete();
            Session::flash('alert-success', 'Successfully Deleted');
            return redirect('user');
        }
    }
}
