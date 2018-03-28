<?php

namespace App\Http\Controllers;

use Christiaan\ZohoCRMClient\ZohoCRMClient;
use App\Http\Requests\SignupRequest;

class SignupController extends Controller
{
    public function store(SignupRequest $request)
    {
        $client = new ZohoCRMClient('Leads', config('services.zoho.key'));

        $insertRecordsRequest = $client->insertRecords()
            ->addRecord([
                'Email' => request('email'),
                'Last Name' => request('name'),
            ]);

        if (! config('services.zoho.allow_duplicates')) {
            $insertRecordsRequest->onDuplicateError();
        }

        $insertRecordsRequest->request();

        if (! request()->wantsJson()) {
            return redirect()->back();
        }

        return ['message' => 'success'];
    }
}
