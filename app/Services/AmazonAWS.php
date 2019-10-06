<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class AmazonAWS
{
    private $s3;
    private $credentials;

    public function __construct()
    {
        $this->s3 = App::make('aws')->createClient('s3');
    }

    public function deleteObject()
    {
        return $this->s3->deleteObject([
                                    'Bucket' => env('AWS_BUCKET'),
                                    'Key'    => '',
                                ]);
    }
}
