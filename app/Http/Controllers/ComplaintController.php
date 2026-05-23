<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function home()
    {
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'Pending')->count(),
            'progress' => Complaint::where('status', 'In Progress')->count(),
            'resolved' => Complaint::where('status', 'Resolved')->count(),
        ];

        $latest = Complaint::latest()->take(5)->get();
        return view('home', compact('stats', 'latest'));
    }

    public function index(Request $request)
    {
        $query = Complaint::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('student_name', 'like', '%' . $request->search . '%')
                  ->orWhere('roll_no', 'like', '%' . $request->search . '%')
                  ->orWhere('subject', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $complaints = $query->latest()->paginate(8)->withQueryString();
        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:100',
            'roll_no' => 'required|string|max:50',
            'email' => 'nullable|email|max:150',
            'phone' => 'nullable|string|max:30',
            'department' => 'required|string|max:100',
            'semester' => 'nullable|string|max:50',
            'category' => 'required|string|max:100',
            'priority' => 'required|string|max:30',
            'subject' => 'required|string|max:150',
            'description' => 'required|string|min:10',
        ]);

        $complaint = Complaint::create($validated);
        return redirect()->route('complaints.show', $complaint)->with('success', 'Complaint submitted successfully. Tracking ID: #' . $complaint->id);
    }

    public function show(Complaint $complaint)
    {
        return view('complaints.show', compact('complaint'));
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate(['status' => 'required|in:Pending,In Progress,Resolved,Rejected']);
        $complaint->update(['status' => $request->status]);
        return back()->with('success', 'Complaint status updated.');
    }
}
