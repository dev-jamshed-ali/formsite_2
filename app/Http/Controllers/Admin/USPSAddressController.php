<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class USPSAddressController extends Controller
{

    public function validateAddress(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://secure.shippingapis.com/ShippingAPI.dll', [
            'query' => [
                '<AddressValidateRequest USERID="011GINIC2185">
                        <Address ID="0">
                            <Address1>'.($request->house_no ? $request->house_no.' ' : '').($request->building_name ? $request->building_name.' ' : '').($request->street_name ? $request->street_name : '').'</Address1>
                            <Address2>'.($request->township ? $request->township.' ' : '').($request->parish ? $request->parish.' ' : '').($request->village ? $request->village.' ' : '').($request->hamlet ? $request->hamlet.' ' : '').($request->district ? $request->district.' ' : '').'</Address2>
                            <City>'.$request->city.'</City>
                            <State>'.$request->state.'</State>
                            <Zip5>'.$request->zipcode.'</Zip5>
                            <Zip4></Zip4>
                        </Address>
                    </AddressValidateRequest>'
            ],
           
        ]);

        $xml = simplexml_load_string($response->getBody()->getContents());
        $result = json_decode(json_encode((array)$xml), TRUE);
        if(isset($result['Address']))
        {
            $result['valid'] = true;
        }else{
            $result['valid']  = false;
        }
        

        // Return the validated address as JSON
        return response()->json($result);
    }
}
