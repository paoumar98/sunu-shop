<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use App\User;
use App\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{


    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id) {

        $orders = Order::where('user_id', $id)->get();

        return view('admin.users.details', compact('orders'));

    }
    public function export_pdf()
    {
        // Fetch all customers from database
        $users = User::get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('admin.users.index', $users);
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('clients.pdf');
    }



}
