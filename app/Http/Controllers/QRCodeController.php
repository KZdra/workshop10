<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QRCodeController extends Controller
{
    public function generateQRCode()
    {
        // Token dari environment
        $token = env('FONNTE_API_TOKEN');
        $whatsappNumber = env('FONNTE_PHONE_NUMBER');

        // Kirim permintaan HTTP menggunakan Laravel Http Client
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->asForm()->post('https://api.fonnte.com/qr', [
            'type' => 'qr',
            'whatsapp' => $whatsappNumber,
        ]);

        // Decode respon JSON
        $res = $response->json();

        // Cek apakah respon mengandung URL QR atau kode lainnya
        if (isset($res['url'])) {
            $qr = $res['url'];
            return view('qr.qr_code', ['qr' => $qr]);
        } elseif (isset($res['code'])) {
            return view('qr.qr_code', ['message' => $res['code']]);
        } else {
            return view('qr.qr_code', ['message' => $res['reason']]);
        }
    }
}
