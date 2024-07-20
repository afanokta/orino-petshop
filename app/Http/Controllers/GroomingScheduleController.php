<?php

namespace App\Http\Controllers;

use App\Models\GroomingSchedule;
use Illuminate\Http\Request;

class GroomingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules_raw = GroomingSchedule::with('grooming')->get();
        $schedules = [];
        foreach ($schedules_raw as $key => $schedule) {
            $schedules[$key]['extendedProps']['grooming_schedule_id'] = $schedule->id;
            $schedules[$key]['extendedProps']['available'] = $schedule->grooming ? false : true;
            $schedules[$key]['start'] = $schedule->date . ' ' . $schedule->session->format('H:i');
            $schedules[$key]['end'] = $schedule->date . ' ' . $schedule->session_end->format('H:i');
            $schedules[$key]['borderColor'] = $schedule->grooming ? "#dc3545" : "#28a745";
            $schedules[$key]['backgroundColor'] = $schedule->grooming ? "#dc3545" : "#28a745";
            $schedules[$key]['textColor'] = $schedule->grooming ? "#dc3545" : "#28a745";
            $schedules[$key]['title'] = $schedule->session->format('H:i');
        }
        // return response()->json([
        //     'date' => $schedules
        // ]);
        return view('dashboard.grooming.tambah-jadwal', compact('schedules'));
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
        // dd($request->all());
        try {
            GroomingSchedule::create($request->all());
            return redirect()->back()->with('success', 'Berhasil Menyimpan Data');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(GroomingSchedule $schedule)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroomingSchedule $schedule)
    {
        return view('dashboard.grooming.edit-jadwal', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroomingSchedule $schedule)
    {
        if ($schedule->grooming) {
            return redirect()->back()->with('error', 'Jadwal sudah diisi dengan grooming');
        }
        try {
            $schedule->update($request->all());
            return redirect()->route('admin.grooming.schedule.index')->with('success', 'Berhasil Menyimpan Data');
        } catch (\Throwable $th) {
            return redirect()->route('admin.grooming.schedule.index')->with('error', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroomingSchedule $schedule)
    {
        if ($schedule->grooming) {
            return redirect()->back()->with('error', 'Jadwal sudah diisi dengan grooming');
        }
        try {
            $schedule->delete();
            return redirect()->route('admin.grooming.schedule.index')->with('success', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {
            return redirect()->route('admin.grooming.schedule.index')->with('error', 'Gagal Menghapus Data');
        }
    }
}
