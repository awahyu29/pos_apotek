<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Task;
use App\Models\User;
use App\Models\Departement;
use App\Models\PaidLeave;
use App\Models\Overtime;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
            $salaries     = Salary::onlyTrashed()->count();
            $tasks        = Task::onlyTrashed()->count();
            $users        = User::onlyTrashed()->count();
            $departements = Departement::onlyTrashed()->count();
            $paidleaves   = PaidLeave::onlyTrashed()->count();
            $overtimes    = Overtime::onlyTrashed()->count();
            return view('trash.index', compact(
                'salaries','tasks','users','departements','paidleaves','overtimes'
            ));
    }

    public function listTrash($id)
    {
        if($id == 'users'){
            $users        = User::onlyTrashed()->get();
            return view('trash.usersTrash', compact(
                'users'
            ));
        } elseif ($id == 'salaries'){
            $salaries     = Salary::onlyTrashed()->get();
            return view('trash.salariesTrash', compact(
                'salaries'
            ));
        } elseif ($id == 'paidleaves'){
            $paidLeaves   = PaidLeave::onlyTrashed()->get();
            return view('trash.paidleavesTrash', compact(
                'paidLeaves'
            ));
        } elseif ($id == 'overtimes'){
            $overtimes    = Overtime::onlyTrashed()->get();
            return view('trash.overtimesTrash', compact(
                'overtimes'
            ));
        } elseif ($id == 'departements'){
            $departements = Departement::onlyTrashed()->get();
            return view('trash.departementsTrash', compact(
                'departements'
            ));
        } elseif ($id == 'tasks'){
            $tasks = Task::onlyTrashed()->get();
            return view('trash.tasksTrash', compact(
                'tasks'
            ));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreSalaries($id = null)
    {
        $salary = Salary::onlyTrashed();
        if($salary->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $salary->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $salary->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restored'
            ));
        }
    }
    public function deleteSalaries($id = null)
    {
        $salaries = Salary::onlyTrashed();
        if($salaries->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $salary = $salaries->where('id', $id)->first();
            $salary->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $salaries->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }

    public function restoreDepartements($id = null)
    {
        $departements = Departement::onlyTrashed();
        if($departements->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $departements->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $departements->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restored'
            ));
        }
    }
    public function deleteDepartements($id = null)
    {
        $departements = Departement::onlyTrashed();
        if($departements->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $departement = $departements->where('id', $id)->first();
            $departement->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $departements->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
                ));
            }
        }

    public function restoreUsers($id = null)
    {
        $user = User::onlyTrashed();
        if($user->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $user->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $user->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restored'
            ));
        }
    }
    public function deleteUsers($id = null)
    {
        $Users = User::onlyTrashed();
        if($Users->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $user = $Users->where('id', $id)->first();
            $user->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $Users->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }
    public function restoreTasks($id = null)
    {
        $task = Task::onlyTrashed();
        if($task->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $task->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $task->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restore!'
            ));
        }
    }
    public function deleteTasks($id = null)
    {
        $tasks = Task::onlyTrashed();
        if($tasks->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $task = $tasks->where('id', $id)->first();
            $task->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $tasks->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }

    public function restoreOvertimes($id = null)
    {
        $overtimes = Overtime::onlyTrashed();
        if($overtimes->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $overtimes->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $overtimes->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restore!'
            ));
        }
    }
    public function deleteOvertimes($id = null)
    {
        $overtimes = Overtime::onlyTrashed();
        if($overtimes->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $overtime = $overtimes->where('id', $id)->first();
            $overtime->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $overtimes->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }

    public function restorePaidLeaves($id = null)
    {
        $paidLeaves = PaidLeave::onlyTrashed();
        if($paidLeaves->count() == 0) {
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Trash is empty!'
                ));
        }

        if ($id != null) {
            $paidLeaves->where('id', $id)->restore();
            return response()
                ->json(array(
                    'success' => true,
                    'message' => 'Data has been succesfully restored'
                ));
        } else {
            $paidLeaves->restore();
            return response()
            ->json(array(
                'success' => true,
                'message' => 'All data has been succesfully restore!'
            ));
        }
    }
    public function deletePaidLeaves($id = null)
    {
        $paidLeaves = PaidLeave::onlyTrashed();
        if($paidLeaves->count() == 0){
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Clear',
                    'message' => 'Trash is empty!'
                ));
        }
        if ($id != null) {
            $paidLeave = $paidleaves->where('id', $id)->first();
            $paidLeave->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'Data have been permananetly deleted!'
            ));
        } else {
            $paidleaves->forceDelete();
            return response()
                ->json(array(
                    'success' => true,
                    'title'   => 'Deleted',
                    'message' => 'All data have been permananetly deleted!'
            ));
        }
    }
}
