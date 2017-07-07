<?php global $prodid; ?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Rellene el siguiente formulario para editar el producto
            </header>
            <div class="panel-body">
                <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                 <h4>
                    <i class="icon-ok-sign"></i>
                    Success!
                </h4>
                <p>Yehaa.. Su nuevo producto ha sido creado. Redireccionando en pocos segundos ..</p>
            </div>
            <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                <h4>
                    <i class="icon-ok-sign"></i>
                    Whoops!
                </h4>
                <p>Editar el nuevo producto se ha rechazado, asegúrese de que su PIN es correcto</p>
            </div>
            <div class="form">
                <form class="cmxform form-horizontal adminex-form" id="addproduct" method="POST" action="/products/edit/submit" enctype='multipart/form-data'>
                    <input type="hidden" name="id" id="id" value="<?php echo $prodid; ?>">
                    <div class="form-group ">
                        <label for="bank_name" class="control-label col-lg-2">Nombre de Producto</label>
                        <div class="col-lg-10">
                            <input class="form-control " name="product_name" id="product_name" type="text" value="<?php echo productInfo($prodid, "product_name"); ?>" required/>
                        </div>
                    </div>
                   <div class="form-group ">
                    <label for="nominal" class="control-label col-lg-2">Join Value</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input  name="value" id="value" type="text" class="form-control" value="<?php echo productInfo($prodid, "value"); ?>" required=""/>
                            <span class="input-group-addon">
                                USD ( <i class="fa fa-dollar"></i> )
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="nominal" class="control-label col-lg-2">Precio Maximo</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input name="max_pair" id="max_pair" type="text" class="form-control" value="<?php echo productInfo($prodid, "max_pairing"); ?>" required=""/>
                            <span class="input-group-addon">
                                USD ( <i class="fa fa-dollar"></i> )
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <label for="nominal" class="control-label col-lg-2">Dias del Plan</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input name="days" id="days" type="text" class="form-control" value="<?php echo productInfo($prodid, "days"); ?>" required=""/>
                            <span class="input-group-addon">
                                Days
                            </span>
                        </div>
                    </div>
                </div>


                <div class="form-group ">
                    <label for="nominal" class="control-label col-lg-2">Puntos</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input name="points" id="points" type="text" class="form-control" value="<?php echo productInfo($prodid, "points"); ?>" required=""/>
                            <span class="input-group-addon">
                                Puntos
                            </span>
                        </div>
                    </div>
                </div>


                <div class="form-group ">
                    <label for="nominal" class="control-label col-lg-2">Tarifa de referencia</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input name="ref" id="ref" type="text" class="form-control" value="<?php echo productInfo($prodid, "referral_rate"); ?>" required=""/>
                            <span class="input-group-addon">
                                % ( Pocentaje )
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="dev" class="control-label col-lg-2">Tasa de Dividendos</label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input name="devrate" id="devrate" type="text" class="form-control" value="<?php echo productInfo($prodid, "devident_rate"); ?>" required=""/>
                            <span class="input-group-addon">
                                Devident Rate 1 / Devident Rate 2, ex: 1/3, significa que 1 es la tasa de devident en el día 1 hasta 100, y 3 es la tasa de devident en el día 101 hasta 270
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" id='submitpin'>Editar Producto</button>
                        <button class="btn btn-default" type="button" id='waitingpin' disabled style="display:none;">Espere un momento...</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</div>
</div>
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previmg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$('#btnfile').click(function(e){
    e.preventDefault();
    $("#file").click();
    $('#file').change(function(){
        readURL(this);
    });
    
})
</script>