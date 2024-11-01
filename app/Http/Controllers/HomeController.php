<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (isSuperadmin()) {
            return redirect()->route('superadmin.dashboard');
        } elseif (isStaff()) {
            return redirect()->route('staff.dashboard');
        } elseif (isPharmacist()) {
            return redirect()->route('pharmacist.dashboard');
        } elseif (isCashier()) {
            return redirect()->route('cashier.dashboard');
        }
    }
}
