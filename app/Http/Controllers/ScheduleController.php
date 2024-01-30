<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Present;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.schedules.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
//        if ($request->ajax()) {
            $Shift = Schedule::with(['shift','employee'])
                ->select(['schedules.*', 'shifts.name as name', 'employees.first_name as first_name' ])
                ->join('shifts', 'schedules.shift_id', '=', 'shifts.id')
                ->join('employees', 'schedules.employee_id', '=', 'employees.id')
                ->join('positions', 'employees.position_id', '=', 'positions.id')
                ->get();

            return datatables()->of($Shift)
                ->addIndexColumn()
                ->addColumn('jabatan', function (Schedule $present) {
                    return $present->employee->position->name;
                })
                ->addColumn('Actions', function ($row) {
                    $html = '<button class="btn btn-warning btn-xs btnEdit" data-id="'.$row->id.'" data-toggle="modal" data-target="#myModalEdit">Edit</button>';
                    $html .= '<button class="btn btn-danger btn-xs btnDelete" data-id="'.$row->id.'">Hapus</button>';
                    return $html;
                })
                ->rawColumns(['Actions','jabatan'])
                ->toJson();
//        }
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
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
