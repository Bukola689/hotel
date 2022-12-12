<?php

namespace App\Http\Controllers\V1\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Staff;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Department;
use App\Models\Salary;
use App\Models\Leave;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function allBooking()
    {
        $allBookings = Booking::orderBy('id', 'desc')->paginate();

        return response()->json($allBookings);
    }

    public function countBooking()
    {
        $countBooking = Booking::count();

        return response()->json([
            'total-booking' => $countBooking
        ]);
    }

    public function allCustomer()
    {
        $allcustomers = Customer::orderBy('id', 'desc')->paginate();

        return response()->json($allcustomers);
    }

    public function countCustomer()
    {
        $countCustomer = Customer::count();

        return response()->json([
            'total-customer' => $countCustomer
        ]);
    }


    public function allEmployee()
    {
        $allEmployees = Employee::orderBy('id', 'desc')->paginate();

        return response()->json( $allEmployees);
    }

    public function countEmployee()
    {
        $countEmployee = Employee::count();

        return response()->json([
            'total-employee' => $countEmployee
        ]);
    }

    public function allStaff()
    {
        $allStaff = Staff::orderBy('id', 'desc')->paginate();

        return response()->json( $allStaff);
    }

    public function countStaff()
    {
        $countStaff = Staff::count();

        return response()->json([
            'total-staff' => $countStaff
        ]);
    }

    public function allRoom()
    {
        $allRooms = Room::with('roomtype')->orderBy('id', 'desc')->paginate();

        return response()->json( $allRooms);
    }

    public function countRoom()
    {
        $countRoom = Room::count();

        return response()->json([
            'total-room' => $countRoom
        ]);
    }

    public function allRoomtype()
    {
        $allRoomtypes = RoomType::orderBy('id', 'desc')->paginate();

        return response()->json( $allRoomtypes);
    }

    public function countRoomtype()
    {
        $countRoomtype = RoomType::count();

        return response()->json([
            'total-Roomtype' => $countRoomtype
        ]);
    }


    public function allDepartment()
    {
        $allDepartments = Department::orderBy('id', 'desc')->paginate();

        return response()->json( $allDepartments);
    }

    public function countDepartment()
    {
        $countDepartment = Salary::count();

        return response()->json([
            'total-Department' => $countDepartment
        ]);
    }

    public function allSalary()
    {
        $allSalaries = Salary::with('department')->orderBy('id', 'desc')->paginate();

        return response()->json( $allSalaries);
    }

    public function countSalary()
    {
        $countSalary = Salary::count();

        return response()->json([
            'total-salary' => $countSalary
        ]);
    }

   

    public function allLeave()
    {
        $allLeaves = Leave::orderBy('id', 'desc')->paginate();

        return response()->json( $allLeaves);
    }

    public function countLeave()
    {
        $countLeave = Leave::count();

        return response()->json([
            'total-leave' => $countLeave
        ]);
    }
}
