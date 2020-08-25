<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function listAllUsers()
    {
        // pega todos os registros de users
        $users = User::all();
        return view('listAllUsers', [
            'users' => $users
        ]);
    }

    // injeção de dados no parametro
    public function listUser(User $user)
    {
        return view('listUser', [
            // $user é oq foi passado no parametro, recebido da url
            'user' => $user
        ]);
    }

    public function formAddUser()
    {
        return view('addUser');
    }

    // injeção de dependencia (pega dados de dentro do form)
    public function storeUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // persistir dados
        $user->save();

        return redirect()->route('users');
    }

    public function formEditUser(User $user)
    {
        return view('editUser', [
            'user' => $user
        ]);
    }

    public function edit(User $user, Request $request)
    {
        $user->name = $request->name;

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }

        if(!empty($request->password)){ 
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users');
    }
}
