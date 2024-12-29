<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grant;
use App\Models\Milestone;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Gate::allows('staffAdmin')){
            // Retrieve number of staff
        $totalStaff = User::where('userCategory', 'staff')->count();

        // Retrieve number of academician
        $totalAcademician = User::where('userCategory', 'academician')->count();

        $milestoneCounts = Milestone::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->pluck('total', 'status');

        // Ensure both statuses are represented in the data
        $data = [
            'Pending' => $milestoneCounts->get('Pending', 0),
            'Completed' => $milestoneCounts->get('Completed', 0),
        ];

        // Retrieve grant amounts grouped by grant provider
        $grantData = Grant::select('grant_provider', DB::raw('SUM(grant_amount) as total_amount'))
        ->groupBy('grant_provider')
        ->get();

        // Format data for the chart
        $labels = $grantData->pluck('grant_provider'); // E.g., ['Provider A', 'Provider B']
        $data_grant = $grantData->pluck('total_amount');     // E.g., [10000, 15000]

        $total_grants = Grant::count();
        $total_grants_amount = Grant::sum('grant_amount');
        
        return view('welcome', compact('total_grants', 'total_grants_amount', 'data', 'labels', 'data_grant', 'totalStaff', 'totalAcademician'));
        } else {
            $total_grants = Grant::whereHas('academicians', function ($query) {
                $query->where('user_id', Auth::id())
                      ->where('role', 'leader');
            })->count();

            $total_grants_member = Grant::whereHas('academicians', function ($query) {
                $query->where('user_id', Auth::id())
                      ->where('role', 'member');
            })->count();

                
            $completed_milestones = Milestone::whereHas('grant.academicians', function ($query) {
                $query->where('user_id', Auth::id());
            })->where('status', 'completed')->count();

            $pending_milestones = Milestone::whereHas('grant.academicians', function ($query) {
                $query->where('user_id', Auth::id());
            })->where('status', 'pending')->count();

            return view('welcome', compact('total_grants', 'total_grants_member', 'completed_milestones', 'pending_milestones'));
        }
        
    }
}
