<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Illuminate\Http\Response;

class vendorController extends Controller
{
    public function index(){
        $vendors = Vendor::all();
        return response()->json(
            [
                'code' => 200,
                'status' => 'success',
                'vendors' => $vendors
        ],200);
    }
}
