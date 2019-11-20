<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function saveImg($request, $object)
    {
        $url = 'https://' . env('AWS_BUCKET') . '.s3-' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/';
        $file = $request->file('image');
        $name = time() . $file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        $object->update([
            "image" => $url . $filePath,
        ]);
    }

    /**
     * Retorna spents para o grafico
     * @param $historySpents
     * @return string
     */
    public function dataMap($historySpents)
    {
        try {
            $valueMap = [];
            for ($i = 1; $i <= 12; $i++) {
                $valueMap[$i] = 0;
            }
            foreach ($historySpents as $spentHistory) {
                if ($spentHistory->month == $i) {
                    $valueMap[$i] += $spentHistory->total;
                }
                $valueMap[$spentHistory->month] = $spentHistory->total;
            }
            return $valuesMap = implode(',', $valueMap);
        } catch (Exception $e) {
            report($e);
        }
    }

    public function sortDate($string)
    {
        //"2019-10-30"
        $arr = explode('-', $string);
        $h = sort($arr);
        $clength = count($arr);
        for ($x = 0; $x < $clength; $x++) {
            $d[] = $arr[$x];
        }
        $str = $arr[1] . '/' . $arr[0] . '/' . $arr[2];
        return $str;
    }
}
