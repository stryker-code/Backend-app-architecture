<?php 

class MagentoApiFacade
{
    private function getToken(string $credentials)
    {
        $curl = curl_init(
            'https:///rest/all/V1/integration/admin/token'
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $credentials);

        $result = curl_exec($curl);

        if (curl_errno($curl)) {
            throw new Exception(curl_error($curl));
        }

        curl_close($curl);

        return json_decode($result);
    }
}

$credentials = "{\"username\": \"{$username}\", \"password\": \"{$password}\"}";