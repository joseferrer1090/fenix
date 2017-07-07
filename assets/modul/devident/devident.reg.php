<div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Rellene el siguiente formulario para realizar el nuevo Registro de Devident
                        </header>
                        <div class="panel-body">
                        <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                               <h4>
                                    <i class="icon-ok-sign"></i>
                                    Success!
                                </h4>
                                <p>Yehaa.. Has logrado hacer un nuevo devident .. Recarga página.</p>
                            </div>
                            <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                    Whoops!
                                </h4>
                                <p>No se puede registrar devident, asegúrese de que su PIN es correcto, también asegúrese de tener suficiente Balance. 
                                    </p>
                            </div>    
                      <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="registerdev" method="get" action="">
                                    <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">Activar enviar dinero</label>
                                        <div class="col-lg-10" style="display:none">
                                            <select class="form-control" id="nominal">
                                                <option value="0">Aceptar</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pin" class="control-label col-lg-2">PIN de transacción</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="pin" id="pin" type="password" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit" id='submitpin'>Activar </button>
                                            <button class="btn btn-default" type="button" id='waitingpin' disabled style="display:none;">Espere un momento...</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

