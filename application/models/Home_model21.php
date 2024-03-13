<?php
class Home_model21 extends CI_Model
{
    function CallAPI($method, $url, $header, $data = false)
    {
        $curl = curl_init();
        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                              
                break;
            case "PATCH":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                              
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        $result = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        curl_close($curl);

        // print_r($result);echo "<pre>";
        // print_r($res);echo "<pre>";
        // print_r($err);echo "<pre>";exit;
        $response['status'] = $result;
        $response['response'] = json_decode($res);
        $response['err'] = $err;

        return json_encode($response);
    }
}
?>