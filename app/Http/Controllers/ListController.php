<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jsonuser;
use App\Models\Exceluser;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ListController extends Controller
{
    public function list() {
        return response()->json(User::get(), 200);
    }

    public function index(): View|Factory|Application
    {
        $user = User::all();
        $jsonuser = Jsonuser::all();
        $exceluser = Exceluser::all();

        return view('indexU', compact('user','jsonuser','exceluser'));
    }
    public function create(): View|Factory|Application
    {
        return view('createU');
    }
    
    public function store(Request $req): Application|RedirectResponse|Redirector
    {
        $data = $req->validate([
            'name' => 'required|unique:users,name|max:25',
            'number' => 'required|min:11|max:11',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'var' => 'required',
        ]);
        
        switch ($data['var']){
        case 'MySQL':
            $user = User::create($data);
        break;
        case 'JSON':
            $jsonuser = Jsonuser::create($data);
            include 'toJson.php';
        break;
        case 'Excel':
            $exceluser = Exceluser::create($data);
            include 'toExcel.php';
        break;
        }
             
        return redirect('/users')->withSuccess('Entry has been saved');
    }
 
    public function edit(int $id): Application|Factory|View
    {
        $user = User::findOrFail($id);
        return view('editU', compact('user'));
    }
    public function update(Request $req, int $id): Application|RedirectResponse|Redirector
    {
        $data = $req->validate([
            'name' => 'required|max:25',
            'number' => 'required|min:11|max:11',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        User::whereId($id)->update($data);
        include 'toJson.php';
               
        include 'toExcel.php';
        return redirect('/users')->withSuccess('Entry has been updated');
    }
    public function destroy(int $id): Application|RedirectResponse|Redirector
    {
        $user = User::findOrFail($id);
        $user->delete();
        include 'toJson.php';
               
        include 'toExcel.php';
        return redirect('/users')->withSuccess('Entry has been deleted');
    }
}
