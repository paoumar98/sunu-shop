<?php

namespace App\Http\Controllers;

use App\Exports\ProduitsExport;
use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    public function index()
    {
        return Excel::download(new ProduitsExport(), 'clients.csv');
    }
}
