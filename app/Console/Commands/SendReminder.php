<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SendReminder extends Command
{
    protected $signature = 'send:reminder';
    protected $description = 'Send reminder to customers every 2 months';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $transactions = DB::table('transactions')
            ->join('customers', 'transactions.customer_id', '=', 'customers.id')
            ->select('customers.id', 'customers.nama', 'customers.no_telp', 'transactions.created_at')
            ->get()
            ->groupBy('id');

        foreach ($transactions as $customerId => $customerTransactions) {
            $reminderDate = Carbon::parse($customerTransactions->first()->created_at)->addMinutes(1);

            // Debugging: Print information about each customer
            $this->info("Customer ID: $customerId, Nama: {$customerTransactions->first()->nama}, No. Telp: {$customerTransactions->first()->no_telp}");

            if (Carbon::now()->gte($reminderDate)) {
                $message = 'Waktunya untuk kembali ke bengkel untuk pengecekan rutin.';
                $this->sendReminder($customerTransactions->first()->no_telp, $message);
            }
        }

        $this->info('Reminders have been sent successfully!');
    }
    private function sendReminder($phone, $message)
    {
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_TOKEN'),
        ])->post('https://api.fonnte.com/send', [
            'target' => $phone,
            'message' => $message,
            'countryCode' => '62',
        ]);

        return $response->successful();
    }
}
