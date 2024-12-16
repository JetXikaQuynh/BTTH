<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::all(); // Lấy tất cả các máy tính
        return view('computers.index', compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Computer::create([
            'computer_name' => $request->computer_name,
            'model' => $request->model,
            'operating_system' => $request->operating_system,
            'processor' => $request->processor,
            'memory' => $request->memory,
            'available' => $request->available,
        ]);

        return redirect()->route('computers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $id)
    {
        $computer = Computer::findOrFail($id); // Tìm máy tính theo ID
        return view('computers.edit', compact('computer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $computer = Computer::find($id);
        $computer->update([
            'computer_name' => $request->computer_name,
            'model' => $request->model,
            'operating_system' => $request->operating_system,
            'processor' => $request->processor,
            'memory' => $request->memory,
            'available' => $request->available,
        ]);

        return redirect()->route('computers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $id)
    {
        $computer = Computer::find($id);
        $computer->delete();
        return redirect()->route('computers.index');
    }
}
