<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Comprar Puntos
            </header>
            <div class="panel-body">
                <?php
                if (isset($_SESSION["datahtml"])) {
                    echo $_SESSION["datahtml"];
                    unset($_SESSION["datahtml"]);
                    unset($_SESSION["purchase"]);
                    ?>
                <?php } else { ?>
                    <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                        <h4>
                            <i class="icon-ok-sign"></i>
                            Success!
                        </h4>
                        <p>Yehaa.. Se ha Guardado su Configuracion</p>
                    </div>
                    <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                        <h4>
                            <i class="icon-ok-sign"></i>
                            Whoops!
                        </h4>
                        <p>Error al Guardar su configuracion</p>
                    </div>
                    <div class="form">
                        <form class="cmxform form-horizontal adminex-form" id="buypoint" method="get" action="">

                            <div class="form-group ">
                                <label for="transfer" class="control-label col-lg-2">Monto</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input name="amount" id="amount" type="text" class="form-control" required="" data-minimum="<?php echo $global_min_bpoint; ?>"/>
                                        <span class="input-group-addon">
                                            USD ( <i class="fa fa-dollar"></i> )
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <select name='paymentgateway' id='paymentgateway' class='form-control'>
                                        <option value="0">Seleccione el metodo de Pago </option>
                                        <?php
                                        foreach ($payment_gateway as $key => $value) {
                                            if (in_array($value["id"], $active_gateway)) {
                                                echo "<option value='" . $value["id"] . "'>" . $value["name"] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" id='submitpayment'>Pagar Ahora</button>
                                    <button class="btn btn-default" type="button" id='waitingpayment' disabled style="display:none;">Espere un momento...</button>

                                </div>
                            </div>
                        </form>

                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
</div>
