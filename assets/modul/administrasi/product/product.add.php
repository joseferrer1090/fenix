<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Rellene el siguiente formulario para añadir un nuevo productoFill form below to add new product
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
                                <p>Agregar nuevo producto se ha rechazado, asegúrese de que su PIN es correcto</p>
                            </div>
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="addproduct" method="get" action="">
                                    <div class="form-group ">
                                        <label for="bank_name" class="control-label col-lg-2">Nombre de Producto</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="product_name" id="product_name" type="text" required/>
                                        </div>
                                    </div>
                                      <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">Join Value</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input  name="value" id="value" type="text" class="form-control" required=""/>
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
                                                <input name="max_pair" id="max_pair" type="text" class="form-control" required=""/>
                                                <span class="input-group-addon">
                                                    USD ( <i class="fa fa-dollar"></i> )
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                             <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">Dias de Plan</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input name="days" id="days" type="text" class="form-control" required=""/>
                                               
                                            </div>
                                        </div>
                                    </div>

                                             <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">Puntos</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input name="points" id="days" type="text" class="form-control" required=""/>
                                               
                                            </div>
                                        </div>
                                    </div>

                                      <div class="form-group ">
                                        <label for="nominal" class="control-label col-lg-2">Tarifa de Referencia</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input name="ref" id="ref" type="text" class="form-control" required=""/>
                                                <span class="input-group-addon">
                                                    % ( Percentage )
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="form-group ">
                                        <label for="dev" class="control-label col-lg-2">Tasa de Dividendos</label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <input name="devrate" id="devrate" type="text" placeholder="1/3" class="form-control" required=""/>
                                                <span class="input-group-addon">
                                                    Por ejemplo: 1/3, significa que 1 (%) es la tasa de devidencia en el día 1 hasta la mitad (x) del último día de inversión, y 3 (%) es la tasa de devidencia en el día (x) Hasta el último día
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit" id='submitpin'>Agregar Producto</button>
                                            <button class="btn btn-default" type="button" id='waitingpin' disabled style="display:none;">Espere un momento...</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>