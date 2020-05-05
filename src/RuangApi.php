<?php

namespace Daengweb\OngkosKirim;

class RuangApi {
	public function getProvinces($id = null)
    {
        $url = config('ruangapi.ruangapi_province') . '?id=' . $id;
        $results = $this->curlGet($url);
        if ($results['statusCode'] == 200) {
            return $results['data']['results'];
        }
        return [];
    }

    public function getCities($province_id = 1, $city_id = null, $q = null)
    {
        if (!is_null($province_id) && !is_int($province_id)) return 'Id Propinsi Harus Angka';
        if (!is_null($city_id) && !is_int($city_id)) return 'Id Kota/Kabupaten Harus Angka';

        $url = config('ruangapi.ruangapi_city') . '?province=' . $province_id . '&id=' . $city_id . '&q=' . $q;
        $results = $this->curlGet($url);
        if ($results['statusCode'] == 200) {
            return $results['data'];
        }
        return [];
    }

    public function getDistricts($city_id = 106, $id = null, $q = null)
    {
        if (!is_null($city_id) && !is_int($city_id)) return 'Id Kota/Kabupaten Harus Angka';
        if (!is_null($id) && !is_int($id)) return 'Id Kecamatan Harus Angka';

        $url = config('ruangapi.ruangapi_district') . '?city=' . $city_id . '&id=' . $id . '&q=' . $q;
        $results = $this->curlGet($url);
        if ($results['statusCode'] == 200) {
            return $results['data'];
        }
        return [];
    }

    public function getCost(array $data)
    {
        $url = config('ruangapi.ruangapi_shipping');
        $results = $this->curlPost($url, "origin=" . $data['origin'] . '&destination=' . $data['destination'] . '&weight=' . $data['weight'] . '&courier=' . $data['courier']);
        return $results;
    }

    private function curlGet($url) 
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: " . config('ruangapi.api_key')
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
        if (!$err) {
            return json_decode($response, true);
        }
    }

    private function curlPost($url, $payload) 
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "Authorization: " . config('ruangapi.api_key')
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
        if (!$err) {
            return json_decode($response, true);
        }
    }
}