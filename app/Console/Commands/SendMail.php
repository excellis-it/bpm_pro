<?php

namespace App\Console\Commands;

use App\Mail\InvoiceMail;
use App\Models\File;
use App\Models\Invoice;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $invoices = Invoice::where(['send_in'=> date('Y-m-d'), 'send_in_status'=>1])->get();
        foreach ($invoices as $key => $value) {
            $invoice = Invoice::where('id', $value->id)->first();
            if ($invoice->send_id == 2) {
                    // Given date: 2023-08-11
                $givenDate = $value['send_in'];

                // Convert the given date to a Carbon instance
                $carbonDate = Carbon::parse($givenDate);

                // Add one week to the date
                $dateAfterOneWeek = $carbonDate->addWeek();

                // Format the date as needed (optional)
                $formattedDate = $dateAfterOneWeek->format('Y-m-d');

                $invoice->update(['send_in' =>  $formattedDate]);


            } else {
                // Given date: 2023-08-11
                $givenDate = $value['send_in'];

                // Convert the given date to a Carbon instance
                $carbonDate = Carbon::parse($givenDate);

                // Add one week to the date
                $dateAfterOneWeek = $carbonDate->addMonth();

                // Format the date as needed (optional)
                $formattedDate = $dateAfterOneWeek->format('Y-m-d');

                $invoice->update(['send_in' =>  $formattedDate]);
            }
            $items = Item::where('invoice_id', $invoice->id)->get();
            $file = File::where('invoice_id', $invoice->id)->first();
            $invoice_number = 'BPM-'.rand(0000000,99999999);
            $maildata = [
                'id' => $invoice->id,
                'invoice_detail' => $invoice,
                'items' => $items,
                'pdf_file' => $file['file'] ?? '',
                'invoice_id' => $invoice_number
            ];
    
            Mail::to($invoice->bil_to_email)->send(new InvoiceMail($maildata));
        }

        $this->info('Auto cancellation of booking has been done.');
    }
}
