<div class="row">
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
Wallet
                        </header>
                        <div class="panel-body">
                           
                            <div class="form">
                                <?php if(hasBank()){ ?>
                                <form class="cmxform form-horizontal adminex-form" id="wdfund" method="get" action="">
                                    <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">AVAILABLE FUNDS
</label>
                                        <div class="col-lg-10" style="margin:20px 0 0 0">
                                            <div class="input-group">
                                               <strong style="padding:10px 20px; border:solid 1px rgba(0,0,0,.5); border-radius:3px;"><?php echo ($_SESSION["role"] == "1" ? "$" . number_format((float)current_fund(), 2, '.', '' ) : "UNLIMITED"); ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">PROFIT FUNDS
</label>
                                        <div class="col-lg-10" style="margin:20px 0 0 0">
                                            <div class="input-group">
                                               <strong style="padding:10px 20px; border:solid 1px rgba(0,0,0,.5); border-radius:3px;"><?php echo ($_SESSION["role"] == "1" ? "$" .   number_format((float)current_utilities() , 2, '.', '' )  : "UNLIMITED"); ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">BONUS FUNDS
</label>
                                        <div class="col-lg-10" style="margin:20px 0 0 0">
                                            <div class="input-group">
                                               <strong style="padding:10px 20px; border:solid 1px rgba(0,0,0,.5); border-radius:3px;"><?php echo ($_SESSION["role"] == "1" ? "$" . number_format((float)current_register_fund()  , 2, '.', '') : "UNLIMITED"); ?></strong>
                                            </div>
                                        </div>
                                    </div>
                              

                                                <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">POINTS FUNDS
</label>
                                        <div class="col-lg-10" style="margin:20px 0 0 0">
                                            <div class="input-group">
                                               <strong style="padding:10px 20px; border:solid 1px rgba(0,0,0,.5); border-radius:3px;">  $<?php echo  (countPoints($_SESSION["uid"] ,"right")-countPoints($_SESSION["uid"],"left"))/10 ; ?> </strong>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <?php }else{ ?>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6">
                    <section class="panel panel-primary" style="    margin-top: 20px;" >
                        <header class="panel-heading">
Steps to remove Funds                        </header>
                        <div class="panel-body">
                            <p>
                                Steps to withdraw funds from your wallet.
                                The rules are :
                            </p>
                            <p>
                                <ol>
                                    <li>
                                        
complete Form to remove Funds <strong></strong>
                                    </li>
                                      <li>
                                        

recalls that the minimum withdrawal amount from your wallet is <strong><?php echo $global_min_wd; ?></strong>
                                    </li>
                                    <li>
                                        In the next 24 hours it will be reflected in retirement in the bank account register.
                                    </li>
                                </ol>
                            </p>
                        </div>
                    </section>
                </div>
</div>
<div class="row">
    <div class="col-md-12">
       <div class="panel">
                                 <header class="panel-heading">
                                    
Form to withdraw funds from your wallet
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                <form action="/modul/account/contact.php" method="post">
                                <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="nombre" class="control-label col-lg-2">USER</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="nombre" id="nombre" type="text" required="" value="<?php echo strtoupper($_SESSION["uname"]); ?>">

                                        </div>
                                    </div>
                                     <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="email" class="control-label col-lg-2">EMAIL</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="email" id="email" type="text" required="" value="<?php echo getProfileData($_SESSION["uid"], "email"); ?>">
                                        </div>
                                    </div>
                                      <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="tipetrans" class="control-label col-lg-2">Type of trasaccion</label>
                                        <div class="col-lg-10">
                                            <select id="tipetrans" name="tipetrans" class="form-control" onChange="pagoOnChange(this)" required="">
                                                <option value=""> Select Type of trasaccion </option>
                                                <option value="BANK"> BANK </option>
                                                <option value="BITCOIN WALLET"> BITCOIN WALLET </option>                                                                                  
                                               
                                            </select>
                                        </div>                                       
                                    </div>
                                    <div id="bitcoinsl" style="display:none;">
                                     <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="namebit" class="control-label col-lg-2">Bitoin wallet name</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="namebit" id="namebit" type="text" value="xxxxx" required="">
                                        </div>
                                    </div>
                                     <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="idbit" class="control-label col-lg-2">Id wallet</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="idbit" id="idbit" type="text" value="xxxxx" required="">
                                        </div>
                                    </div>
                                    <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="numbit" class="control-label col-lg-2">Account number of bitcoin wallet</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="numbit" id="numbit" type="text" value="xxxxx" required="">
                                        </div>
                                    </div>
                                    </div>
                                     <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="monto" class="control-label col-lg-2">Amount of trasaccion</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="monto" id="monto" type="number" min="100" required="">
                                        </div>
                                    </div>
                                     <div class="form-group " style="padding-bottom: 30px;">
                                        <label for="mensaje" class="control-label col-lg-2">Cometary</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control " name="mensaje" id="mensaje" type="text" required=""></textarea> 
                                        </div>
                                    </div>	
                               
      

        </span>
         <span class="input input--jiro col-xs-12">
        <input type="submit" id="botonen" class="btn btn-default"  value="Enviar"   />
        </span>

        </form> 
            <script type="text/javascript">
function pagoOnChange(sel) {
      if (sel.value=="BITCOIN WALLET"){
           divC = document.getElementById("bitcoinsl");
           divC.style.display = "block";

          

      }else{

           divC = document.getElementById("bitcoinsl");
           divC.style.display="none";

           
      }
}
</script>                          

    </div></div>
</div></div></div>