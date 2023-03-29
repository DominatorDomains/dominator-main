<?php
    require("./request.php");
    $keyword = "";
    $type = "normal";
    $exact_count = 20;
    $suggest_count = 20;
    $result = array();
    if(isset($_POST)){
        $keyword = isset($_POST['keyword'])?$_POST['keyword']:"";
        $type = isset($_POST['type'])?$_POST['type']:"";
    }
    if($keyword !== ""){
        if($type === "ai"){
            //ai 
            //unstoppable
            $uSuggestResult = curl_get("https://unstoppabledomains.com/api/domain/search/ai-suggestions",
            array(
                "extension" => "All",
                "phrase"=>$keyword,
            ));
            $uSuggestArray = json_decode($uSuggestResult);
            $uSuggest = isset($uSuggestArray->suggestions)?$uSuggestArray->suggestions:array();
            $uResult = array();
            foreach($uSuggest as $dom){
                $exist = FALSE;
                foreach($uResult as $item){
                    if($item["name"] == $dom->domain->name){
                        $exist = TRUE;
                        break;
                    }
                }
                if($exist == FALSE){
                    array_push($uResult, array("name"=>$dom->domain->name, "price"=>(int)($dom->price) / 100, "where"=>"ud"));
                }
            }
            $result["ud"] = $uResult;
            $result["si"] = array();
        }else{
            //normal 
            //unstoppable
            $uExactResult = curl_get("https://unstoppabledomains.com/api/domain/search",
                array("q"=>$keyword));
            $uExactArray = json_decode($uExactResult);
            $uExact = isset($uExactArray->exact)?$uExactArray->exact:array();
            $uSuggestResult = curl_get("https://unstoppabledomains.com/api/domain/search/suggestions",
                array(
                    "extension" => "All",
                    "page" => 1,
                    "rowsPerPage" => $suggest_count,
                    "q"=>$keyword,
                ));
            $uSuggestArray = json_decode($uSuggestResult);
            $uSuggest = isset($uSuggestArray->suggestions)?$uSuggestArray->suggestions:array();

            //space
            $spaceResult = curl_post("https://graphigo.prd.space.id/query",
                json_encode(array(
                    "operationName"=>"domains",
                    "variables"=>array(
                        "input"=>array(
                            "query"=>$keyword,
                            "buyNow"=>1,
                            "domainStatuses"=>["REGISTERED","UNREGISTERED"],
                            "first"=>$suggest_count + $exact_count)
                    ),
                    "query"=>"query domains(\$input: ListDomainsInput!) {domains(input: \$input) { exactMatch {name listPrice network} list {name listPrice network}}}")
            ));
            $spaceResultArray = json_decode($spaceResult);
            $sExact = (isset($spaceResultArray->data->domains->exactMatch))?$spaceResultArray->data->domains->exactMatch:array();
            $sSuggest = (isset($spaceResultArray->data->domains->list))?$spaceResultArray->data->domains->list:array();
            $uResult = array();
            $sResult = array();
            foreach(($uExact + $uSuggest) as $dom){
                $exist = FALSE;
                foreach($uResult as $item){
                    if($item["name"] == $dom->domain->name){
                        $exist = TRUE;
                        break;
                    }
                }
                if($exist == FALSE){
                    array_push($uResult, array("name"=>$dom->domain->name, "price"=>(int)($dom->price) / 100, "where"=>"ud"));
                }
            }
            foreach(($sExact + $sSuggest) as $dom){
                $exist = FALSE;
                $name = $dom->name;
                $network = $dom->network;
                $price = $dom->listPrice;
                $ext = "";
                if($network == '0'){
                    $ext = "eth";
                }else if($network == "1"){
                    $ext = "bnb";
                }else if($network == "2"){
                    $ext = "arb";
                }
                foreach($sResult as $item){
                    if($item["name"] == $name.".".$ext){
                        $exist = TRUE;
                        break;
                    }
                }
                if($exist == FALSE){
                    array_push($sResult, array("name"=>$name.".".$ext, "price"=>(int)($price), "where"=>"si"));
                }
            }
            $result["ud"] = $uResult;
            $result["si"] = $sResult;
        }
    }
    echo json_encode($result);
    exit();
?>