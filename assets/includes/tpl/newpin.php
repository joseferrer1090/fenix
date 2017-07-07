<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Crear nuevo pin de transacción
                        </header>
                        <div class="panel-body">
                            <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                               <h4>
                                    <i class="icon-ok-sign"></i>
                                    Success!
                                </h4>
                                <p>Yehaa.. Su PIN se ha establecido. Redireccionando en pocos segundos ..</p>
                            </div>
                            <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                    Whoops!
                                </h4>
                                <p>No puedo crear tu PIN. Vuelve a intentarlo más tarde.</p>
                            </div>
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="newpin" method="get" action="">
                                    <div class="form-group ">
                                        <label for="pin" class="control-label col-lg-2">PIN de transacción</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="pin" name="pin" type="password" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_pin" class="control-label col-lg-2">Confirmar PIN</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="confirm_pin" name="confirm_pin" type="password" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit" id='submitpin'>Crear nuevo pin</button>
                                            <button class="btn btn-default" type="button" id='waitingpin' disabled style="display:none;">Por favor espera...</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>