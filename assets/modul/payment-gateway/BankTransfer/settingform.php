<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Configuración de la transferencia bancaria
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form payment-gateway-form">
                                    <div class="form-group ">
                                        <label for="testmode" class="control-label col-lg-2">Instrucciones de Pago</label>
                                        <div class="col-lg-10">
                                            <textarea name="gateway[BankTransfer][message]" class="form-control"><?php echo (isset($setting['message'])?$setting['message']:""); ?></textarea>
                                            <small>*)Html Tag Supported</small>
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
