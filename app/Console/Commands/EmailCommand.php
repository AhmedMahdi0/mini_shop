<?php

namespace App\Console\Commands;

use App\Mail\VendorEmail;
use App\Mail\VendorEmailCommand;
use App\Models\Item;
use App\Models\Vendor;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:email {email?} {item-id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if($this->argument("email")!=null || $this->argument("email")!=""){
            try {
            $email = explode('=', $this->argument("email"));
            $vendor = Vendor::where('email', $email[1])->first();
                Mail::to($vendor->email)
                    ->cc("ahmed.h.b.mahdi@gmail.com")
                    ->queue(new VendorEmailCommand($vendor->first_name));
                $this->info('email was send');
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }

        }elseif ($this->argument("item-id")!=null || $this->argument("item-id")!=""){
            try {
            $item = explode('=', $this->argument("item-id"));
            $items= Item::where("id",$item[1])->first();
                foreach ($items->vendors as $vendor){
                    Mail::to($vendor->email)
                        ->cc("ahmed.h.b.mahdi@gmail.com")
                        ->queue(new VendorEmailCommand($vendor->first_name));
                    $this->info('email was send');
                }
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }
        }
    else{
            $vendors = Vendor::all();
            foreach ($vendors as $vendor){
                Mail::to($vendor->email)
                    ->cc("ahmed.h.b.mahdi@gmail.com")
                    ->queue(new VendorEmailCommand($vendor->first_name));
            }
        }
    }
}
