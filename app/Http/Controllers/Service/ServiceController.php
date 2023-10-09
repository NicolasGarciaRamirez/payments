<?php

namespace App\Http\Controllers\Service;

use Inertia\Inertia;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SdkNicoPay\Main\NicoPay;

class ServiceController extends Controller
{
	public $sdk;

	public function __construct()
    {
        $this->sdk = new NicoPay(env('NICO_PAY_API_KEY'));
    }
    public function index()
    {
        $services = Service::all();

        return Inertia::render('Service/Index', [
            'services' => $services,
        ]);
    }

    public function create()
    {
        return Inertia::render('Service/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
		$data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ];
        $service = Service::create($data);
        return redirect()->route('Services.index');
    }

    public function show(Service $service)
    {
        return Inertia::render('Service/Show', [
            'service' => $service,
        ]);
    }

    public function edit(Service $service)
    {
        return Inertia::render('Service/Edit', [
            'service' => $service,
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('Services.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('Services.index');
    }
}
