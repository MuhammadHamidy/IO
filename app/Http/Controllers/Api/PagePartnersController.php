<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePartners;
use Illuminate\Support\Facades\Storage;

class PagePartnersController extends Controller
{
    public function index(){
        $pagePartners = PagePartners::orderBy('created_at', 'desc')->get();
        
        return view('page-partners', compact('pagePartners'));
    }

    public function showPartners(){
        $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
        $continents = $this->getContinents();
        
        
        $pagePartners = PagePartners::where('status', 'published')
            ->orderBy('country', 'asc')
            ->get()
            ->groupBy(function($partner) use ($countries, $continents) {
                
                $countryName = $countries[$partner->country] ?? $partner->country;
                return $this->getContinent($countryName, $continents);
            });
        
        return view('international-collaboration', compact('pagePartners', 'continents'));
    }

    public function partnersByRegion(){
        $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
        $continents = $this->getContinents();
        
        $pagePartners = PagePartners::where('status', 'published')
            ->orderBy('country', 'asc')
            ->get()
            ->groupBy(function($partner) use ($countries, $continents) {
                $countryName = $countries[$partner->country] ?? $partner->country;
                return $this->getContinent($countryName, $continents);
            });
        
        return view('partners-by-region', compact('pagePartners', 'continents'));
    }

    private function getContinents() {
        return [
            'Southeast Asia' => ['Indonesia', 'Malaysia', 'Singapore', 'Thailand', 'Vietnam', 'Philippines', 'Brunei', 'Myanmar', 'Cambodia', 'Laos', 'Timor-Leste'],
            'Europe and Russia' => ['Russia', 'France', 'Germany', 'Italy', 'Spain', 'Poland', 'Romania', 'Netherlands', 'Belgium', 'Greece', 'Czech Republic', 'Portugal', 'Hungary', 'Sweden', 'Austria', 'Switzerland', 'Bulgaria', 'Denmark', 'Finland', 'Slovakia', 'Norway', 'Ireland', 'Croatia', 'Lithuania', 'Slovenia', 'Latvia', 'Estonia', 'Cyprus', 'Luxembourg', 'Malta', 'Iceland', 'Albania', 'Montenegro', 'North Macedonia', 'Serbia', 'Bosnia and Herzegovina', 'Kosovo', 'Moldova', 'Ukraine', 'Belarus'],
            'East and Central Asia' => ['China', 'Japan', 'South Korea', 'Mongolia', 'Kazakhstan', 'Kyrgyzstan', 'Tajikistan', 'Turkmenistan', 'Uzbekistan'],
            'America' => ['United States', 'Canada', 'Mexico', 'Brazil', 'Argentina', 'Colombia', 'Venezuela', 'Peru', 'Chile', 'Ecuador', 'Guatemala', 'Cuba', 'Haiti', 'Bolivia', 'Dominican Republic', 'Honduras', 'Paraguay', 'Nicaragua', 'El Salvador', 'Costa Rica', 'Panama', 'Uruguay', 'Jamaica', 'Trinidad and Tobago', 'Guyana', 'Suriname', 'Belize', 'Bahamas', 'Barbados', 'Saint Lucia', 'Grenada', 'Saint Vincent and the Grenadines', 'Antigua and Barbuda', 'Dominica', 'Saint Kitts and Nevis'],
            'Middle East' => ['United Arab Emirates', 'Saudi Arabia', 'Iraq', 'Iran', 'Israel', 'Jordan', 'Lebanon', 'Oman', 'Qatar', 'Kuwait', 'Bahrain', 'Yemen', 'Syria', 'Palestine'],
            'Africa' => ['Algeria', 'Angola', 'Benin', 'Botswana', 'Burkina Faso', 'Burundi', 'Cameroon', 'Cape Verde', 'Central African Republic', 'Chad', 'Comoros', 'Congo', 'Democratic Republic of the Congo', 'Djibouti', 'Egypt', 'Equatorial Guinea', 'Eritrea', 'Ethiopia', 'Gabon', 'Gambia', 'Ghana', 'Guinea', 'Guinea-Bissau', 'Ivory Coast', 'Kenya', 'Lesotho', 'Liberia', 'Libya', 'Madagascar', 'Malawi', 'Mali', 'Mauritania', 'Mauritius', 'Mayotte', 'Morocco', 'Mozambique', 'Namibia', 'Niger', 'Nigeria', 'Réunion', 'Rwanda', 'Saint Helena', 'São Tomé and Príncipe', 'Senegal', 'Seychelles', 'Sierra Leone', 'Somalia', 'South Africa', 'South Sudan', 'Sudan', 'Eswatini', 'Tanzania', 'Togo', 'Tunisia', 'Uganda', 'Western Sahara', 'Zambia', 'Zimbabwe'],
            'Australia and Oceania' => ['Australia', 'New Zealand', 'Fiji', 'Papua New Guinea', 'Solomon Islands', 'Vanuatu', 'New Caledonia', 'French Polynesia', 'Samoa', 'Kiribati', 'Tonga', 'Tuvalu', 'Nauru', 'Federated States of Micronesia', 'Marshall Islands', 'Palau', 'Cook Islands', 'Niue', 'Tokelau']
        ];
    }

    private function getContinent($country, $continents) {
        foreach ($continents as $continent => $countries) {
            if (in_array($country, $countries)) {
                return $continent;
            }
        }
        return 'Other';
    }

    public function detail($id) {
      $pagePartner = PagePartners::where('id', $id)->where('status', 'published')->first();
      
      if (!$pagePartner) {
        return redirect()->route('global-network')->with('error', 'Partner not found or not available.');
      }
      
      // Handle description
      if($pagePartner->description && is_string($pagePartner->description)) {
        $pagePartner->description = explode("\r\n", $pagePartner->description);
      } else if(!$pagePartner->description) {
        $pagePartner->description = [];
      }

      // Handle english proficiency
      if($pagePartner->english_profiency && is_string($pagePartner->english_profiency)) {
        $pagePartner->english_profiency = explode("\r\n", $pagePartner->english_profiency);
      } else if(!$pagePartner->english_profiency) {
        $pagePartner->english_profiency = [];
      }

      // Handle eligible department
      if($pagePartner->eligible_departement && is_string($pagePartner->eligible_departement)) {
        $pagePartner->eligible_departement = explode("\r\n", $pagePartner->eligible_departement);
      } else if(!$pagePartner->eligible_departement) {
        $pagePartner->eligible_departement = [];
      }

      // Handle study period
      if($pagePartner->study_periode && is_string($pagePartner->study_periode)) {
        $pagePartner->study_periode = explode("\r\n", $pagePartner->study_periode);
      } else if(!$pagePartner->study_periode) {
        $pagePartner->study_periode = [];
      }
      
      // Handle partnership type
      if($pagePartner->partnership_type && is_string($pagePartner->partnership_type)) {
        $pagePartner->partnership_type = explode(",", $pagePartner->partnership_type);
        $pagePartner->partnership_type = array_map('trim', $pagePartner->partnership_type);
      } else if(!$pagePartner->partnership_type) {
        $pagePartner->partnership_type = [];
      }
      
      // Handle cooperation fields
      if($pagePartner->cooperation_fields && is_string($pagePartner->cooperation_fields)) {
        $pagePartner->cooperation_fields = explode(",", $pagePartner->cooperation_fields);
        $pagePartner->cooperation_fields = array_map('trim', $pagePartner->cooperation_fields);
      } else if(!$pagePartner->cooperation_fields) {
        $pagePartner->cooperation_fields = [];
      }

      return view('detail-partners', [
        'pagePartner' => $pagePartner
      ]);
    }

    public function create(){
        $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
        return view('regist-partners', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'regional' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required|string|max:255',
            'address' => 'nullable|required|string',
            'description' => 'nullable|string',
            'english_profiency' => 'nullable|string',
            'eligible_departement' => 'nullable|string',
            'study_periode' => 'nullable|string',
            'fact_sheet' => 'nullable|mimes:pdf',
            'partnership_start_date' => 'nullable|date',
            'partnership_end_date' => 'nullable|date|after_or_equal:partnership_start_date',
            'cooperation_fields' => 'nullable|string',
            'partnership_type' => 'nullable|string',
            'contact_person' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
        ]);

        try {
            $logoPath = '';
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
            }

            $filePath = '';
            if ($request->hasFile('fact_sheet')) {
              $filePath = $request->file('fact_sheet')->store('fact_sheet', 'public');
            }

            PagePartners::create([
                'name' => $request->name,
                'regional' => $request->regional,
                'website' => $request->website,
                'logo' => $logoPath,
                'country' => $request->country,
                'address' => $request->address,
                'description' => $request->description,
                'english_profiency' => $request->english_profiency,
                'eligible_departement' => $request->eligible_departement,
                'study_periode' => $request->study_periode,
                'fact_sheet' => $filePath,
                'partnership_start_date' => $request->partnership_start_date,
                'partnership_end_date' => $request->partnership_end_date,
                'cooperation_fields' => $request->cooperation_fields,
                'partnership_type' => $request->partnership_type,
                'contact_person' => $request->contact_person,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
            ]);

            return redirect()->route('page-partners')->with('success', 'Partner created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Partner creation failed: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $pagePartners = PagePartners::findOrFail($id);
        $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
        return view('partners-update', compact('pagePartners', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'regional' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'required|string|max:255',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'english_profiency' => 'nullable|string',
            'eligible_departement' => 'nullable|string',
            'study_periode' => 'nullable|string',
            'fact_sheet' => 'nullable|mimes:pdf',
            'partnership_start_date' => 'nullable|date',
            'partnership_end_date' => 'nullable|date|after_or_equal:partnership_start_date',
            'cooperation_fields' => 'nullable|string',
            'partnership_type' => 'nullable|string',
            'contact_person' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
        ]);

        try {
            $pagePartners = PagePartners::findOrFail($id);

            $logoPath = $pagePartners->logo;
            $factSheetPath = $pagePartners->fact_sheet;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
            }

            if ($request->hasFile('fact_sheet')) {
              $factSheetPath = $request->file('fact_sheet')->store('fact_sheet', 'public');
            }

            $pagePartners->update([
                'name' => $request->name,
                'regional' => $request->regional,
                'website' => $request->website,
                'logo' => $logoPath,
                'country' => $request->country,
                'address' => $request->address,
                'description' => $request->description,
                'english_profiency' => $request->english_profiency,
                'eligible_departement' => $request->eligible_departement,
                'study_periode' => $request->study_periode,
                'fact_sheet' => $factSheetPath,
                'partnership_start_date' => $request->partnership_start_date,
                'partnership_end_date' => $request->partnership_end_date,
                'cooperation_fields' => $request->cooperation_fields,
                'partnership_type' => $request->partnership_type,
                'contact_person' => $request->contact_person,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
            ]);

            return redirect()->route('page-partners')->with('success', 'Partner updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Partner update failed: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pagePartners = PagePartners::findOrFail($id);
            if ($pagePartners->logo) {
                Storage::disk('public')->delete($pagePartners->logo);
            }
            $pagePartners->delete();
            return redirect()->route('page-partners')->with('success', 'Partner deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Partner deletion failed: ' . $e->getMessage());
        }
    }
}