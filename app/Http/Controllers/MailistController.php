<?php

namespace App\Http\Controllers;

use Auth;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Http\Request;

class MailistController extends Controller
{
    private $api_key         = '723f90cfc64354e1dc5458e8af91d413-52cbfb43-875f8b0d';
    private $address = 'mailist@sandboxbcf622cd3a8f4e358c2669853f224590.mailgun.org';
    
    public function index()
    {
        $user = Auth::user();

        $subscribed = $user->mailist;

        if ($user->mailist == 1) {
            $subscribed = true;
        }
        return view('mailists.index', ['subscribed' => $subscribed ]);
    }

    public function send(Request $request)
    {
        // we can test use have value in index subscribe
        $user       = Auth::user();
        $subscribed = $user->mailist;
        $response = 'nothing';
        // subscribe -- 0 -> 1
        if ($request->mailist  == 'subscribed' && $subscribed != 1) {
            $user->mailist = 1;
            $user->save();
            $response = $this->toggleSubscribe($user, 'yes');
        }

        // Unsubsubscribed -- 1 -> 0
        if ($request->mailist  != 'subscribed' && $subscribed == 1) {
            $user->mailist = 1;
            $user->save();
            $response = $this->toggleSubscribe($user, 'no');
        }
        echo $response;
    }


    public function toggleSubscribe($user, $status)
    {
        $client     = new Client();
 
        $response = $client->post('https://api.mailgun.net/v3/lists/'.$this->address.'/members', [
            'auth' => [
                // username dan password pada mailgun
                'api', $this->api_key
            ],
            'form_params' => [
                'subscribed' => $status,
                'address'    => $user->email,
                'name'       => $user->name,
                'upsert'    => 'yes'
            ]
            ]);
        
        return $response->getBody()->getContents();
    }
}
