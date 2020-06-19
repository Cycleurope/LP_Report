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
        $users = User::paginate(40);
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
        $time = 180;
        ini_set('max_execution_time', $time);
        Excel::import(new UsersImport, $request->file);
        return redirect()->route('users.index');
    }

    public function export()
    {
        
    }
}
