<div class="row">
    <div class="col-md-12">
     <p>En esta función, puede ver todos los miembros que aparecen en su red, desde la persona patrocinada y los miembros existentes bajo su cuenta.</p>
                            <p>
                                1. Coloca el ratón en el árbol gráfico </br>
                                2. Puede arrastrar el gráfico para que pueda ampliar su vista de diagrama </br>
                                3. Si desea ver la red de su línea descendente, simplemente haga clic en su cuadro y obtendrá la información
                            </p>   
    </div>
    <div class="col-md-12" style="overflow:auto">
        <div class="pan-container">
            <div id='treeview-pan' class='pan-wrap' style="overflow:auto">
               <div class="tree">
                    <ul style='min-width:2000px;'>
                        <li data-id='<?php echo $_SESSION['uid']; ?>'>
                            <a href="#">
                                <div>
                                    <h3><i class='fa fa-star'></i> <?php echo strtoupper($_SESSION["uname"]); ?></h3>
                                    <?php if($_SESSION["role"]=="1"){ ?>
                                    <p>Points : <?php echo thePoints($_SESSION["uid"]); ?> </p>
                                    <div class='col-md-12 nodes-info'>
                                        <div class='col-md-3'>
                                         <?php echo countNodes($_SESSION["uid"],"right"); ?>
                                         
                                        </div>

                                        <div class='col-md-6 midx'>
                                             Nodes
                                        </div>
                                        <div class='col-md-3'>
                                             <?php echo countNodes($_SESSION["uid"],"left"); ?>
                                        </div>

                                  
                                        <div class='clearfix'></div>
                                    </div>  
                                             

                                    <div class='col-md-12 invest-info'>
                                        <div class='col-md-6 linfest'>
                                            <strong>Left Points</strong><br>
                                         <?php echo countPoints($_SESSION["uid"],"right"); ?>
                                        </div>
                                        <div class='col-md-6 rinfest'>
                                            <strong>Right Points</strong><br>
                                           
                                                <?php echo countPoints($_SESSION["uid"],"left"); ?>
                                        </div>
                                        <div class='clearfix'></div>
                                    </div> 
                                    <?php } ?>
                                </div>
                            </a>
                                <?php echo theTree(firstDownline($_SESSION["uid"])); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id='tree-loading'>
            <h2 style="text-align: center;padding-top: 40px;">CARGANDO SU ARBOL DE RED</h2>
        </div>
    </div>
</div>