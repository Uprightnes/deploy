<?php

namespace App\Http\Controllers;

use App\Models\Deploy;
use App\Mail\SendPDFMail;
use Illuminate\Support\Facades\Mail;

class sendmailController extends Controller
{
    public function sendmail($staffId)
    {
        try {
            // Retrieve redeployment data from the database
            $deploymails = Deploy::all(); // Ensure correct capitalization of the model name

            foreach ($deploymails as $deploymail) {
                $ccRecipients = [
                    $deploymail->newreportinglineemail,
                    $deploymail->newregionalmisemail,
                    // Add other recipients as needed
                ];

                // Filter out null or empty values
                $ccRecipients = array_filter($ccRecipients);

                // Prepare data for the email
                $data = [
                    'newrole' => $deploymail->newrole,
                    'newfeeder' => $deploymail->newfeeder,
                    'newregion' => $deploymail->newregion,
                    'newdepartment' => $deploymail->newdepartment,
                    'newreportinglinerole' => $deploymail->newreportinglinerole,
                    'newreportinglineemail' => $deploymail->newreportinglineemail,
                    'newregionalmisemail' => $deploymail->newregionalmisemail,
                    // Add other fields as needed
                ];

                // Send email
                Mail::to($deploymail->email)
                    ->cc($ccRecipients)
                    ->send(new SendPDFMail($data));
            }

            return "Redeployment emails sent successfully!";
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Error sending redeployment emails: ' . $e->getMessage());

            // Return an error response
            return "An error occurred while sending redeployment emails. Please try again later.";
        }
    }
}
