<?php

namespace App\Http\Controllers\Plan;

use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\SdkNicoPay\Main\NicoPay;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
	public $sdk;

	public function __construct()
    {
        $this->sdk = new NicoPay(env('NICO_PAY_API_KEY'));
    }
	public function index()
    {
        $plans = Plan::all();

        return Inertia::render('Plan/Index', [
            'plans' => $plans
        ]);
    }

    public function create()
    {
        return Inertia::render('Plan/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
			'frequency' => 'required|string'
        ]);
		$data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
			'frequency' => $request->input('frequency')
        ];

        $plan = Plan::create($data);
        return redirect()->route('Plans.index');
    }

    public function show(Plan $plan)
    {
        return Inertia::render('Plan/Show', [
            'plan' => $plan,
        ]);
    }

    public function edit(Plan $plan)
    {
        return Inertia::render('Plan/Edit', [
            'plan' => $plan,
        ]);
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $plan->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('Plans.index');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('Plans.index');
    }
}
