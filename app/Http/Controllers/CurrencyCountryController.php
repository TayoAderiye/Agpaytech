<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Contract\Responses\DefaultApiResponse;
use App\Services\Interfaces\ICurrencyCountryService;

class CurrencyCountryController extends Controller
{
    public DefaultApiResponse $response;
    public ICurrencyCountryService $ICurrencyCountryService;
    public function __construct(ICurrencyCountryService $ICurrencyCountryService)
    {
        $this->response = new DefaultApiResponse();
        $this->ICurrencyCountryService = $ICurrencyCountryService;

    }

    public function getCountries(): JsonResponse
    {
        try {
            $response = $this->ICurrencyCountryService->getCountries();
            if ($response->isSuccessful) {
                return response()->json($response, 200);
            }
            return response()->json($response, 400);
        } catch (\Exception $e) {
            $this->response->message = 'Processing Failed, Contact Support';
            $this->response->error = $e->getMessage();
            return response()->json($this->response, 500);
        }
    }

    public function getCurrencies(): JsonResponse
    {
        try {
            $response = $this->ICurrencyCountryService->getCurrencies();
            if ($response->isSuccessful) {
                return response()->json($response, 200);
            }
            return response()->json($response, 400);
        } catch (\Exception $e) {
            $this->response->message = 'Processing Failed, Contact Support';
            $this->response->error = $e->getMessage();
            return response()->json($this->response, 500);
        }
    }

}
