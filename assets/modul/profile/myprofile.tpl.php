 <div class="row">
                <div class="col-md-4">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <ul class="p-info">
                                        <li>
                                            <div class="title">Nombres</div>
                                            <div class="desk"><?php echo getProfileData($_SESSION["uid"], "first_name"); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Apellidos</div>
                                            <div class="desk"><?php echo getProfileData($_SESSION["uid"], "last_name"); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Genero</div>
                                            <div class="desk"><?php echo getProfileData($_SESSION["uid"], "gender"); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Email</div>
                                            <div class="desk"><?php echo getProfileData($_SESSION["uid"], "email"); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Celular</div>
                                            <div class="desk"><?php echo getProfileData($_SESSION["uid"], "mobile"); ?></div>
                                        </li>
                                         <li>
                                            <div class="title">Telefono</div>
                                            <div class="desk"><?php echo getProfileData($_SESSION["uid"], "phone"); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">Relacion</div>
                                            <div class="desk"><?php echo getProfileData($_SESSION["uid"], "relation"); ?> of <?php echo getProfileData($_SESSION["uid"], "beneficiary"); ?></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                        <h4>Address <span>Information</span></h4>
                                        <br>
                                        <div>
                                            <?php echo getProfileData($_SESSION["uid"], "address"); ?> <br>
                                            <?php echo getProfileData($_SESSION["uid"], "zip"); ?> <?php echo getProfileData($_SESSION["uid"], "city"); ?><br>
                                            <?php echo getProfileData($_SESSION["uid"], "state"); ?> <?php echo getProfileData($_SESSION["uid"], "country"); ?>
                                        </div>
                                    </div>
                                    <div id="expense" class="chart-bar"></div>
                                </div>
                            </div>
                        </div>
                        !-->
                        <?php if($_SESSION["role"]=="1"){ ?>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                        <h4>Informacion del plan</h4>
                                        <span>El producto al que se suscribe actualmente</span>
                                        <h3 style='margin-bottom: 10px;border-bottom: 2px solid #F5F5F5;padding-bottom: 10px;'><?php echo getActiveProduct($_SESSION["uid"], "product_name"); ?></h3>
                                         <ul class="p-info">
                                            <?php $id=getActiveProduct($_SESSION["uid"], "product_id"); ?>
                                            <?php if ($id!=38):?>
                                            <li>
                                                <div class="title">Rentabilidad Diaria</div>
                                                <div class="desk"><?php echo getActiveProduct($_SESSION["uid"], "rentability"); ?> USD</div>
                                            </li>
                                            <li>
                                                <div class="title">Dias </div>
                                                <div class="desk"><?php echo getActiveProduct($_SESSION["uid"], "days"); ?></div>
                                            </li>
                                             <li>
                                                <div class="title">Sponsor Bonus Rate</div>
                                                <div class="desk"><?php echo getActiveProduct($_SESSION["uid"], "referral_rate"); ?> (%)</div>
                                            </li>
                                            <li>
                                                <div class="title">Max Pairing</div>
                                                <div class="desk"><?php echo getActiveProduct($_SESSION["uid"], "max_pairing"); ?> ($) per Day</div>
                                            </li>
                                          <?php else:?> 
                                           <li>
                                                <div class="title">Rentabilidad al Mes</div>
                                                <div class="desk"><?php echo getActiveProduct($_SESSION["uid"], "rentability"); ?> %</div>
                                            </li>
                                            <li>
                                                <div class="title">Dias </div>
                                                <div class="desk"><?php echo getActiveProduct($_SESSION["uid"], "days"); ?></div>
                                            </li>
                                             <li>
                                                <div class="title">Bono al Patrocinador</div>
                                                <div class="desk"><?php echo getActiveProduct($_SESSION["uid"], "referral_rate"); ?> (%)</div>
                                            </li>
                                        <?php endif ?> 
                                         </ul>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ultima Conexion</h3>
                        </div>
                        <div class="panel-body">
                            <?php lastLoginAttempt(10); ?>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <!--<div class="col-md-4">
                            <a href="/profile/edit" class="btn btn-info btn-lg btn-block">
                                EDIT PROFILE
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="/profile/chpwd" class="btn btn-success btn-lg btn-block">
                                CHANGE PASSWORD
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="#" class="btn btn-primary btn-lg btn-block">
                                CHANGE PIN
                            </a>
                        </div>
                         !-->
                    </div>
                </div>
 </div>