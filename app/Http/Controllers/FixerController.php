<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FixerController extends Controller
{

    const UPDATE_TIME = 3600;

    public function form()
    {
        $data = Currency::orderBy('currency')
            ->get()
            ->pluck('currency')
            ->all();

        return view('fixer.form', [
            'data' => $data
        ]);
    }

    public function formSubmit(Request $request)
    {
        $currency = Currency::where('currency', $request->currency)->first();
        $updated = '';

        // Check if need to update

        if ($currency->time + self::UPDATE_TIME < time()) {

            $data = Http::acceptJson()
                ->get('http://data.fixer.io/api/latest', ['access_key' => env('FIXER_API')])
                ->json();

            // Currency table update

            $time = (int) time();
            foreach ($data['rates'] as $currency => $rate) {
                Currency::updateOrCreate(
                    ['currency' => $currency],
                    ['rate' => (float) $rate, 'time' => (int) $time]
                );
            }
            $currency = Currency::where('currency', $request->currency)->first();
            $updated = 'Currency rates updated';
        }

        if ($request->eur_value) {
            $eur = (float) $request->eur_value;
            $value = $currency->rate * $eur;
        } else {
            $value = (float) $request->value;
            $eur =  $value / $currency->rate;
        }

        return redirect()
            ->back()
            ->with('eur_value', $eur)
            ->with('value', $value)
            ->with('updated', $updated)
            ->with('currency', $currency->currency);

        // dd($data);
    }
}
