<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\MasseurDetails;
use Illuminate\Http\Request;
use App\Mail\ExpireNotification;

class MailController extends Controller
{
    /**
     * Send visa & passport expire notification emails
     */
    public function sendExpireNotifications()
    {
        $twoMonthsLater = now()->addMonths(2)->toDateString();
        $oneYearLater = now()->addMonths(12)->toDateString();

        $visas = MasseurDetails::with('masseur')
        ->whereDate('visa_expire', $twoMonthsLater)
        ->get()
        ->each(function ($item) {
            $item->expiration_type = 'visa';
        });

        $passports = MasseurDetails::with('masseur')
            ->whereDate('passport_expire', $oneYearLater)
            ->get()
            ->each(function ($item) {
                $item->expiration_type = 'passport';
            });

        $masseurs = $visas->merge($passports);

        foreach ($masseurs as $masseur) {
            Mail::to('your-email@example.com')->send(new ExpireNotification($masseur));
        }
    
        return 'Notifications sent!';
    }
}
