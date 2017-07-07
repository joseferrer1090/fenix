<div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <header class="panel-heading">
                Lista de Productos
            </header>
            <div class="panel-body">

                <div class="col-md-4" >
                    <a href="/products/add" class="btn btn-info"> Agregar Nuevo Producto</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px;">
                    <div class="product-tbl-wrap">
                        <div class="tblwrap">
                            <div id="loading"><p>Recuperando Datos del Servidor...</p></div>
                            <table id="product-tbl" class="footable table-bordered table-striped table-condensed" data-sort="false">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre del Producto</th>
                                        <th data-hide="phone,tablet">Tasa de dividento</th>
                                        <th data-hide="phone,tablet">Tasa de referencia de bonificación</th>
                                        <th data-hide="phone,tablet">Pareja Maxima / Dia</th>
                                        <th data-hide="phone,tablet">Join Value</th>
                                        <th data-hide="phone,tablet">Accion</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="product-tbl-content">
                                    <tr>
                                        <td>Cargando Datos...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>