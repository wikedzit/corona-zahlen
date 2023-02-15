<?php

namespace App\Http\Controllers;

use App\Models\CovidDeath;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class CovidDeathController extends Controller
{
    public function index(Request $request)
    {

        $days = $request->input('days') ?? 1;
        if (intval($days) <= 0) {
            $days = 1;
        }
        $date = Carbon::now()->subDays(intval($days))->format('Y-m-d');

        if (!CovidDeath::where('date','<=', $date)->exists()) {
            $url = "https://api.corona-zahlen.org/germany/history/deaths/{$days}";
            $response = Http::get($url);
            $data = $response->json()['data'];
            foreach ($data as $key => $item) {
                $data[$key]['date'] = Carbon::parse($item['date'])->format('Y-m-d');
            }
            CovidDeath::upsert($data, ['date']);
        }

        $data = CovidDeath::where('date','>=', $date)->orderBy('date', 'desc')->get();
        return view('deaths', [
            'data' => $data,
            'date' => $date,
        ]);
    }

}
