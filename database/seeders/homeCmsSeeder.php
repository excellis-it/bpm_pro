<?php

namespace Database\Seeders;
use App\Models\HomeCms;
use Illuminate\Database\Seeder;

class homeCmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $home = new HomeCms();
        $home->banner1_image = 'home/bpm_banner.jpg';
        $home->banner1_title = 'Quick Invoices';
        $home->banner1_subtitle = 'For Professionals On The Go';
        $home->banner2_image = 'home/bpm_banner.jpg';
        $home->banner2_title = 'Quick Invoices';
        $home->banner2_subtitle = 'For Professionals On The Go';
        $home->banner3_image = 'home/bpm_banner.jpg';
        $home->banner3_title = 'Quick Invoices';
        $home->banner3_subtitle = 'For Professionals On The Go';
        $home->body_title = 'Invoicing Made Simple';
        $home->body_section = "Create a Professional Profile With InvoiceTicket.com, you can easily set up a p rofile featuring your company information, logo, address, phone number, and email, ensuring that your invoices consistently reflect your brand. 
        Craft and Send Invoices with Ease Quickly create detailed invoices for your services, whether youre using your phone or personal PC. In just a few clicks, you can send these invoices directly from InvoiceTicket.com to your clients' email addresses. 
        PDF Invoices Delivered Straight to Your Clients Your clients will receive a polished, professional invoice in their in box, complete with a PDF version for their convenience and easy record-keeping. 
        Effortlessly Manage Your Invoice History InvoiceTicket.com lets you keep a running list of all the invoices you've sent, making it simple to reference past transactions and stay organized in your billing.";
        $home->footer_section = "InvoiceTicket.com is a free online invoicing platform for small to medium sized businesses. We help you create and send professional invoices to your clients in seconds. Create your first free invoice today!";
        $home->save();
    }
}
