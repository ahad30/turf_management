<?php

namespace App\Http\Controllers;

use App\Models\Slot;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slots = Slot::all();

        return view('admin.slots.index', compact('slots'));
    }
}
