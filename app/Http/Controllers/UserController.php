<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_users = User::all();
        //$users[] = new User();
        foreach ($all_users as $user) {
            if ($user->inRole('admin') == 0) $users[] = $user;
        }
        return view('users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'department_id' => ['required'],
        ]);
    }
    public function create()
    {
        //
        $roles = Role::all();
        $dpms = Department::all();
        return view('users.create', compact('dpms', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $rq)
    {
        $validatedData = $rq->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'department_id' => ['required'],
        ]);
        //
        $admin = Role::where('slug', 'admin')->first();
        $manager = Role::where('slug', 'manager')->first();
        $user = Role::where('slug', 'user')->first();

        $acc = User::create([
            'name' => $rq['name'],
            'email' => $rq['email'],
            'department_id' => $rq['department_id'],
            'password' => Hash::make($rq['password']),
        ]);
        if ($rq['role'] == 1)
            $acc->roles()->attach($admin);
        if ($rq['role'] == 2)
            $acc->roles()->attach($manager);
        if ($rq['role'] == 3)
            $acc->roles()->attach($user);
        return redirect('/requests/drafts');
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
        //
        
        $roles = Role::where('slug','<>',"admin")->get();
        $dpms = Department::all();
        $user = User::findOrFail($id);
        $r = DB::select("SELECT role_id from role_users where user_id = $user->id");
        return view('users.edit',compact('user','roles','dpms','r'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $rq, $id)
    {
        //
        $validatedData = $rq->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'department_id' => ['required'],
        ]);
        //
        $admin = Role::where('slug', 'admin')->first();
        $manager = Role::where('slug', 'manager')->first();
        $user = Role::where('slug', 'user')->first();
        
        $acc = User::find($id);
        // $acc = User::create([
        //     'name' => $rq['name'],
        //     'email' => $rq['email'],
        //     'department_id' => $rq['department_id'],
        //     'password' => Hash::make($rq['password']),
        // ]);
            $acc['name'] = $rq->name;
            $acc['email'] = $rq->email;
            $acc['password'] =Hash::make($rq['password']);
            $acc['department_id'] = $rq->department_id;

        if ($rq['role'] == 1)
            $acc->roles()->attach($admin);
        if ($rq['role'] == 2)
            $acc->roles()->attach($manager);
        if ($rq['role'] == 3)
            $acc->roles()->attach($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
