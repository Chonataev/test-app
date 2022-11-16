<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iodev\Whois\Factory;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function checkDomain(Request $request)
    {
        $data = [];
        $params = explode(' ', $request['domains']);
        $whois = Factory::get()->createWhois();
        $domains = array_unique($params);

        foreach ( $domains as $domain )
        {
            if( $domain != '' )
            {
                if ($whois->isDomainAvailable($domain))
                {
                    $data[] = [
                        'status' => 'available',
                        'domain' => $domain,
                    ];
                }
                else
                {
                    $data[] = [
                        'status' => 'not available',
                        'domain' => $domain,
                    ];
                }
            }
        }

        return $data;
    }
}
