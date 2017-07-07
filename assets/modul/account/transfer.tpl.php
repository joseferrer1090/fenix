<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Transfer Fund to another member
                        </header>
                        <div class="panel-body">
                            <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                               <h4>
                                    <i class="icon-ok-sign"></i>
                                    Success!
                                </h4>
                                <p>Yehaa.. Your fund has been transfered. Reload page in few seconds..</p>
                            </div>
                            <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                    Whoops!
                                </h4>
                                <p id="msjerror">Fund Transfer has been declined, make sure your recipient username is correct, also make sure you have sufficient balance. </p>
                            </div>
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="transferx" method="get" action="">
                                    <div class="form-group ">
                                        <label for="uname" class="control-label col-lg-2">Recipient Username</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="uname" id="uname" type="text" required/>
                                        </div>
                                    </div>
                                    <?php if($rol==0):?>
                                    <p class="text-center"> or</p>

                                         <div class="form-group ">
                                        <label for="types" class="control-label col-lg-2">Add founds membresia ?</label>
                                        <div class="col-lg-10">
                                            <select id="membreci" name="membreci" class="form-control">
                                                <option value=""> Select a member plan </option>
                                                <?php foreach ($optionplanes as $key=>$plan):?>
                                                <option value="<?php echo $plan['id'] ?>"> <?php echo $plan['nombre'] ?> </option>
                                               
                                             <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php endif ?>
                 

                                                <div class="form-group ">
                                        <label for="transfer" class="control-label col-lg-2">Add money</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input name="nominal" id="nominal" type="text" class="form-control" required=""/>
                                                <span class="input-group-addon">
                                                    USD ( <i class="fa fa-dollar"></i> )
                                                </span>
                                            </div>
                                        </div>
                                    </div>

 <?php if($rol==0):?>
                                                       <div class="form-group ">
                                        <label for="" class="control-label col-lg-2">Subtract Money
</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input name="nominalminus" id="nominalminus" type="text" class="form-control" />
                                                <span class="input-group-addon">
                                                    USD ( <i class="fa fa-dollar"></i> )
                                                </span>
                                            </div>
                                        </div>
                                    </div>
   <?php endif ?>
                 
   
                                   <div class="form-group ">
                                        <label for="types" class="control-label col-lg-2">Which Funds ?</label>
                                        <div class="col-lg-10">
                                            <select id="types" name="types" class="form-control">
                                                
                                                <option value="reg">BONUS FUNDS</option>
                                                <?php if($rol==0):?>
                                                <option value="util">UTILITY FUNDS </option>
                                                           <?php endif ?>
                                            </select>
                                        </div>
                                    </div>
                         

                                    


                                     <div class="form-group ">
                                        <label for="notes" class="control-label col-lg-2">Transaction Notes</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="notes" id="notes"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pin" class="control-label col-lg-2">Transaction PIN</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="pin" id="pin" type="password" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit" id='submitpin'>Send Fund</button>
                                            <button class="btn btn-default" type="button" id='waitingpin' disabled style="display:none;">Please Wait...</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
