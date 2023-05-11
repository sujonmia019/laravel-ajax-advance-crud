<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store_or_update(Request $request){
        if ($request->ajax()) {
            $result = User::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'mobile_no'  => $request->mobile_no,
                'status'     => $request->status,
                'created_by' => 'Sujon'
            ]);

            if ($result) {
                $output = ['status'=>'success','message'=>'Data has been saved successfully.'];
            }else{
                $output = ['status'=>'error','message'=>'Data save failed.'];
            }
            return response()->json($output);
        }
    }
}
