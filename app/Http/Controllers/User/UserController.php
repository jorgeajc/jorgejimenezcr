<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller {
    public function userAuth() {
        return \Auth::user();
    }
    public function searchUser( ) {
        return User::find(1);
    }
    public function editUser($data) {
        $user = Auth::user();
        $user->update([
            'name'      => $data->name,
            'last_name' => $data->last_name,
            'whatsapp'  => $data->whatsapp,
            'birthday'  => $data->birthday,
            'country'   => $data->country,
            'address'   => $data->address,
            'about_me'  => $data->about_me,
            'my_carrer' => $data->my_carrer,
            'email'     => $data->email
        ]);
        return $user;
    }
    public function updateInformation(Request $request) {
        $this->editUser($request);
        return redirect()->back();
    }
}
