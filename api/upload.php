<?php
if(isset($_POST)){
    $root_path = "../public/upload";
    $upload_path = $root_path;
    $file = $_POST['file'];
    list( $meta, $content ) = explode(",", $file);
    list( $tmp, $info ) = explode(":", $meta);
    list( $type, $enc ) = explode(";", $info);
    list( $type_main, $type_sub ) = explode("/", $type);
    if($enc == "base64"){
        $content = base64_decode($content);
    }
    $filename = date("Y_m_d")."_".time() . "." . $type_sub;
    $filepath = $upload_path . "/" . $filename;
    $fp = fopen($filepath, "w");
    if(fwrite($fp, $content)){
        echo json_encode(array(
            "result"    =>  "ok",
            "url"       =>  $filename,
        ));
    }else{
        echo json_encode(array(
            "result"    =>  "failed",
            "error"     =>  "file write failed"
        ));
    }

}else{
    echo json_encode(array(
        "result"    =>  "failed",
        "error"     =>  "unknown error"
    ));
}
?>