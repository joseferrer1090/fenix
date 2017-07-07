<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Configuración de correo
                        </header>
                        <div class="panel-body">
                            <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                               <h4>
                                    <i class="icon-ok-sign"></i>
                                    Success!
                                </h4>
                                <p>Yehaa.. Configuración de correo se ha guardado</p>
                            </div>
                            <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                    Whoopss!
                                </h4>
                                <p>Algun Error en tu Configuración</p>
                            </div>
                            <div class="form">
                                <form class="cmxform form-horizontal adminex-form" id="mailsave" method="get" action="">
                                    <div class="form-group ">
                                        <label for="sender" class="control-label col-lg-2">Remitente del correo</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="sender" id="sender" type="text" value="<?php echo $setting["sender"]; ?>" required/>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="uname" class="control-label col-lg-2">Correo Electronico</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="uname" id="uname" type="text" value="<?php echo $setting["uname"]; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pass" class="control-label col-lg-2">Contraseña de Correo</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="pass" id="pass" type="password" value="" />
                                            <p>Si no desea cambiar la contraseña, déjela vacía</p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="signature" class="control-label col-lg-2">HOST</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="host" id="host" value="<?php echo $setting["host"]; ?>" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="logouri" class="control-label col-lg-2">PUERTO</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " name="port" id="port" value="<?php echo $setting["port"]; ?>" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="mailmode" class="control-label col-lg-2">Modo de Correo</label>
                                        <div class="col-lg-10">
                                            <select class="form-control " name="mailmode" id="mailmode" >
                                                <option value="smtp" <?php echo ($setting['mailmode']=='smtp'?'selected':''); ?>>SMTP</option>
                                                <option value="phpmail" <?php echo ($setting['mailmode']=='phpmail'?'selected':''); ?>>PHP MAIL</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit" id='submit'>Guardar</button>
                                            <button class="btn btn-default" type="button" id='waiting' disabled style="display:none;">Espere un momento...</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
