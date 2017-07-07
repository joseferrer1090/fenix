<?php

global $db;
// Important Variable
$page = $curpage; // <--- Get Current Page
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
$blegedes = "";
$addonwhere = "";
$tbl = "";
$total_string = "";
// Query The Transaction
$db->bind("page", $start);
// Additional WHERE
// Jika BUKAN Semua User
if (isset($_SESSION["filterusr"]["uname"]) && $_SESSION["filterusr"]["uname"] != "") {
    $db->bind("usrname", $_SESSION["filterusr"]["uname"]);
    $blegedes .= " uname = :usrname";
} else {
    $blegedes .= " uname <> 'a'";
}
if (isset($_SESSION["filterusr"]["date"]) && $_SESSION["filterusr"]["date"] != "") {
    $db->bind("tgl", $_SESSION["filterusr"]["date"]);
    $addonwhere .= " AND DATE(register_date) = :tgl";
}
if (isset($_SESSION["filterusr"]["state"]) && $_SESSION["filterusr"]["state"] != "") {
    $db->bind("state", $_SESSION["filterusr"]["state"]);
    $addonwhere .= " AND state = :state";
}

//
$data = $db->query("SELECT * FROM user_id WHERE " . $blegedes . " " . $addonwhere . " AND role <> '0' ORDER BY uid ASC LIMIT 10 OFFSET :page"); // <-- Query with OFFSET
//
$tbl .='<div class="tblwrap">'
        . '<div id="loading">'
        . '<p>Recuperando Datos del Server...</p>'
        . '</div>'
        . '<table id="usr-tbl" class="footable table-bordered table-striped table-condensed" data-sort="false">';
$tbl .=' <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre de usuario</th>
                                                     <th data-hide="phone,tablet">Fecha de registro</th>
                                                    <th data-hide="phone,tablet">Ultima conexion</th>
                                                    <th data-hide="phone,tablet">Patrocinador</th>
                                                    <th data-hide="phone,tablet">Detalles</th>
                                                    <th data-hide="phone,tablet">Membresia</th>
                                                    <th data-hide="phone,tablet">Estado</th>
                                                    <th data-hide="phone,tablet">Accion</th>
                                                </tr>
                                            </thead>
            <tbody id="usr-tbl-content">';
foreach ($data as $key => $value) {
    $data = get_data(get_parent($value['uid'], "int"), "uname");
    $sponsor = get_sponsor($value['uid'], "uname");
    $tbl .= "<tr>"
            . "<td>" . $value["uid"] . "</td>"
            . "<td>" . $value["uname"] . "</td>"
            . "<td>" . date('F d, Y', strtotime($value["register_date"])) . "</td>"
            . "<td>" . ($data=="0"?"ROOT":$data) . "</td>"
            . "<td>" . ($sponsor=="0"?"ROOT":$sponsor) . "</td>"
            . "<td>Nombres <strong>" . getProfileData($value['uid'], 'first_name') . "</strong>"
            . "<br>Apellidos <strong>" . getProfileData($value['uid'], 'last_name') . "</strong>"
            . "<br>Email <strong>" . getProfileData($value['uid'], 'email') . "</strong>"
            . "<br>Genero <strong>" . getProfileData($value['uid'], 'gender') . "</strong>"
            . "<br>Telefono <strong>" . getProfileData($value['uid'], 'phone') . "</strong>"
            . "<br>Celular <strong>" . getProfileData($value['uid'], 'mobile') . "</strong>"
            . "<br>Nombre completo :<br> <strong>" . getProfileData($value['uid'], 'address') . "<br>" . getProfileData($value['uid'], 'city') . "," . getProfileData($value['uid'], 'zip') . "<br>" . getProfileData($value['uid'], 'state') . " - " . getProfileData($value['uid'], 'country') . "</strong>"
            . "<br> Actual Money: <strong>" . getProfileData($value['uid'], 'money') . "</strong>"
             . "<br>MOBILE <strong>" . getProfileData($value['uid'], 'mobile') . "</strong>"
            . "</td>"
            . "<td>" . getProduct(get_data($value['uid'], "product"), "product_name") . "<div class='form-group '>
    <label for='types' class='control-label col-lg-4'>Cambiar Menbresia </label>
    <div class='col-lg-8'>
        <select id='membreci-".$value['uid']."' name='membreci' class='form-control membreci-".$value['uid']."'>";
        foreach($options_plan as $plan){
            $id=$plan['id'];
            $nombre=$plan['nombre'];
            //echo $value['uid'];
            $plan_actual=getProduct(get_data($value['uid'], "product"), "product_id");
            if($id==$plan_actual){
                 $tbl.="<option value='$id' selected='true'>".$nombre."</option>";
            }else{
             $tbl.="<option value='$id'>".$nombre."</option>";     
            }
        }
        $tbl.="</select>  <br> 
        <a href='/user-management/changeproduct?id=".$value['uid']."&product_id=' class='btn btn-info unban changeproduct' data-id='" . $value['uid'] . "'>Guardar</a>
    </div>
</div>
 </td>"
            . "<td>" . ($value["banned"] != "1" ? "<span class='label label-success'>ITS OKAY!</span>" : "<span class='label label-danger'>BANNED</span>") . "</td>"
            . "<td>" . ($value["banned"] == "1" ? "<a class='btn btn-info unban' data-id='" . $value['uid'] . "'>UNBLOCK</a>" : "<a class='btn btn-danger ban' data-id='" . $value["uid"] . "'>BANNER USUARIO</a>")
            ."<br><br>
            <a class='btn btn-success godmode' data-id='".$value["uid"]."'>login usuario</a>
            ";
            if($value["product"]==38 && $value["state"]==0 ){
            $tbl.="<br/><br/><a class='btn btn-success active-bvault' data-id='".$value["uid"]."'>ACTIVAR B-VAULT</a>";
            }

            $tbl.="<br><br> "
            . "</td>"
            . "</tr>";
}
$tbl .='</tbody></table></div>';
/* --------------------------------------------- */
$blegedes = "";
$addonwhere = "";
// Jika BUKAN Semua User
if (isset($_SESSION["filterusr"]["uname"]) && $_SESSION["filterusr"]["uname"] != "") {
    $db->bind("usrname", $_SESSION["filterusr"]["uname"]);
    $blegedes .= " uname = :usrname";
} else {
    $blegedes .= " uname <> 'a'";
}
if (isset($_SESSION["filterusr"]["date"]) && $_SESSION["filterusr"]["date"] != "") {
    $db->bind("tgl", $_SESSION["filterusr"]["date"]);
    $addonwhere .= " AND DATE(register_date) = :tgl";
}
if (isset($_SESSION["filterusr"]["state"]) && $_SESSION["filterusr"]["state"] != "") {
    $db->bind("state", $_SESSION["filterusr"]["state"]);
    $addonwhere .= " AND state = :state";
}

//$db->bind("uid",$_SESSION["uid"]);
$baris = $db->query("SELECT COUNT(uid) as jumlah FROM user_id WHERE " . $blegedes . " " . $addonwhere . " AND role <> '0'");
$count = $baris[0]["jumlah"];
$no_of_paginations = ceil($count / $per_page);

/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
if ($cur_page >= 7) {
    $start_loop = $cur_page - 3;
    if ($no_of_paginations > $cur_page + 3)
        $end_loop = $cur_page + 3;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
        $start_loop = $no_of_paginations - 6;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > 7)
        $end_loop = 7;
    else
        $end_loop = $no_of_paginations;
}
/* ----------------------------------------------------------------------------------------------------------- */
$tbl .= "<div class='col-md-8'><ul class='pagination pagination-lg'>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $tbl .= "<li p='1' ><a>First</a></li>";
} else if ($first_btn) {
    $tbl .= "<li p='1' class='inactive'><a>First</a></li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $tbl .= "<li p='$pre' ><a>Previous</a></li>";
} else if ($previous_btn) {
    $tbl .= "<li class='inactive'><a>Previous</a></li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $tbl .= "<li p='$i' class='active'><a>{$i}</a></li>";
    else
        $tbl .= "<li p='$i'><a>{$i}</a></li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $tbl .= "<li p='$nex'><a>Next</a></li>";
} else if ($next_btn) {
    $tbl .= "<li class='inactive'><a>Next</a></li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $tbl .= "<li p='$no_of_paginations'><a>Last</a></li>";
} else if ($last_btn) {
    $tbl .= "<li p='$no_of_paginations' class='inactive'><a>Last</a></li>";
}
//$total_string = "<div class='col-md-4'><span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span></div>";
$tbl = $tbl . "</ul></div>" . $total_string;  // Content for pagination
echo $tbl;
