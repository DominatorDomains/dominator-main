<?php
    function curl_post($url, $post = "", array $options = array()){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);

        $resp = curl_exec($curl);
        curl_close($curl);
        // echo $resp;
        return $resp;
        $defaults = array(
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_POSTFIELDS => "query domains(\$input: ListDomainsInput!) {\n  domains(input:\$input) {\n    exactMatch {\n      name\n      listPrice\n      lastSalePrice\n      tokenId\n      owner\n      network\n      orderSource\n      expirationDate\n      image\n      __typename\n    }\n    list {\n      name\n      listPrice\n      lastSalePrice\n      tokenId\n      owner\n      network\n      orderSource\n      expirationDate\n      image\n      __typename\n    }\n    pageInfo {\n      startCursor\n      endCursor\n      hasNextPage\n      __typename\n    }\n    __typename\n  }\n}"
        );
        // return json_encode($post);
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if( ! $result = curl_exec($ch))
        {
            return(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

    function curl_get($url, array $get = NULL, array $options = array())
    {    
        $defaults = array(
            CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 30
        );
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        if( ! $result = curl_exec($ch))
        {
            return(curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
?>