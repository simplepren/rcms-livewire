<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Peminjaman;
use App\Models\Ruangarsip;
use App\Models\Recordscenter;
use GuzzleHttp\Client;

class Index extends Component
{
    public function render()
    {
        $jam = date('H');
        $esign = User::where('id', auth()->user()->id)->first()->esign;
        $rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();
        $ruangan = Ruangarsip::where('kode_uk', auth()->user()->kode_uk)->get();
        $rak = Rakarsip::where('kode_uk', auth()->user()->kode_uk)->get();
        $progress = (($esign ? 1 : 0) + ($rc->count() > 0 ? 1 : 0) + ($ruangan->count() > 0 ? 1 : 0) + ($rak->count() > 0 ? 1 : 0)) / 4 * 100;
        $jml_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)->where('status_musnah', 0)->count();
        $jml_peminjaman = Peminjaman::where('kode_uk', auth()->user()->kode_uk)->count();
        // $weather = json_decode($this->getWeather(), true);
        //$weather = json_decode($this->getWeatherTwo(), true);

        return view('livewire.dashboard.index', [
            'esign' => $esign,
            'rc' => $rc,
            'ruangan' => $ruangan,
            'rak' => $rak,
            'progress' => $progress,
            'jml_berkas' => $jml_berkas,
            'jml_peminjaman' => $jml_peminjaman,
            // 'weather' => $weather,
            'jam' => $jam
        ]);
    }

    public function scanBerkas()
    {
        $this->dispatch('redirect', ['url' => '/scan-berkas']);
    }

    public function getWeatherOne() // from https://rapidapi.com/developer/analytics/default-application_6720763
    {
        $client = new Client();
        $response = $client->request('GET', 'https://weatherapi-com.p.rapidapi.com/current.json?q=-6.2370085%2C106.8055516', [
            'headers' => [
                'x-rapidapi-host' => 'weatherapi-com.p.rapidapi.com',
                'x-rapidapi-key' => '9db77c3616msh7f34b9546adf86dp1f68fajsnd9810bd33edd',
            ],
        ]);
        return $response->getBody()->getContents();
    }

    public function getWeatherTwo() // from open-meteo.com for Jakarta
    {
        $source = "https://api.open-meteo.com/v1/forecast?latitude=-6.1818&longitude=106.8223&minutely_15=temperature_2m,relative_humidity_2m&hourly=temperature_2m,relative_humidity_2m,rain,direct_radiation,diffuse_radiation,direct_normal_irradiance&timezone=Asia%2FBangkok";
        $response = file_get_contents($source);
        return $response;
    }
}
