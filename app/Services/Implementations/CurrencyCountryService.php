<?php
namespace App\Services\Implementations;

use App\Contract\Responses\DefaultApiResponse;
use App\Models\Country;
use App\Models\Currency;
use App\Services\Interfaces\ICurrencyCountryService;

class CurrencyCountryService implements ICurrencyCountryService
{
    public DefaultApiResponse $response;
    public function __construct()
    {
        $this->response = new DefaultApiResponse();
    }
    
    public function getCurrencies(): DefaultApiResponse
    {
        $this->response->isSuccessful = true;
        $this->response->responseCode = '0';
        $this->response->data = Currency::latest()->filter(request(['search']))->paginate(10);
        return $this->response;
    }
    public function getCountries(): DefaultApiResponse
    {
        $this->response->isSuccessful = true;
        $this->response->responseCode = '0';
        $this->response->data = Country::latest()->filter(request(['search']))->paginate(10);
        return $this->response;
    }
}