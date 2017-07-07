<?php global $bankid; ?>
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Rellene el siguiente formulario para agregar una nueva cuenta bancaria
                        </header>
                        <div class="panel-body">
                            <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                               <h4>
                                    <i class="icon-ok-sign"></i>
                                    Success!
                                </h4>
                                <p>Yehaa.. Su cuenta bancaria se ha actualizado. Redireccionando en pocos segundos ..</p>
                            </div>
                            <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                    Whoops!
                                </h4>
                                <p>Actualizar cuenta bancaria se ha rechazado, asegúrese de que su PIN es correcto</p>
                            </div>
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="editbank" method="get" action="">
                                    <input type="hidden" id="bankid" value="<?php echo $bankid;?>">
                                    <div class="form-group ">
                                        <label for="bank_name" class="control-label col-lg-2">Nombre de Banco</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="bank_name" id="bank_name" type="text" value="<?php echo bankInfo($bankid, "bank_name"); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="branchname" class="control-label col-lg-2">Nombre de Sucursal</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="branchname" id="branchname" type="text" value="<?php echo bankInfo($bankid, "branch_name"); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="holder" class="control-label col-lg-2">Nombre del titular</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="holder" id="holder" type="text" value="<?php echo bankInfo($bankid, "bankholder"); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="acnumber" class="control-label col-lg-2">Numero de cuenta</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="acnumber" id="acnumber" type="text" value="<?php echo bankInfo($bankid, "acnumber"); ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="swiftcode" class="control-label col-lg-2">Swift Code</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="swiftcode" id="swiftcode" type="text" value="<?php echo bankInfo($bankid, "swiftcode"); ?>" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="pin" class="control-label col-lg-2">PIN de Trasaccion</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="pin" id="pin" type="password" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit" id='submitpin'>Actualizar Datos</button>
                                            <button class="btn btn-default" type="button" id='waitingpin' disabled style="display:none;">Espere un momento...</button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
