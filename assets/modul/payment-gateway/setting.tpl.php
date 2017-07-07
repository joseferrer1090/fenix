<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <div class='row'>
                    <div class='col-md-8'>
                        <select name='add-payment-gateway' id='gateways' class='form-control'>
                            <option value="0">Seleccione Gateway de pago para activarlo</option>
                            <?php
                            foreach ($payment_gateway as $key => $value) {
                                if (!in_array($value["id"], $active_gateway)) {
                                    echo "<option value='" . $value["id"] . "'>" . $value["name"] . "</option>";
                                }
                            }
                            ?>
                        </select>    
                    </div>
                    <div class='col-md-4'>
                        <a href='#' class="btn btn-success btn-block" id='activatePayment'>Activar Metodo de pago</a>
                    </div>    
                </div>
            </header>
        </section>
    </div>
</div>
<?php
if (is_array($active_gateway) && !empty($active_gateway)) {
    foreach ($active_gateway as $key => $value) {
        $gateway = new $value();
        $gateway->loadSetting();
        $gateway->render_setting_form();
        echo "<p><a class='btn btn-danger btn-large deactivate' data-id='".$value."' >Desactivar</a> <a class='btn btn-info btn-large save-all' >Guardar todas las configuraciones</a></p>";
    }
}
?>
</br></br>
<p></p>