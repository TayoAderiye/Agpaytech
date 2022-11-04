<?php
namespace App\Services\Interfaces;

use App\Contract\Responses\DefaultApiResponse;

interface ICurrencyCountryService 
{
    public function getCurrencies(): DefaultApiResponse;
    public function getCountries(): DefaultApiResponse;
}