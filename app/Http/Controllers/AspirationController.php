<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Category;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use App\Enums\AspirationStatus;
use App\Models\Feedback;

class AspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('category_name')->get();
        $aspirations = Aspiration::with('users')->orderBy('created_at', 'desc')->get();
        return view('students.index', compact('categories', 'aspirations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|integer|unique:students,nis|min:10',
            'class' => 'required|string|max:50',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('aspirations', 'public');
        }

        Aspiration::create([
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        Student::create([
            'user_id' => auth()->id(),
            'nis' => $validated['nis'],
            'class' => $validated['class'],
        ]);
        
        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aspirations = Aspiration::with('students.user', 'category', 'feedback')->findOrFail($id);
        return view('students.show', compact('aspirations'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function setStatus($id)
    {
        $aspiration = Aspiration::findOrFail($id);

        $aspiration->update([
            'status' => AspirationStatus::PROSES,
        ]);

        return back()->with('success', 'Status diubah ke Proses');
    }

    public function setSelesai($id)
    {
        $aspiration = Aspiration::findOrFail($id);
        $aspiration->update([
            'status' => AspirationStatus::SELESAI,
        ]);

        return back()->with('success', 'Status diubah ke Selesai');
    }

}
