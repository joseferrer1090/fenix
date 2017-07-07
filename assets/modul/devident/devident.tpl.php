<div class="row">
    <div class="col-md-12">
       <div class="panel">
           <header class="panel-heading" style="font-weight: normal;">
                                    
                                   <?php $a = floatval(number_format(getContentBar(),2)); 
                                  ?>
                                        <div class="progress progress-striped active progress-sm" style="height: 25px;">
                                            <div style="width: <?php echo $a; ?>%;padding-top:5px;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $a; ?>" role="progressbar" class="progress-bar progress-bar-success">
                                                <span><?php echo $a; ?>% Completo</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    DEVIDENT ID #<strong><?php echo getActiveDevID(); ?></strong><br>
                                                    DEVIDENT POINT : <strong>$<?php echo InvestNominal(); ?></strong>
                                                </div>
                                                <div class="col-md-6">
                                                    FECHA DE APERTURA : <strong><?php echo date('F d, Y',strtotime(devDate())); ?></strong></br>
                                                    DIA <strong><?php echo xDDay(); ?></strong> De 270 - BONOS QUE GANAN<strong>$<?php echo currentDevEarning(); ?></strong>
                                                </div>
                                                <div class="col-md-3" style="text-align: right;">
                                                    <a href="#closeDevModal" data-toggle="modal" class="btn btn-danger btn-extend"><i class="fa fa-times-circle"></i> ClOSE CURRENT DEVIDENT</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                 </header>
                                <div class="panel-body">
                                    
                                    <div class="row">
                                      <div class="col-md-12" style="margin-top: 10px;">
                                        <div class="devident-tbl-wrap">
                                        <div class="tblwrap">
                                        <div id="loading"><p>Recuperando datos del servidor...</p></div>
                                        <table id="devident-tbl" class="footable table-bordered table-striped table-condensed" data-sort="false">
                                            <thead>
                                                <tr>
                                                    <th>Fecha Devidente</th>
                                                    <th>Pocentaje de dividendos</th>
                                                    <th>Bono nominal</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="devident-tbl-content">
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="closeDevModal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                    <h4 class="modal-title">Dividendos Cerrados</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Seguro que quieres cerrar tu devident, si cierras tu devident activo antes del día 270, te cobrarán <strong> 80% </ strong> de tu inversión actual Como su penalidad.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-danger" id="closeDev" >Si, Cerrar Ahora</button>
                                                    <button type="button" class="btn btn-danger" id="waitya" disabled style="display:none;">Cerrando.. Espera por favor..</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>