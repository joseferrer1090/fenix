<?php
global $hooks;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$hooks->add_action('silex_action', 'the_account'); // Tancapkan fungsi dashboard ke Trigger Silex
$hooks->add_action('all_menu', 'menu_account');

// Define Heading masing2 page
function fund_title() {
    echo "Balance Overview";
}

function transfer_title() {
    echo "Transfer Fund";
}

function registerfund_title() {
    echo "Register Fund Overview";
}

function withdraw_title() {
    echo "Wallet";
}

function bank_title() {
    echo "Bank Accounts";
}

function addbank_title() {
    echo "Add Bank Account";
}

function editbank_title() {
    echo "Edit Bank Information";
}

// Declare The CSS
function fund_css() {
    ?>
    <link rel="stylesheet" type="text/css" href="/assets/js/bootstrap-datepicker/css/datepicker-custom.css" />
    <link rel="stylesheet" type="text/css" href="/assets/js/bootstrap-timepicker/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="/assets/js/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="/assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="/assets/js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
    <link href="/assets/css/footable/footable.core.css" rel="stylesheet">
    <?php
}

function bank_css() {
    ?>
    <link href="/assets/css/footable/footable.core.css" rel="stylesheet">
    <?php
}

// Declare The JS
function fund_js() {
    ?>
    <script type="text/javascript" src="/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="/assets/js/footable/footable.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/summary.js"></script>
    <?php
}

function transfer_js() {
    ?>
    <script type="text/javascript" src="/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/transfer_new.js"></script>
    <?php
}

function registerfund_js() {
    ?>
    <script type="text/javascript" src="/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/registerfund.js"></script>
    <?php
}

function bank_js() {
    ?>
    <script src="/assets/js/footable/footable.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/bank.js"></script>
    <?php
}

function addbank_js() {
    ?>
    <script type="text/javascript" src="/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/addbank.js"></script>
    <?php
}

function editbank_js() {
    ?>
    <script type="text/javascript" src="/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/editbank.js"></script>
    <?php
}

function withdraw_js() {
    ?>
    <script type="text/javascript" src="/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/footable/footable.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/withdraw.js"></script>
    <script type="text/javascript" src="/assets/modul-js/account/withdrawlist.js"></script>
    <?php
}

function menu_account() {
    global $menu_array;
    $accountmenu = array(
        "label" => "Cuenta",
        "url" => "#",
        "icon" => "fa fa-user",
        "sub" => array(
            array(
                "label" => "Resumen de Fondos",
                "url" => "/account/fund-summary",
                "icon" => "fa fa-dollar",
            ),
            array(
                "label" => "Transferir Fondos",
                "url" => "/account/transfer",
                "icon" => "fa fa-mail-forward",
            ),
         array(
                "label" => "Convertir Fondos",
                "url" => "/account/register-balance",
                "icon" => "fa fa-users",
            ),
            array(
                "label" => "Wallet",
                "url" => "/account/withdraw",
                "icon" => "fa fa-money",
            ),
            array(
                "label" => "Cuentas de Bancos",
                "url" => "/account/bank",
                "icon" => "fa fa-credit-card",
            )
        )
    );
    $menu_array[3] = $accountmenu;
}

function the_account() {
    global $app;
    global $csrf; 
    // ALL POSTS

    $app->get('/account/cron/rentability',function(Request $request){
        global $db;
        
        $mesactual=date('Y-m-d');
        $mesold=date('Y-m-d',strtotime('-1 month',strtotime($mesactual)));

        $sql_product="SELECT * FROM  product where product_id=38";
        $resultproduct=$db->query($sql_product);
        $product=$resultproduct[0];

        $sql="SELECT * FROM  user_id u LEFT JOIN bonus_date_logs b ON b.`uid`=u.uid INNER JOIN user_detail d ON d.uid=u.uid WHERE u.register_date>='$mesold' AND u.register_date<='$mesactual' AND u.state=2 AND u.product=38 and b.uid is null ";
        $rows=$db->query($sql);
        $cont=0;
        foreach($rows as $user){
           $datenextpay=date('Y-m-d',strtotime('+2 month',strtotime($user['register_date']))); 
           $money=$user['money'];
           $nominal=floor($money*$product['rentability'])/100;
           $uid=$user['uid'];
           $notes='B-VAULT BONUS MONTH';
           $db->bind("nominal", $nominal);
           $db->bind("notes", $notes);
           $db->bind("from", 1);
           $db->bind("to", $uid);
           $db->bind("type_fund",1);
            
           // Execute
           $row = $db->query("INSERT INTO fund_transaction(type,nominal,details,from_id,to_id,date,type_fund) VALUES('10',:nominal,:notes,:from,:to,NOW(),:type_fund)");
           if($row){
                $fund_transaction_id=$db->lastInsertId();
                $bonuslogs=$db->query("INSERT INTO bonus_date_logs(uid,date,datenextpay,nominal,fund_transaction_id) VALUES('$uid',NOW(),'$datenextpay',$nominal,'$fund_transaction_id')");
                if($bonuslogs){
                    $cont++;
                }else{
                  $db->query("DELETE FROM fund_transaction WHERE trans_id=$fund_transaction_id ");  
                }
           }

        }   
        echo "Total Registros Insertados=".$cont;        
        exit();

    });

    $app->post('/account/fund-summary/list', function(Request $request) {
        $curpage = $request->get('page');
        include 'fund.list.php';
        return '';
    });
    $app->post('/account/fund-summary/filter', function(Request $request) {
        $_SESSION["filtersum"]["transid"] = $request->get('transid');
        $_SESSION["filtersum"]["date"] = $request->get('date');
        $_SESSION["filtersum"]["date_end"] = $request->get('date_end');
        $_SESSION["filtersum"]["type"] = $request->get('type');
        $_SESSION["filtersum"]["flow"] = $request->get('flow');
        return new Response('Success', 200);
    });
    $app->post('/account/fund-summary/clearfilter', function(Request $request) {
        $_SESSION["filtersum"] = "";
        return new Response('Success', 200);
    });
    $app->post('/account/transfer/exec', function(Request $request) {
        global $db;
        global $global_min_trf;
        //$global_min_trf=0;
        $uname = $request->get('uname');
        $pin = $request->get('pin');
        $nominal = $request->get('nominal');
        $nominalminus=$request->get('nominalminus');
        $notes = $request->get('notes');
        $types = $request->get('types');
        $membreci=$request->get('membreci');
        $tox = userID($uname);

        if($types=="reg"){
             $type_fund=1;           
        }
        if($types=="fund"){
            $type_fund=2;               
        }
        if($types=="util"){
            $type_fund=3;            
        }

        // CEK JIKA BETUL
        if(isbanned()){
            return new Response('FAILED', 202);
        }
        if (($nominal >= $global_min_trf || $nominalminus!="" ) && pinCorrect($pin) && hasDevidentAll($_SESSION["uid"])) {
            
                if(userExist($uname) && $membreci==""){

                    if ($types == 'reg') {
                    if (current_register_fund() >= $nominal) {
                        // Prepare & Prevent SQL Injection
                        if($nominal=="" && $nominalminus!=""){
                                $nominal=$nominalminus;
                        }
                        $db->bind("nominal", $nominal);
                        $db->bind("notes", $notes);
                        $db->bind("from", $_SESSION["uid"]);
                        $db->bind("to", $tox);
                        $db->bind("type_fund",$type_fund);
                        // Execute
                        $row = $db->query("INSERT INTO fund_transaction(type,nominal,details,from_id,to_id,date,type_fund) VALUES('10',:nominal,:notes,:from,:to,NOW(),:type_fund)");
                        if ($row) {
                            return new Response('SUCCESS', 200);
                            //return var_dump($row);
                        }
                    } else {
                        return new Response('FAILED', 201);
                    }
                }
                if($types == 'util'){

                     if (current_fund() >= $nominal || $nominalminus!="") {
                        // Prepare & Prevent SQL Injection
                            if($nominal=="" && $nominalminus!=""){
                                $nominal=$nominalminus;
                            }
                            $db->bind("nominal", $nominal);
                            $db->bind("notes", $notes);
                            $db->bind("from", $_SESSION["uid"]);
                            $db->bind("to", $tox);
                            $db->bind("type_fund",$type_fund);
                            
                            // Execute
                            $row = $db->query("INSERT INTO fund_transaction(type,nominal,details,from_id,to_id,date,type_fund) VALUES('12',:nominal,:notes,:from,:to,NOW(),:type_fund)");
                            if ($row) {
                                return new Response('SUCCESS', 200);
                                //return var_dump($row);
                            }
                        } else {

                            return new Response('FAILED', 201);
                        }


                }
                if ($types == 'fund' ) {
                    
                    if (current_fund() >= $nominal || $nominalminus!="") {
                        // Prepare & Prevent SQL Injection
                        if($nominal=="" && $nominalminus!=""){
                            $nominal=$nominalminus;
                        }
                        $db->bind("nominal", $nominal);
                        $db->bind("notes", $notes);
                        $db->bind("from", $_SESSION["uid"]);
                        $db->bind("to", $tox);
                        $db->bind("type_fund",$type_fund);
                        
                        // Execute
                        $row = $db->query("INSERT INTO fund_transaction(type,nominal,details,from_id,to_id,date,type_fund) VALUES('1',:nominal,:notes,:from,:to,NOW(),:type_fund)");
                        if ($row) {
                            return new Response('SUCCESS', 200);
                            //return var_dump($row);
                        }
                    } else {

                        return new Response('FAILED', 201);
                    }
                }    
            }else{
                if($membreci!=""){
                    
                    $cont=0;
                    $sql="SELECT * FROM  `product` INNER JOIN user_id ON user_id.product = product.product_id WHERE product_id = $membreci and user_id.banned=0 ";
                    $rows=$db->query($sql);
                    foreach ($rows as $row) {
                        
                        $db->bind("nominal", $nominal);
                        $db->bind("notes", "PRODUCT BONUS " .$notes);
                        $db->bind("from", $_SESSION["uid"]);
                        $db->bind("to", $row['uid']);
                        $db->bind("type_fund",$type_fund);
                        
                        // Execute
                        $row = $db->query("INSERT INTO fund_transaction(type,nominal,details,from_id,to_id,date,type_fund) VALUES('11',:nominal,:notes,:from,:to,NOW(),:type_fund)");
                        if($row){
                            $cont++;
                        }

                    }
                    if($cont>0){
                        return new Response('SUCCESS', 200);
                    }else{
                        return new Response('FAILED', 201);
                    }

                     
                }else{

                    return new Response('Failed', 201);
 
                }


            }

            
        } else {
            return new Response('Failed', 201);
        }
    });
    $app->post('/account/register-balance/convert', function(Request $request) {
        global $db;
        $pin = $request->get('pin');
        $nominal = $request->get('nominal');
        // Check if current fund is enough, the pin is correct, and user has a devident
        if(isbanned()){
            return new Response('FAILED', 202);
        }

        if (current_utilities() >= $nominal && pinCorrect($pin) && hasDevidentAll($_SESSION["uid"])) {
            // PREPARE & PREVENT SQL INJECTION
            $db->bind("nominal", $nominal);
            $db->bind("notes", "CONVERSION TO BONUS FUND");
            $db->bind("from", $_SESSION["uid"]);
            $db->bind("to", "0");
            // EXECUTE
            $row = $db->query("INSERT INTO fund_transaction(type,nominal,details,from_id,to_id,date) VALUES('11',:current_utilities,:notes,:from,:to,NOW())");
            if ($row) {
                return new Response('SUCCESS', 200);
            }
        } else {
            return new Response('Failed', 201);
        }
    });
    $app->post('/account/withdraw/clearfilter', function(Request $request) {
        $_SESSION["filterwithdraw"] = "";
        return new Response('Success', 200);
    });

    $app->post('/account/withdraw/exec', function(Request $request) {
        global $db;
        global $global_wdable;
        global $global_wdreg;
        global $global_min_wd;
        $pin = $request->get('pin');
        $nominal = $request->get('nominal');
        $bank = $request->get('bank');
        // Calculation
        $takenfund = ($global_wdable / 100) * $nominal; // Means n% Will be taken & transferable to user bank account, you can set it up on global.variable.php
        $takenregister = ($global_wdreg / 100) * $nominal; // Means n% Will be converted into REGISTER FUND, you can set it up on global.variable.php
        // Check the conditional
        if(isbanned()){
            return new Response('FAILED', 202);
        }

        if ($nominal >= $global_min_wd && current_fund() >= $takenfund && isBankMine($bank) && pinCorrect($pin) && hasDevidentAll($_SESSION["uid"])) {
            // PREPARE 
            $db->bind("userid", $_SESSION["uid"]);
            $db->bind("nominal", $takenfund);
            $db->bind("bank", $bank);
            $db->bind("pendreg", $takenregister);
            // Record To Withdraw
            $x = $db->query("INSERT INTO withdrawal(uid,date,nominal,bank_id,status,pendregs) VALUES(:userid,NOW(),:nominal,:bank,'PENDING',:pendreg)");
            $idWithdraw = $db->lastInsertId();
            if ($idWithdraw && $x) {
                // PREPARE
                $db->bind("takenfund", $nominal);
                $db->bind("from", $_SESSION["uid"]);
                $db->bind("notes", "WITHDRAW #" . $idWithdraw);
                // Record the Transaction
                $deduct1 = $db->query("INSERT INTO fund_transaction(date,type,nominal,from_id,details,to_id) VALUES(NOW(),8, :takenfund, :from,:notes,0)");
                if ($deduct1) {
                    return new Response('SUCCESS', 200);
                } else {
                    return new Response('Failed', 201);
                }
            } else {
                return new Response('Failed', 201);
            }
        } else {
            return new Response('Failed', 201);
        }
    });
    $app->post('/account/withdraw/list', function(Request $request) {
        $curpage = $request->get('page');
        include 'withdraw.list.php';
        return '';
    });
    $app->post('/account/withdraw/transfer', function(Request $request) {
        $curpage = $request->get('page');
        include 'withdraw.list.php';
        return '';
    });
    $app->post('/account/bank/add/submit', function(Request $request) {
        global $db;
        $bankname = $request->get('bankname');
        $branchname = $request->get('branch');
        $holder = $request->get('holder');
        $acnumber = $request->get('acnumber');
        $swift = $request->get('swift');
        $beneficiary = $request->get('beneficiary');
        $pin = $request->get('pin');
        // CONDITIONAL FOR MAKE SURE PIN CORRECT AND BANK EXISTS
        if (pinCorrect($pin) && !bankExists($acnumber)) {
            // PREPARE
            $db->bind("bankname", $bankname);
            $db->bind("branchname", $branchname);
            $db->bind("acnumber", $acnumber);
            $db->bind("holder", $holder);
            $db->bind("swift", $swift);
            $db->bind("uid", $_SESSION["uid"]);
            // EXECUTE
            $row = $db->query("INSERT INTO user_bank(bank_name,branch_name,acnumber,bankholder,swiftcode,uid) VALUES(:bankname,:branchname,:acnumber,:holder,:swift,:uid)");
            if ($row) {
                return new Response('SUCCESS', 200);
            }
        } else {
            return new Response('Failed', 201);
        }
    });
    $app->post('/account/bank/editbank', function(Request $request) {
        global $db;
        $bankid = $request->get('idbank');
        $bankname = $request->get('bankname');
        $branchname = $request->get('branch');
        $holder = $request->get('holder');
        $acnumber = $request->get('acnumber');
        $swift = $request->get('swift');
        $beneficiary = $request->get('beneficiary');
        $pin = $request->get('pin');
        // CEK JIKA BETUL
        if (pinCorrect($pin) && isBankMine($bankid)) {
            $db->bind("bankid", $bankid);
            $db->bind("bankname", $bankname);
            $db->bind("branch", $branchname);
            $db->bind("holder", $holder);
            $db->bind("acnumber", $acnumber);
            $db->bind("swift", $swift);
            $db->bind("bene", $beneficiary);
            $row = $db->query("UPDATE user_bank SET bank_name = :bankname, branch_name = :branch, bankholder = :holder, acnumber = :acnumber, swiftcode = :swift, beneficiary = :bene WHERE bank_id = :bankid;");
            if ($row) {
                return new Response('SUCCESS', 200);
            }
        } else {
            return new Response('Failed', 201);
        }
    });
    $app->post('/account/bank/deletebank', function(Request $request) {
        global $db;
        $bankid = $request->get('idbank');
        // CEK JIKA BETUL
        if (isBankMine($bankid)) {
            $db->bind("bankid", $bankid);
            $row = $db->query("DELETE FROM user_bank WHERE bank_id = :bankid;");
            if ($row) {
                return new Response('SUCCESS', 200);
            }
        } else {
            return new Response('Failed', 201);
        }
    });
    $app->post('/account/bank/list', function(Request $request) {
        $curpage = $request->get('page');
        include 'bank.list.php';
        return '';
    });
    // ALL GET
    $app->get('/account/fund-summary', function() {
        global $hooks;
        $_SESSION["filtersum"] = "";
        $hooks->add_action('global_css', "fund_css");
        $hooks->add_action('global_js', "fund_js");
        $hooks->add_action('the_title', "fund_title");
        the_head();
        include 'fund.tpl.php';
        the_footer();
        return "";
    });
    $app->get('/account/transfer', function() {
        global $hooks;
        global $global_min_trf;
        global $db;
       
        $hooks->add_action('global_js', "transfer_js");
        $hooks->add_action('the_title', "transfer_title");
        the_head();

        $planes=$db->query("SELECT * FROM  `product`");
        $optionplanes=array();
        foreach($planes as $plan){
           $id=$plan['product_id'];
           $nombre=$plan['product_name'];
           $optionplanes[]=array('id'=>$id,'nombre'=>$plan['product_name']);    
        }
        $uid=$_SESSION['uid'];
        $qb=$db->query("SELECT role FROM  `user_id` where uid=$uid");
        $rol=$qb[0]['role'];

        include 'transfer.tpl.php';
        the_footer();
        return "";
    });
    $app->get('/account/register-balance', function() {
        global $hooks;
        $hooks->add_action('global_js', "registerfund_js");
        $hooks->add_action('the_title', "registerfund_title");
        the_head();
        include 'registerfund.tpl.php';
        the_footer();
        return "";
    });
    $app->post('/account/register-balance/transfer', function(Request $request) {
        global $db;
        $db2=$db;
        $pin = $request->get('pin');
        $nominal = $request->get('nominal');
        // Check if current fund is enough, the pin is correct, and user has a devident
        if(isbanned()){
            return new Response('FAILED', 202);
        }

        if (current_utilities() >= $nominal && pinCorrect($pin) && hasDevidentAll($_SESSION["uid"])) {
            // PREPARE & PREVENT SQL INJECTION
            $db->bind("nominal", -$nominal);
            $db->bind("type_fund",3);
            $db->bind("notes", "TRANSFER PROFIT TO REGISTER FUND");
            $db->bind("from", $_SESSION["uid"]);
            $db->bind("to", $_SESSION["uid"]);
          
            $row = $db->query("INSERT INTO fund_transaction(type,type_fund,nominal,details,from_id,to_id,date) VALUES('8',:type_fund,:nominal,:notes,:from,:to,NOW())");
            
            $db->bind("nominal1", $nominal);
            $db->bind("type_fund",1);
            $db->bind("notes", "TRANSFER PROFIT TO BONUS");
            $db->bind("from", $_SESSION["uid"]);
            $db->bind("to", $_SESSION["uid"]);

            $row2 = $db->query("INSERT INTO fund_transaction(type,type_fund,nominal,details,from_id,to_id,date) VALUES('6',:type_fund,:nominal1,:notes,:from,:to,NOW())");
            
            if ($row2) {
                return new Response('SUCCESS', 200);
            }
        } else {
            return new Response('Failed', 201);
        }
    });


    $app->get('/account/withdraw', function() {
        global $hooks;
        global $global_wdable;
        global $global_wdreg;
        global $global_min_wd;
        $_SESSION["filterwithdraw"] = "";
        $hooks->add_action('global_css', 'bank_css');
        $hooks->add_action('global_js', 'withdraw_js');
        $hooks->add_action('the_title', "withdraw_title");
        the_head();
        if(isbanned()){
            include 'withdraw_banned.tpl.php';
        }else{
            include 'withdraw.tpl.php';
        }
       
        the_footer();
        return "";
    });
    $app->get('/account/bank/edit/{id}', function ($id) use ($app) {
        global $db;
        global $hooks;
        global $bankid;
        $bankid = $id;
        if (!isset($id) || !isBankMine($id)) {
            return $app->redirect('/account/bank');
        }

        $hooks->add_action('global_js', "editbank_js");
        $hooks->add_action('the_title', "editbank_title");
        the_head();
        include 'bank.edit.php';
        the_footer();
        return "";
    });
    $app->get('/account/bank/add', function() {
        global $hooks;
        $hooks->add_action('global_js', "addbank_js");
        $hooks->add_action('the_title', "addbank_title");
        the_head();
        include 'bank.add.php';
        the_footer();
        return "";
    });
    $app->get('/account/bank', function() {
        global $hooks;
        $hooks->add_action('global_css', "bank_css");
        $hooks->add_action('global_js', "bank_js");
        $hooks->add_action('the_title', "bank_title");
        the_head();
        include 'bank.tpl.php';
        the_footer();
        return "";
    });
// END
    $app->get('/account', function() use($app) {
        return $app->redirect('/account/fund-balance');
    });
}

function transType() {
    global $db;
    $trans = $db->query("SELECT * FROM type_transaction");
    foreach ($trans as $key => $value) {
        echo "<option value='" . $value["id"] . "'>" . $value["name"] . "</option>";
    }
}

function getTransName($id) {
    global $db;
    $db->bind("id", $id);
    $trans = $db->query("SELECT * FROM type_transaction WHERE id= :id;");
    return $trans[0]["name"];
}

function isBankMine($id) {
    global $db;
    $db->bind("bankid", $id);
    $db->bind("userid", $_SESSION["uid"]);
    $banks = $db->query("SELECT * FROM user_bank WHERE uid = :userid AND bank_id = :bankid;");
    if (count($banks) > 0) {
        return true;
    } else {
        return false;
    }
}

function hasBank() {
    global $db;
    $db->bind("uid", $_SESSION["uid"]);
    $banks = $db->query("SELECT * FROM user_bank WHERE uid = :uid");
    if (count($banks) > 0) {
        return true;
    } else {
        return false;
    }

}


function bankInfo($id, $data, $uid = "x") {
    global $db;
    $userid = ($uid == "x" ? $_SESSION["uid"] : $uid);
    $db->bind("uid", $userid);
    $db->bind("id", $id);
    $banks = $db->query("SELECT * FROM user_bank WHERE uid = :uid AND bank_id = :id");
    return $banks[0][$data];
}

function theBanks() {
    global $db;
    $db->bind("uid", $_SESSION["uid"]);
    $banks = $db->query("SELECT * FROM user_bank WHERE uid = :uid");
    foreach ($banks as $key => $value) {
        echo "<option value='" . $value["bank_id"] . "'>" . $value["bank_name"] . " - " . $value["acnumber"] . "</option>";
    }
}
