<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aspirations = Aspiration::with('users')->get();
        return view('admin.index', compact('aspirations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,proses,selesai',
        ]);

        $aspiration = Aspiration::findOrFail($id);
        $aspiration->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status aspirasi diperbarui');
    }

    /**
     * Show the form for creating feedback.
     */
    public function createFeedback(string $id)
    {
        $aspiration = Aspiration::with('students.user', 'category')->findOrFail($id);
        return view('admin.feedback.create', compact('aspiration'));
    }

    /**
     * Store feedback for the specified aspiration.
     */
    public function storeFeedback(Request $request)
    {
        $request->validate([
            'aspiration_id' => 'required|exists:aspirations,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        \App\Models\Feedback::create([
            'aspiration_id' => $request->aspiration_id,
            'user_id' => $request->user_id,
            'content' => $request->content,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Feedback berhasil dikirim');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
