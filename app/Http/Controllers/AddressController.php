<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function checkAddress(Request $request)
    {
        $fullAddress = implode('',$request->all());

        $separateAddress = explode(' ',$fullAddress);

        $addresses = [];
        $firstAddress = '';
        $secondAddress = '';
        $thirdAddress = '';

        foreach ($separateAddress as $i => $v) {
            if ($this->checkAddressLength($firstAddress)) {
                if ($this->checkAddressLength($firstAddress . $v . ' ')) {
                    $firstAddress = $firstAddress . $v . ' ';
                } else {
                    if ($this->checkAddressLength($secondAddress)) {
                        if ($this->checkAddressLength($secondAddress . $v . ' ')) {
                            $secondAddress = $secondAddress . $v . ' ';
                        } else {
                            if ($this->checkAddressLength($thirdAddress . $v . ' ')) {
                                $thirdAddress = $thirdAddress . $v . ' ';
                            }
                        }
                    }
                }

            }

        }

        $addresses['address_1'] = $firstAddress;
        $addresses['address_2'] = $secondAddress;
        $addresses['address_3'] = $thirdAddress;

        return $addresses;

    }

    private function checkAddressLength($string)
    {
        return strlen($string) <= 30;
    }
}
