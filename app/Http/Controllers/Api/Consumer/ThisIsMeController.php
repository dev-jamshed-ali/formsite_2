<?php

namespace App\Http\Controllers\Api\Consumer;

use App\Http\Controllers\Controller;
use App\Mail\ConsumerThisIsMeMail;
use App\Models\Admin\Admin;
use App\Models\Admin\Consumer\AttestationInformation;
use App\Models\Admin\Consumer\ChargeCardInformation;
use App\Models\Admin\Consumer\DistinguishIdentifierInformation;
use App\Models\Admin\Consumer\EmploymentInformation;
use App\Models\Admin\Consumer\EthnicityInformation;
use App\Models\Admin\Consumer\FacialImageUpload;
use App\Models\Admin\Consumer\FamilyAndMedicalHistoryInformation;
use App\Models\Admin\Consumer\FindMeHere;
use App\Models\Admin\Consumer\GenderIdentityInformation;
use App\Models\Admin\Consumer\HairInformation;
use App\Models\Admin\Consumer\HeadAndFaceInformation;
use App\Models\Admin\Consumer\MedicalInformation;
use App\Models\Admin\Consumer\MyNeighborhoodInformation;
use App\Models\Admin\Consumer\MyPidegreeInformation;
use App\Models\Admin\Consumer\TravelInformation;
use App\Models\Admin\Consumer\TwinIdentifierInformation;
use App\Models\Admin\FieldsetReturnBackData;
use App\Models\Admin\LaborsCategories;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Support\Facades\Hash;

class ThisIsMeController extends Controller
{
    public function this_is_me()
    {

        $labor_cate_rows = LaborsCategories::where("parent_id", '0')->where("status", '1')->get();

        $consumer = Admin::with([
            'my_pidegree_info',
            'find_me_here',
            'gender_identity_info',
            'my_neighborhood_info',
            'employment_info',
            'charge_card_info',
            'family_and_medical_info',
            'this_is_me_return_back_data',
            'facial_image'
        ])->where('id', session('id'))->first(); //session('id')

        $my_pidegree_info = isset($consumer->my_pidegree_info) ? $consumer->my_pidegree_info : false;
        $find_me_here = isset($consumer->find_me_here) ? $consumer->find_me_here : false;
        $gender_identity_info = isset($consumer->gender_identity_info) ? $consumer->gender_identity_info : false;
        $ethnicity_info = isset($consumer->ethnicity_info) ? $consumer->ethnicity_info : false;
        $my_neighborhood_info = isset($consumer->my_neighborhood_info) ? $consumer->my_neighborhood_info : false;
        $employment_info = isset($consumer->employment_info) ? $consumer->employment_info : false;
        $charge_card_info = isset($consumer->charge_card_info) ? $consumer->charge_card_info : false;
        $head_and_face_info = isset($consumer->head_and_face_info) ? $consumer->head_and_face_info : false;
        $hair_info = isset($consumer->hair_info) ? $consumer->hair_info : false;
        $distinguish_identifier_info = isset($consumer->distinguish_identifier_info) ? $consumer->distinguish_identifier_info : false;
        $twin_identifier_info = isset($consumer->twin_identifier_info) ? $consumer->twin_identifier_info : false;
        $medical_info = isset($consumer->medical_info) ? $consumer->medical_info : false;
        $family_and_medical_info = isset($consumer->family_and_medical_info) ? $consumer->family_and_medical_info : false;
        $travel_info = isset($consumer->travel_info) ? $consumer->travel_info : false;
        $attestation_info = isset($consumer->attestation_info) ? $consumer->attestation_info : false;
        $facial_image = isset($consumer->facial_image) ? $consumer->facial_image : false;
        $this_is_me_return_back_data = isset($consumer->this_is_me_return_back_data) ? $consumer->this_is_me_return_back_data : false;

        $record = array(
            'my_pidegree_info' => $my_pidegree_info,
            'find_me_here' => $find_me_here,
            'gender_identity_info' => $gender_identity_info,
            'ethnicity_info' => $ethnicity_info,
            'my_neighborhood_info' => $my_neighborhood_info,
            'employment_info' => $employment_info,
            'charge_card_info' => $charge_card_info,
            'hair_info' => $hair_info,
            'head_and_face_info' => $head_and_face_info,
            'distinguish_identifier_info' => $distinguish_identifier_info,
            'twin_identifier_info' => $twin_identifier_info,
            'medical_info' => $medical_info,
            'family_and_medical_info' => $family_and_medical_info,
            'travel_info' => $travel_info,
            'attestation_info' => $attestation_info,
            'this_is_me_return_back_data' => $this_is_me_return_back_data,
            'facial_image' => $facial_image,
            'labor_cate_rows' => $labor_cate_rows,
        );

        return response()->json(['success' => __('Fetched successfully!'), "record" => $record], 200);
    }
    public function all_consumer(Request $request)
    {
        $address = FindMeHere::select('state', 'latitude', 'longitude', 'city', 'street_name', 'house_address', 'consumer_id')
            ->join('admins', 'find_me_here.consumer_id', '=', 'admins.id')
            ->where('state', $request->state)
            ->where('admins.form_completion', 1)
            ->get();

        return response()->json([
            'success' => __('Fetched successfully!'),
            'record' => $address
        ], 200);
    }

    public function get_state_abbriviation($request)
    {
        $states = array(
            'Alabama' => 'AL',
            'Alaska' => 'AK',
            'Arizona' => 'AZ',
            'Arkansas' => 'AR',
            'California' => 'CA',
            'Colorado' => 'CO',
            'Connecticut' => 'CT',
            'Delaware' => 'DE',
            'Florida' => 'FL',
            'Georgia' => 'GA',
            'Hawaii' => 'HI',
            'Idaho' => 'ID',
            'Illinois' => 'IL',
            'Indiana' => 'IN',
            'Iowa' => 'IA',
            'Kansas' => 'KS',
            'Kentucky' => 'KY',
            'Louisiana' => 'LA',
            'Maine' => 'ME',
            'Maryland' => 'MD',
            'Massachusetts' => 'MA',
            'Michigan' => 'MI',
            'Minnesota' => 'MN',
            'Mississippi' => 'MS',
            'Missouri' => 'MO',
            'Montana' => 'MT',
            'Nebraska' => 'NE',
            'Nevada' => 'NV',
            'New Hampshire' => 'NH',
            'New Jersey' => 'NJ',
            'New Mexico' => 'NM',
            'New York' => 'NY',
            'North Carolina' => 'NC',
            'North Dakota' => 'ND',
            'Ohio' => 'OH',
            'Oklahoma' => 'OK',
            'Oregon' => 'OR',
            'Pennsylvania' => 'PA',
            'Rhode Island' => 'RI',
            'South Carolina' => 'SC',
            'South Dakota' => 'SD',
            'Tennessee' => 'TN',
            'Texas' => 'TX',
            'Utah' => 'UT',
            'Vermont' => 'VT',
            'Virginia' => 'VA',
            'Washington' => 'WA',
            'West Virginia' => 'WV',
            'Wisconsin' => 'WI',
            'Wyoming' => 'WY',
        );
        $state_abbr = null;
        if (FindMeHere::where('consumer_id', $request->consumer_id)->exists()) {
            $find_me_here = FindMeHere::where('consumer_id', $request->consumer_id)->first();
            $state_name = $find_me_here->state;
            if (!empty($state_name))
                $state_abbr = $states[$state_name];
        }
        return $state_abbr;
    }
    public function get_consumer_by_location(Request $request)
    {
        $request->validate([
            'north' => 'required|numeric',
            'south' => 'required|numeric',
            'east' => 'required|numeric',
            'west' => 'required|numeric',
            'zoom' => 'required|integer|min:1|max:20',
        ]);
        if ($request->zoom < 10) {
            return response()->json(['success' => 'Zoom level too low', 'record' => []]);
        }
        $consumers = FindMeHere::select('state', 'latitude', 'longitude', 'city', 'street_name', 'house_address', 'consumer_id')
            ->whereBetween('latitude', [$request->south, $request->north])
            ->whereBetween('longitude', [$request->west, $request->east])
            ->get();
        return response()->json([
            'success' => 'Fetched successfully!',
            'record' => $consumers
        ]);
    }

}