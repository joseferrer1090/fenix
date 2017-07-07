<div class="row">
    <div class="col-md-12">
       <div class="panel">
                <header class="panel-heading">
                    Todos los Usuarios
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <div class="col-md-3">
                                            <input type="text" size="16" class="form-control" placeholder="Username" id="user">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-append date dpYears">
                                                <input type="text" readonly=""  size="16" class="form-control" placeholder="REGISTER DATE" id="date" style="cursor:pointer;">
                                                    <span class="input-group-btn add-on">
                                                        <button onclick="clearDate();" class="btn btn-primary tooltips" type="button" data-toggle="tooltip " data-placement="bottom" title="" data-original-title="Click to clear date"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-append date dpYears">
                                                <select id="state" name="state" class="form-control">
                                                    <option value="">Todos</option>
                                                    <option value="0">Inactivos</option>
                                                    <option value="2">Activos</option>
                                                </select>
                                                
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>        
                                        </div>    
                                        <div class="col-md-4" style="text-align: right;">
                                            <a href="javascript:void()" id="filter" class="btn btn-info"><i class="fa fa-search"></i> Filtar</a>
                                            <a href="javascript:void()" id="clearfilter" class="btn btn-danger"><i class="fa fa-ban"></i> Limpiar Filtro</a>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12" style="margin-top: 10px;">
                                        <div class="usr-tbl-wrap">
                                        <div class="tblwrap">
                                        <div id="loading"><p>Recuperando Datos del Server...</p></div>
                                        <table id="usr-tbl" class="footable table-bordered table-striped table-condensed" data-sort="false">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Usuario</th>
                                                    <th data-hide="phone,tablet">Fecha de Registro</th>
                                                    <th data-hide="phone,tablet">UPLINE</th>
                                                    <th data-hide="phone,tablet">Patrocinador</th>
                                                    <th data-hide="phone,tablet">Detalles</th>
                                                    <th data-hide="phone,tablet">Menbresia</th>
                                                    <th data-hide="phone,tablet">Estado</th>
                                                    <th data-hide="phone,tablet">Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="usr-tbl-content">
                                                <tr>
                                                    <td>Cargado Datos</td>
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