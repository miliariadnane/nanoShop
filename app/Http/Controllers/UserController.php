<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'firstName' => 'required|string|max:25',
            'lastName' => 'required|string|max:25',
            'username' => 'required|string|max:10|unique:users',
            'birthDate' => 'required|date',
            'sexe' => 'required',
            'phoneNumber' => 'required|string|max:20',
            'address' => 'max:255',
            'avatar' => 'file',
            'email' => 'required|email|unique:users',
            'password' => 'required_with:password_confirmation|confirmed|min:6',
            'status' => 'required'
        ]);      
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->username = $request->username;
        $user->birthDate = date("Y-m-d H:i", strtotime($request->birthDate));
        $user->sexe = $request->sexe;
        $user->phoneNumber = $request->phoneNumber;
        $user->address = $request->address;
        if ($request->hasFile('avatar')){
            $user->avatar = $request->avatar->store('images');
        }else{
            $user->avatar = "storage/images/user.jpg";
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->get('status') ? 1 : 0;
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);
        //dd($user);
        $user->save();
    
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::where('id', $user->id)->first();
        if(is_null($user)){
            return abort(404);
        }
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        $user = User::findOrFail($user->id);
        if(is_null($user)){
            return abort(404);
        }
        return view('backend.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $this->validate($request, [
            'firstName' => 'required|string|max:25',
            'lastName' => 'required|string|max:25',
            'username' => 'required|string|max:10|unique:users,username,'.$user->id,
            'birthDate' => 'required|date',
            'sexe' => 'required',
            'phoneNumber' => 'required|string|max:20',
            'address' => 'max:255',
            'avatar' => 'file',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'roles' => 'required'
        ]);

        $newData = [];
        if($user->firstName != $request->firstName){
            $newData["firstName"] = $request->firstName;
        }
        if ($user->lastName != $request->lastName) {
            $newData["lastName"] = $request->lastName;
        }
        if ($user->username != $request->username) {
            $newData["username"] = $request->username;
        }
        if ($user->birthDate != $request->birthDate) {
            $newData["birthDate"] = $request->birthDate;
        }
        if ($user->sexe != $request->sexe) {
            $newData["sexe"] = $request->sexe;
        }
        if ($user->phoneNumber != $request->phoneNumber) {
            $newData["phoneNumber"] = $request->phoneNumber;
        }
        if ($user->address != $request->address) {
            $newData["address"] = $request->address;
        }
        
        if ($request->hasFile('avatar')){
            if($user->avatar){
                $oldImage = public_path("storage/{$user->avatar}");
                //$oldImage = str_replace(chr(47),chr(92),$oldImage);
                if (File::exists($oldImage)) {
                    unlink($oldImage); //supprimer old image;
                }
            }
            $newData["avatar"] = $request->avatar->store('images');
        }
        if ($user->email != $request->email) {
            $newData["email"] = $request->email;
        }
        if ($request->password) {
            if(strlen($request->password) < 6){
                $errors["passLength"] = "The password must be at least 6 characters.";
                return back()->withErrors($errors);
            }
            $newData["password"] = Hash::make($request->password);
        }
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);
        //dd($user->status);
        //dd($request->status);
        if ($user->status != $request->status) {
            $newData["status"] = $request->status;
        }
        
        if($newData){
            //dd($newData);
            $user->update($newData);
        }
        return redirect()->route('users.index');
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
