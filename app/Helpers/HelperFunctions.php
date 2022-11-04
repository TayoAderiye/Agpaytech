<?php
namespace App\Helpers;

use App\Models\Country;
use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HelperFunctions
{
    public static function uploadCurrencyCSV()
    {
        $filename = '01-Currencies.csv';
        $location = 'uploads';
        $filepath = public_path($location . "/" . $filename);
        // Reading file
        $file = fopen($filepath, "r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);
            if ($i == 0) {
                $i++;
                continue;
            }
            for ($c = 0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
            }
                $i++;
            }
                fclose($file); //Close after reading
            $j = 0;
            foreach ($importData_arr as $importData) {
                $j++;
            try {
                DB::beginTransaction();
                Currency::create([
                    'iso_code' => $importData[0],
                    'iso_numeric_code' => $importData[1],
                    'common_name' => $importData[2],
                    'official_name' => $importData[3],
                    'symbol' => $importData[4]
                ]);

                 DB::commit();
                } catch (\Exception $e) {
                    //throw $th;
                    Log::info($e);
                    DB::rollBack();
                }
            }
    }


    public static function uploadCountryCSV(): array
    {
        Log::info("Started");
        $newArray = [];
        $filename = '02-Countries.csv';
        $location = 'uploads';
        $filepath = public_path($location . "/" . $filename);
        // Reading file
        $file = fopen($filepath, "r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata);
            if ($i == 0) {
                $i++;
                continue;
            }
            for ($c = 0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
            }
                $i++;
            }
                fclose($file); //Close after reading
            $j = 0;
            foreach ($importData_arr as $importData) {
                $j++;
            try {
                DB::beginTransaction();
                $newArray = Country::create([
                    'continent_code' => $importData[0],
                    'currency_code' => $importData[1],
                    'iso2_code' => $importData[2],
                    'iso3_code' => $importData[3],
                    'iso_numeric_code' => $importData[4],
                    'fips_code' => $importData[5],
                    'calling_code' => $importData[6],
                    'common_name' => $importData[7],
                    'official_name' => $importData[8],
                    'endonym' => $importData[9],
                    'demonym' => $importData[10]
                ]);


                 DB::commit();
                } catch (\Exception $e) {
                    //throw $th;
                    Log::info($e);
                    DB::rollBack();
                }
            }
            return $newArray;
    }
    
        
}

