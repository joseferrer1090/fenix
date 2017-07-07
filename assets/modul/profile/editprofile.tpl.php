<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Rellene el siguiente formulario para editar su perfil
                        </header>
                        <div class="panel-body">
                            <div id='suksesupdate' class="alert alert-success alert-block fade in" style='display:none;'>
                               <h4>
                                    <i class="icon-ok-sign"></i>
                                    Success!
                                </h4>
                                <p>Yehaa.. Tu Perfil se ha modificado con exito</p>
                            </div>
                            <div id='gagalupdate' class="alert alert-danger alert-block fade in" style='display:none;'>
                                <h4>
                                    <i class="icon-ok-sign"></i>
                                    Whoops!
                                </h4>
                                <p>No se puede actualizar tu perfil. Vuelve a intentarlo más tarde (Asegúrate de realizar cambios en tu perfil al actualizarlo)</p>
                            </div>
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" id="editForm" method="post" action="">
                                    <div class="form-group">
                                        <label for="fname" class="control-label col-lg-2">Nombres (requirido)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="fname" name="fname" minlength="2" type="text" required value="<?php echo getProfileData($_SESSION["uid"], "first_name"); ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname" class="control-label col-lg-2">Apellidos (requerido)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="lname" name="lname" minlength="2" type="text" required value="<?php echo getProfileData($_SESSION["uid"], "last_name"); ?>"/>
                                        </div>
                                    </div>

                                        
                                    <div class="form-group">
                                        <label for="gender" class="control-label col-lg-2">Genero</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="MALE" <?php echo (getProfileData($_SESSION["uid"], "gender")=="MALE" ? "selected" : ""); ?> >Male</option>
                                                <option value="FEMALE" <?php echo (getProfileData($_SESSION["uid"], "gender")=="FEMALE" ? "selected" : ""); ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">E-Mail (required)</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="cemail" type="email" name="email" required value="<?php echo getProfileData($_SESSION["uid"], "email"); ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="mobile" name="mobile" placeholder="" data-mask="(+99) 9999-9999-99" class="form-control" value="<?php echo getProfileData($_SESSION["uid"], "mobile"); ?>" >
                                        <span class="help-inline">(+01) 1234-1234-12</span>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="phone" name="phone" placeholder="" data-mask="(+99) 9999-9999-99" class="form-control" value="<?php echo getProfileData($_SESSION["uid"], "phone"); ?>" >
                                        <span class="help-inline">(+01) 1234-1234-12</span>
                                    </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="address" class="control-label col-lg-2">Address (required)</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control " id="address" name="address" required><?php echo getProfileData($_SESSION["uid"], "address"); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="control-label col-lg-2">City (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="city" name="city" minlength="2" type="text" required value="<?php echo getProfileData($_SESSION["uid"], "city"); ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="zip" class="control-label col-lg-2">Zip (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="zip" name="zip" minlength="2" type="text" required value="<?php echo getProfileData($_SESSION["uid"], "zip"); ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="state" class="control-label col-lg-2">State</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="state" name="state" minlength="2" type="text" required value="<?php echo getProfileData($_SESSION["uid"], "state"); ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country" class="control-label col-lg-2">Country</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" id="country" name="country" minlength="2" type="text" required value="<?php echo getProfileData($_SESSION["uid"], "country"); ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" id='submitprofile' type="submit">SAVE PROFILE</button>
                                            <button class="btn btn-default" id="waiting" style="display:none;">Submitting data...</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>