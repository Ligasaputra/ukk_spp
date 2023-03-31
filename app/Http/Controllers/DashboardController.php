<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data = [
            'pembayaran' => Pembayaran::with(['siswa'])->orderBy('id', 'DESC')->paginate(15),
            'user' => User::find(auth()->User()->id)
         ];
        //  dd($data['pembayaran'][0]['siswa']['nama']);
        return view('dashboard.index', $data);
    }
}
