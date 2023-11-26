<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;
use App\Models\Donation;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public function callback()
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari donation berdasarkan id
        $donation = Donation::where('donation_code', $order_id)->first();

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $donation->status = 'PENDING';
                } else {
                    $donation->status = 'SUCCESS';
                }
            }
        } elseif ($status == 'settlement') {
            $donation->status = 'SUCCESS';
        } elseif ($status == 'pending') {
            $donation->status = 'PENDING';
        } elseif ($status == 'deny') {
            $donation->status = 'PENDING';
        } elseif ($status == 'expire') {
            $donation->status = 'CANCELLED';
        } elseif ($status == 'cancel') {
            $donation->status = 'CANCELLED';
        }

        // Simpan donasi
        $donation->save();

        // Return response untuk midtrans
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Success!'
            ]
        ]);
    }
}
