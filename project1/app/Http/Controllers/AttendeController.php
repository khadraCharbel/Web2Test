<?php

namespace App\Http\Controllers;

use App\Models\attende;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AttendeController extends Controller
{
    public function Signup(){
        return view('signup');
    }
    public function register(Request $request)
    {
        $firstname = $request->firstname;
        $lastname = $request->lastname;

        return "Welcome $firstname, $lastname";
    }
    public function register2(Request $request)
{
    $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:attendes',
        'password' => 'required|min:8',
        'gender' => 'required|in:Male,Female',
    ]);

    $attende = new attende();
    $attende->firstname = $request->firstname;
    $attende->lastname = $request->lastname;
    $attende->email = $request->email;
    $attende->password = Hash::make($request->password);
    $attende->gender = $request->gender;
    $attende->save();

    return "user added succesfully";
}
    public function display(Request $request){

        $attendes=attende::all();
        return view('display')->with('data',$attendes);
    }
    public function edit($id){
        $user=attende::findOrFail($id);
        if($user){
            return view('edit')->with('attendee',$user);
        }
        return 'Attendee not found';
    }
    public function update(Request $request,$id){
        $user=attende::findOrFail($id);
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:attendes,email,'.$id,
        ]);
        $user->fill($request->only(['firstname', 'lastname', 'email']));
        $user->save();
        return redirect('display');
    }
    public function delete($id){
        $user=attende::findOrFail($id);
        $user->delete();
        return redirect('display')->with('success','Attendee deleted');
    }
    public function search(Request $request)
{
    $query = $request->input('query');

    $attendees = attende::where('firstname', 'like', '%' . $query . '%')
                        ->orWhere('lastname', 'like', '%' . $query . '%')
                        ->orWhere('email', 'like', '%' . $query . '%')
                        ->get();

    return view('attdisplay')->with('attendees',$attendees);
}

}
