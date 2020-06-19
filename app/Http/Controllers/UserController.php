<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {    
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function importForm()
    {
        return view('users.import');
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        return redirect()->route('users.index');
    }
}
