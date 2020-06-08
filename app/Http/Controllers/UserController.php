<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use App\User;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    public function create(Request $request)
    {
        $id = $request->get('id');
        $model = new User;
        if ($id > 0) {
            $model = User::findOrfail($id);
        }

        return view('user.form', ['model' => $model]);
    }

    public function save(Request $request)
    {
        $postValues = $request->all();

        $validator = \Validator::make($postValues, [
            'name' => ['required', 'max:30'],
            'email' => ['required', \Illuminate\Validation\Rule::unique('users')->ignore((int) $postValues['id']), 'max:255'],
            'password' => ['required_without:id']
        ],[
            'password.required_without' => 'Please enter a strong password.'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        } else {

            $model = new User;
            if ($postValues['id'] > 0) {
                $model = User::findOrfail($postValues['id']);
            }
            $model->fill($postValues);
            if ($postValues['password'] != '')
                $model->password = Hash::make($postValues['password']);
            $model->save();

            return response()->json(['message' => 'success']);
        }

    }

    public function status(Request $request){
        $postValues = $request->all();
        if ($postValues['user'] > 0) {
            $model = User::findOrfail($postValues['user']);
            $postValues['flag'] == 1 ? $model->unblock() : $model->block();
        
        }
        return response()->json(['message' => 'success']);
    }
}
