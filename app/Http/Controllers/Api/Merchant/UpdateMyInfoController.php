<?php
namespace App\Http\Controllers\Api\Merchant;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Merchant\Merchant;
use Illuminate\Http\Request;

class UpdateMyInfoController extends Controller
{
    public function index()
    {
        $merchant = Merchant::where('merchant_id',session('id'))->first();
        return response()->json( ['success' => __('Fetched successfully!'), "record" => $merchant], 200); 
    }

    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($value === 'on') {
                $request[$key] = 1;
            } elseif ($value === 'off') {
                $request[$key] = 0;
            }
        }
        $merchant = Merchant::updateOrCreate(
            ['merchant_id' => session('id')],
            $request->only(
                'business_legal_name',
                'business_dba_name',
                'business_legal_address',
                'state_legal',
                'city_legal',
                'zip_legal',
                'business_physical_address',
                'zip_physical',
                'state_physical',
                'city_physical',
                'business_description',
                'first_name',
                'mi',
                'last_name',
                'telephone_number',
                'toll_free_number',
                'fax_number',
                'mobile_phone',
                'email_address',
                'federal_tax_id',
                'owner_partner',
                'ownership_first_name',
                'ownership_mi',
                'ownership_last_name',
                'ownership_ssn',
                'ownership_title',
                'ownership_telephone',
                'ownership_percentage',
                'ownership_dob',
                'ownership_home_address',
                'ownership_state',
                'ownership_city',
                'ownership_zip',
                'business_structure',
                'home_based_business',
                'num_employees',
                'sales_per_month',
                'tier1_merchant',
                'tier2_merchant',
                'tier3_merchant',
                'tier4_merchant_no',
                'bank_name',
                'bank_account_manager_fn',
                'bank_account_manager_ln',
                'bank_account_manager_address',
                'bank_account_manager_state',
                'bank_account_manager_city',
                'bank_account_manager_zipcode',
                'bank_account_manager_telephone_number',
                'bank_account_manager_email',
                'ein_number',
                'primary_line_of_business',
                'merchant_duns_number',
                'pos_estimated_number',
                'pos_manufacturer',
                'when',
                'use_pos',
                'third_party_vendor',
                'third_party_name',
                'third_party_version',
                'transactions_third_party',
                'third_party_name_transactions',
                'cardholder_data',
                'card_data_store_merchant',
                'card_data_store_third_party_only',
                'card_data_store_both',
                'pci_dss_compliant',
                'qsa_name',
                'compliance_date',
                'last_scan_date',
                'help_description'
            )
        );
   
        $admin = Admin::find(session('id'));
    
        if (empty($admin->guid)) {
         
            $random_bytes = random_bytes(32); // generates 16 random bytes
            $random_string = bin2hex($random_bytes);
            $guid =  'MUSA' . $this->get_state_abbriviation($request) . session('id') . $random_string;
          
            Admin::where('id', session('id'))->update(['guid' => $guid]);
        }

        return response()->json(['success' => true, 'message' => 'form submitted successfully', "record" => $merchant]);
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
       
            
            $state_name = $request->state_legal;
            if (!empty($state_name))
                $state_abbr = $states[$state_name];
        
        return $state_abbr;
    }
}
