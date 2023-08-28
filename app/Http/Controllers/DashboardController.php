<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\ServiceType;
use App\Models\SubServiceType;
use App\Models\Surveyor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	function index()
	{


// ==========Arena Cart PH ==========//
// Hitung tanggal awal dan akhir dari minggu ini
$startDate = date('Y-m-d', strtotime('this week Monday'));
$endDate = date('Y-m-d', strtotime('this week Sunday'));

$chartData = Device::selectRaw('DATE(created_at) as date, avg(sensor_ph) as sum_ph')
    ->whereBetween('created_at', [$startDate, $endDate])
    ->groupBy('date')
    ->orderBy('date')
    ->get();

// Inisialisasi array data dan label untuk grafik
$data = [];
$labels = [];

// Inisialisasi hari dalam satu minggu
$daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

// Mengisi data dan label berdasarkan hasil kueri
foreach ($daysOfWeek as $day) {
    // Cek apakah ada data untuk tanggal tersebut dalam hasil kueri
    $dataPoint = $chartData->where('date', date('Y-m-d', strtotime("this week $day")))->first();

    if ($dataPoint) {
        // Jika ada data, masukkan total sum sensor_ph ke dalam array data
        $data[] = $dataPoint->sum_ph;
    } else {
        // Jika tidak ada data, masukkan 0 ke dalam array data
        $data[] = 0;
    }

    // Masukkan label hari ke dalam array labels
    $labels[] = $day;
}

// Hitung tanggal awal dan akhir dari minggu kemarin
$startDateKemarin = date('Y-m-d', strtotime('last week Monday'));
$endDateKemarin = date('Y-m-d', strtotime('last week Sunday'));

$chartDataKemarin = Device::selectRaw('DATE(created_at) as date, avg(sensor_ph) as sum_ph')
    ->whereBetween('created_at', [$startDateKemarin, $endDateKemarin])
    ->groupBy('date')
    ->orderBy('date')
    ->get();

// Inisialisasi array data dan label untuk grafik minggu kemarin
$dataKemarin = [];
$labelsKemarin = [];

// Inisialisasi hari dalam satu minggu
$daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

// Mengisi data dan label berdasarkan hasil kueri minggu kemarin
foreach ($daysOfWeek as $day) {
    // Cek apakah ada data untuk tanggal tersebut dalam hasil kueri minggu kemarin
    $dataPointKemarin = $chartDataKemarin->where('date', date('Y-m-d', strtotime("last week $day")))->first();

    if ($dataPointKemarin) {
        // Jika ada data, masukkan total sum sensor_ph ke dalam array data minggu kemarin
        $dataKemarin[] = $dataPointKemarin->sum_ph;
    } else {
        // Jika tidak ada data, masukkan 0 ke dalam array data minggu kemarin
        $dataKemarin[] = 0;
    }

    // Masukkan label hari ke dalam array labels minggu kemarin
    $labelsKemarin[] = $day;
}

// ==========Line Cart Kelembaban ==========//
// Hitung tanggal awal dan akhir dari minggu ini
$startDateM = date('Y-m-d', strtotime('this week Monday'));
$endDateM = date('Y-m-d', strtotime('this week Sunday'));

$chartDataM = Device::selectRaw('DATE(created_at) as date, avg(sensor_moisture) as sum_moisture')
    ->whereBetween('created_at', [$startDateM, $endDateM])
    ->groupBy('date')
    ->orderBy('date')
    ->get();

// Inisialisasi array data dan label untuk grafik
$dataM = [];
$labelsM = [];

// Inisialisasi hari dalam satu minggu
$daysOfWeekM = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

// Mengisi data dan label berdasarkan hasil kueri
foreach ($daysOfWeekM as $day) {
    // Cek apakah ada data untuk tanggal tersebut dalam hasil kueri
    $dataPointM = $chartDataM->where('date', date('Y-m-d', strtotime("this week $day")))->first();

    if ($dataPointM) {
        // Jika ada data, masukkan total sum sensor_ph ke dalam array data
        $dataM[] = $dataPointM->sum_moisture;
    } else {
        // Jika tidak ada data, masukkan 0 ke dalam array data
        $dataM[] = 0;
    }

    // Masukkan label hari ke dalam array labels
    $labelsM[] = $day;
}

// Hitung tanggal awal dan akhir dari minggu kemarin
$startDateKemarinM = date('Y-m-d', strtotime('last week Monday'));
$endDateKemarinM = date('Y-m-d', strtotime('last week Sunday'));

$chartDataKemarinM = Device::selectRaw('DATE(created_at) as date, avg(sensor_moisture) as sum_moisture')
    ->whereBetween('created_at', [$startDateKemarinM, $endDateKemarinM])
    ->groupBy('date')
    ->orderBy('date')
    ->get();

// Inisialisasi array data dan label untuk grafik minggu kemarin
$dataKemarinM = [];
$labelsKemarinM = [];

// Inisialisasi hari dalam satu minggu
$daysOfWeekM = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

// Mengisi data dan label berdasarkan hasil kueri minggu kemarin
foreach ($daysOfWeekM as $day) {
    // Cek apakah ada data untuk tanggal tersebut dalam hasil kueri minggu kemarin
    $dataPointKemarinM = $chartDataKemarinM->where('date', date('Y-m-d', strtotime("last week $day")))->first();

    if ($dataPointKemarinM) {
        // Jika ada data, masukkan total sum sensor_ph ke dalam array data minggu kemarin
        $dataKemarinM[] = $dataPointKemarinM->sum_moisture;
    } else {
        // Jika tidak ada data, masukkan 0 ke dalam array data minggu kemarin
        $dataKemarinM[] = 0;
    }

    // Masukkan label hari ke dalam array labels minggu kemarin
    $labelsKemarinM[] = $day;
}


				// ==========Bar Cart Air ==========//
				// Hitung tanggal awal dan akhir dari minggu ini
				$startDateB = date('Y-m-d', strtotime('this week Monday'));
				$endDateB = date('Y-m-d', strtotime('this week Sunday'));

				$chartDataB = Device::selectRaw('DATE(created_at) as date, SUM(sensor_flowrate) as sum_flowrate')
						// ->whereBetween('created_at', [$startDateB, $endDateB])
						->groupBy('date')
						->orderBy('date')
						->get();

				// Inisialisasi array data dan label untuk grafik
				$dataB = [];
				$labelsB = [];

				// Inisialisasi hari dalam satu minggu
				$daysOfWeekB = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

				// Mengisi data dan label berdasarkan hasil kueri
				foreach ($daysOfWeekB as $day) {
						// Cek apakah ada data untuk tanggal tersebut dalam hasil kueri
						$dataPointB = $chartDataB->where('date', date('Y-m-d', strtotime("this week $day")))->first();

						if ($dataPointB) {
								// Jika ada data, masukkan total sum sensor_ph ke dalam array data
								$dataB[] = $dataPointB->sum_flowrate;
						} else {
								// Jika tidak ada data, masukkan 0 ke dalam array data
								$dataB[] = 0;
						}

						// Masukkan label hari ke dalam array labels
						$labelsB[] = $day;
				}


				// Hitung tanggal awal dan akhir dari minggu kemarin
				$startDateKemarinB = date('Y-m-d', strtotime('last week Monday'));
				$endDateKemarinB = date('Y-m-d', strtotime('last week Sunday'));

				$chartDataKemarinB = Device::selectRaw('DATE(created_at) as date, SUM(sensor_waterpressure) as sum_waterpressure')
						// ->whereBetween('created_at', [$startDateKemarinB, $endDateKemarinB])
						->groupBy('date')
						->orderBy('date')
						->get();

				// Inisialisasi array data dan label untuk grafik minggu kemarin
				$dataKemarinB = [];
				$labelsKemarinB = [];

				// Inisialisasi hari dalam satu minggu
				$daysOfWeekB = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

				// Mengisi data dan label berdasarkan hasil kueri minggu kemarin
				foreach ($daysOfWeekB as $day) {
						// Cek apakah ada data untuk tanggal tersebut dalam hasil kueri minggu kemarin
						$dataPointKemarinB = $chartDataKemarinB->where('date', date('Y-m-d', strtotime("this week $day")))->first();

						if ($dataPointKemarinB) {
								// Jika ada data, masukkan total sum sensor_ph ke dalam array data minggu kemarin
								$dataKemarinB[] = $dataPointKemarinB->sum_waterpressure;
						} else {
								// Jika tidak ada data, masukkan 0 ke dalam array data minggu kemarin
								$dataKemarinB[] = 0;
						}

						// Masukkan label hari ke dalam array labels minggu kemarin
						$labelsKemarinB[] = $day;
				}





		// dd($data);
		return view('dashboard.index', [

			//ph
			'data' => $data,
			'labels'=> $labels,
			'dataKemarin' => $dataKemarin,
			'labelsKemarin'=> $labelsKemarin,
			//kelembaban
			'dataM' => $dataM,
			'labelsM'=> $labelsM,
			'dataKemarinM' => $dataKemarinM,
			'labelsKemarinM'=> $labelsKemarinM,
			// Air
			'dataB' => $dataB,
			'labelsB'=> $labelsB,
			'dataKemarinB' => $dataKemarinB,
			'labelsKemarinB'=> $labelsKemarinB,
			'Device' => Device::orderBy('id','DESC')->get(),
		]);
	}

}
