<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class AdminController extends Controller
{
    public function index(Request $request)
{
    $complaints = Complaint::query();

    if ($request->status) {
        $complaints->where('status', $request->status);
    }

    $complaints = $complaints->latest()->get();

    return view('admin.dashboard', compact('complaints'));
}

    public function update(Request $request, $id)
    {
        $c = Complaint::findOrFail($id);
        $c->status = $request->status;
        $c->save();
        return back();
    }
}

