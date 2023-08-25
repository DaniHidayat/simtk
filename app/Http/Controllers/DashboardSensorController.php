<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Exports\KunjunganExport;
use App\Models\Waterpump;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
use App\Http\Controllers\WebNotificationController;
class DashboardSensorController extends Controller
{

	public function __construct()
	{
		$this->middleware(function ($request, $next) {

			if (session('success')) {
				toast('Data Berhasil di Ubah!', 'success');
			}
			if (session('error')) {
				toast('Terjadi kesalahan', 'error');
			}

			return $next($request);
		});
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (auth()->guest()) {
			abort(403);
		}

		return view('dashboard.sensor.index', [

			'Device' => Device::orderBy('id','DESC')->get(),
		]);
	}
	private function whatsappNotification()
    {
        $sid    = "AC6e06c85e3c17a76b746fd76339cf1a6a";
        $token  = "73128d17121ec6fb1a0d4fba49fec1be";
        $wa_from= "+14155238886";

        $twilio = new Client($sid, $token);


        $body = "PH TERLALU RENDAH HARAP CEK LADANG ANDA";

        return $twilio->messages->create("whatsapp:+6285721134897",["from" => "whatsapp:$wa_from", "body" => $body]);
    }
	public function simpanSensor($id, $nilaiph, $nilaimoisture,$sensor_flowrate,$sensor_waterpressure,WebNotificationController $webNotificationController)
	{

	// Gunakan Query Builder untuk menyimpan data ke database
	DB::table('devices')->insert([
			'device_id' => $id,
			'sensor_ph' => $nilaiph,
			'sensor_moisture' => $nilaimoisture,
			'sensor_flowrate' => $sensor_flowrate,
			'sensor_waterpressure' => $sensor_waterpressure,
			// Kolom lainnya jika ada
	]);
		// $this->whatsappNotification();
		$response = $webNotificationController->sendNotification('Kering','Harus di siram');

    return response()->json(['message' => 'Sensor data stored successfully']);
}
	public function export_excel(Request $request)
	{

		$start = $request->awal;
		$end = $request->akhir;

		return (new KunjunganExport)->forDate($start, $end)->download('Laporan Kunjungan Dari ' . $start . ' Sampai ' . $end . '.xlsx');
		// return Excel::download((new KunjunganExport)->forYear($start), 'kunjungan.xlsx');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}
	public function check($id)
	{

		$item = Waterpump::where('code_waterpump', $id)->find(1);


		// Perform any necessary actions with the data here (e.g., update database
		// Return a response (if needed)
		if ( $item->status === 'true') {
		return "ON";
		}else{
			return "OFF";
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
