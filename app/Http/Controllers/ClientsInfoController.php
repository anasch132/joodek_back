<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientsInfo;
use Illuminate\Support\Facades\DB;

class ClientsInfoController extends Controller
{
    public function store(Request $request)
    {

        $checkMail = ClientsInfo::where('email', '=', $request->email)->get();

        if (count($checkMail) == 0) {
            $client = new ClientsInfo;

            $client->email = $request->email;
            $client->notifyOption = $request->notification;

            if ($client->save()) {
                return response()->json(['status' => 'success', 'message' => 'Subscribed successfully']);
            }
        } else {
            return response()->json(['status' => 'failed', 'message' => 'already subscribed']);
        }
    }


    public function update(Request $request)
    {
        $updatesub = ClientsInfo::where('email', '=', $request->email)->firstOrFail();
        try {
            $updatesub->notifyOption = '0';
            if ($updatesub->save())
                return response()->json(['status' => 'success', 'message' => 'Unsubscribed successfully', 'update' => $updatesub]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error occurred while processing your request', 'errorMessage' => $e]);
        }
    }
}
