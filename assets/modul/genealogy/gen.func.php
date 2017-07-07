<?php
// Fungsi Query Downline
function downline($uid){
    global $db;
    global $downlinearray;
    $downlinearray = array();
    
    $db->bind("uid",$uid);
    $downline = $db->query("SELECT * FROM genealogy WHERE parentid=:uid");
    foreach ($downline as $key => $value) {
       $downlinearray[]=$value["uid"];
       downlineloop($value["uid"]);
    }
    asort($downlinearray);
    return $downlinearray;
}
function downlinex($uid){
    global $db;
    global $downlinearray;
    $downlinearray = array();
    
    $db->bind("uid",$uid);
    $downline = $db->query("SELECT * FROM genealogy WHERE parentid=:uid");
    foreach ($downline as $key => $value) {
       $downlinearray[]=$value["uid"];
       downlineloop($value["uid"]);
    }
    //asort($downlinearray);
    return $downlinearray;
}
function downlineloop($uid){
    global $db;
    global $downlinearray;
    $downlinearray = (is_array($downlinearray)?$downlinearray:array());
    $db->bind("uid",$uid);
    $downline = $db->query("SELECT * FROM genealogy WHERE parentid=:uid");
    if(count($downline>0)){
        foreach ($downline as $key => $value) {
            $downlinearray[]=$value["uid"];
            downlineloop($value["uid"]);
        }
    }
}
function firstDownline($uid){
    global $db;
    global $downlinearray;
    $downlinearray = array();
    $db->bind("uid",$uid);
    $downline = $db->query("SELECT * FROM genealogy WHERE parentid=:uid");
    foreach ($downline as $key => $value) {
       $downlinearray[]=$value["uid"];
    }
    asort($downlinearray);
    return (count($downlinearray)>0 ? $downlinearray : "");
}

function countNodes($uid,$position){
     global $db;
     global $downlinearray;
     $right = array();
     $left = array();
     $downlinearray = array();
     $db->bind("uid",$uid);
     $downline = $db->query("SELECT * FROM genealogy WHERE parentid=:uid");
     $i = 1;
    foreach ($downline as $key => $value) {
       if($i>1){
       $right[]=$value["uid"];    
       }else{
       $left[]=$value["uid"];
       }
       $i++;
    }
    
    // Ambil List ID kaki Kiri
    if(count($left)>0){
        downline($left[0]);
        $downlinearray[] = $left[0];
        asort($downlinearray);
        $left = $downlinearray;
        //return $left;
        // Reset Array
        $downlinearray = array();
    }
    // Ambil List ID kaki Kanan
     if(count($right)>0){
        downline($right[0]);
        $downlinearray[] = $right[0];
        asort($downlinearray);
        $right = $downlinearray;
        //return $left;
        // Reset Array
        $downlinearray = array();
    }
    return ($position=="left" ? count($left) : ($position=="right" ? count($right) : ""));
}
function countInvest($uid,$position){
     global $db;
     global $downlinearray;
     $right = array();
     $left = array();
     $downlinearray = array();
     $db->bind("uid",$uid);
     $downline = $db->query("SELECT * FROM genealogy WHERE parentid=:uid");
     $i = 1;
    foreach ($downline as $key => $value) {
       if($i>1){
       $right[]=$value["uid"];    
       }else{
       $left[]=$value["uid"];
       }
       $i++;
    }
    
    // Ambil List ID kaki Kiri
    if(count($left)>0){
        downline($left[0]);
        $downlinearray[] = $left[0];
        asort($downlinearray);
        $left = $downlinearray;
        //return $left;
        // Reset Array
        $downlinearray = array();
    }
    // Ambil List ID kaki Kanan
     if(count($right)>0){
        downline($right[0]);
        $downlinearray[] = $right[0];
        asort($downlinearray);
        $right = $downlinearray;
        //return $left;
        // Reset Array
        $downlinearray = array();
    }
    
    // Kalkulasi Investasi kaki kiri
    if(is_array($left)){
        $tmpLeft = 0;
        foreach ($left as $key => $value) {
            $tmpLeft += theInvest($value);
        }
        $left = $tmpLeft;
    }    
    // Kalkulasi Investasi kaki kanan
    if(is_array($right)){
        $tmpRight = 0;
        foreach ($right as $key => $value) {
            $tmpRight += theInvest($value);
        }
        $right = $tmpRight;
    }    
    return ($position=="left" ? $left : ($position=="right" ? $right : ""));
}
function countPoints($uid,$position){
     global $db;
     global $downlinearray;
     $right = array();
     $left = array();
     $downlinearray = array();
     $db->bind("uid",$uid);
     $downline = $db->query("SELECT * FROM genealogy WHERE parentid=:uid");
     $i = 1;
    foreach ($downline as $key => $value) {
       if($i>1){
       $right[]=$value["uid"];    
       }else{
       $left[]=$value["uid"];
       }
       $i++;
    }
    //var_dump($right);
   
    // Ambil List ID kaki Kiri
    if(count($left)>0){
        downline($left[0]);
        $downlinearray[] = $left[0];
        asort($downlinearray);
        $left = $downlinearray;
        //return $left;
        // Reset Array
        $downlinearray = array();
    }
       // Ambil List ID kaki Kanan
     if(count($right)>0){
        downline($right[0]);
        $downlinearray[] = $right[0];
        asort($downlinearray);
        $right = $downlinearray;
        //return $left;
        // Reset Array
        $downlinearray = array();
    }
    
    // Kalkulasi Investasi kaki kiri
    if(is_array($left)){
        $tmpLeft = 0;
        foreach ($left as $key => $value) {
            $tmpLeft += thePoints($value);
        }
        $left = $tmpLeft;
    }    
    // Kalkulasi Investasi kaki kanan
    if(is_array($right)){
        $tmpRight = 0;
        foreach ($right as $key => $value) {
            $tmpRight += thePoints($value);
        }
        $right = $tmpRight;
    }   
    if($position=="left"){
        return $left;
    } 
    if($position=="right"){
        return $right;
    }
   
}
function theInvest($uid){
    global $db;
    $db->bind("uid",$uid);
    $invest = $db->query("SELECT SUM(nominal) as total FROM devident_log WHERE uid=:uid");
    return ($invest[0]["total"]==""?0:$invest[0]["total"]);
}
function thePoints($uid){
    global $db;
    $db->bind("uid",$uid);
    $points = $db->query("SELECT points as total FROM product inner join user_id on user_id.product=product.product_id WHERE uid=:uid");
    return ($points[0]["total"]==""?0:$points[0]["total"]);
}
function getUname($uid){
    global $db;
    $db->bind("uid",$uid);
    $data = $db->query("select * From user_id WHERE uid = :uid");
    return $data[0]["uname"];
}

function theTree($array){
    if(is_array($array)){
      $list = "";  
      $list .= "<ul>";  
      
        foreach ($array as $key => $value) {

            $list .= "<li data-id='".$value."' class='subx'><a href='#'><div class='tree-user'>";
            $list .= "<h3> <img src='/assets/images/product/".strtoupper(get_data($value, "product")).".png ' style='width:60px'> ".strtoupper(get_data($value, "uname"))."</h3>";
            $list .= "<p>Points Membership: ".thePoints($value)."</p>";
            $list .= "<div class='col-xs-12 nodes-info'>
                                        <div class='col-xs-3'>
                                           ".countNodes($value,'right')."                                      
                                        </div>
                                        <div class='col-xs-6 midx'>
                                            Nodes
                                        </div>
                                        <div class='col-xs-3'>
                                         ".countNodes($value,'left')."   
                                        </div>
                                        <div class='clearfix'></div>
                                    </div>";
            $list .= " <div class='col-xs-12 invest-info'>
                                        <div class='col-xs-6 linfest'>
                                            <strong>Points</strong><br>
                                        ".countPoints($value,"right")."
                                        </div>
                                        <div class='col-xs-6 rinfest'>
                                            <strong>Points</strong><br>
                                          ".countPoints($value,"left")."    
                                        </div>
                                        <div class='clearfix'></div>
                                    </div> ";
            $list .= "</div> </a> </li>";
        }

      $list .= "</ul>"; 
      return $list;
    }else{
        return "";
    }
}