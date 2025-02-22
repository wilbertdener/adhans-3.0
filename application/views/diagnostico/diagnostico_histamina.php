<div class="main-panel">
    <div class="content">
        

    <br>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?php echo base_url('dashboard_hans')?>">
                    <i class="flaticon-home"></i>
                    &nbspInício
                </a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('diagnostico')?>">Exames</a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="#">Teste de Histamina</a>
            </li>
        </ul>
        <br><br>

        <br>
        <div class="col-lg-12 mb-4 ">
            <div class="card shadow mb-4 " >

                <div class="card-header py-3">
                    <h1 class="m-0 font-weight-bold text-primary">Prova de Histamina </h1>
                </div>
            </div>
        </div>

         
        <br>
        <div class="col-lg-12 mb-4 ">
            <div class="card shadow mb-4 " >

            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary">Prova de Histamina Exógena </h2>
            </div>
            <div class="card-body">
            <?php 
                
            foreach ($exo_texto as $texto){
                if($texto->topico=="Introducao"){

            ?>
                    
                        <h3 style="color:blue;">Introdução<h3><br>
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($exo_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($exo_img as $img){
                                    if($img->topico=="Introcucao"){
                                ?>
                                        
                                        <div class="col-md-3 pr-md-0" >
                                        <h6><?php echo $img->nome?><h6>
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                            <p><h6><?php echo $img->descricao?><h6></p>
                                        </div>
                                        

                                <?php
                                    }
                                }
                                ?></div ><?php
                            }
                            ?>
                    
            <?php

                }
                
            }
                            
            foreach ($exo_texto as $texto){
                if($texto->topico=="Teste"){
                    ?>
                    
                    <br><h3 style="color:blue;">Método<h3><br>
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($exo_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($exo_img as $img){
                                    if($img->topico=="Teste"){
                                ?>
                                        
                                        <div class="col-md-3 pr-md-0" >
                                        <h6><?php echo $img->nome?><h6>
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                            <p><h6><?php echo $img->descricao?><h6></p>
                                        </div>
                                        

                                <?php
                                    }
                                }
                                ?></div ><?php
                            }
                            ?>
                    
            <?php
                }
                
            }

            
            ?>
            
            <div class="row justify-content-center align-items-center mb-1">
                <div class="col-md-9 pr-md-0 ">          
                    <div class="card shadow mb-4 " >
                        <div class="card-header py-3" style="background:#7927A5!important;">
                            <h1 class="m-0 font-weight-bold text-primary" style="color:white!important;">ATENÇÃO</h1>
                        </div>

                        
                        <div class="card-body">
                        <?php 
                        foreach ($exo_texto as $texto){
                            
                            if($texto->topico == "Conclusao"){

                        ?>
                            
                                
                                <p><h4><?php echo $texto->texto?><h4></p>
                                <p class="mb-0">  </p>

                                    <?php
                                    
                                    if($exo_img!=Null){
                                        
                                            ?><div class="row justify-content-center align-items-center mb-1">

                                            <?php
                                        foreach ($exo_img as $img){
                                            if($img->topico=="Conclusao"){
                                            
                                        ?>
                                                
                                                <div class="col-md-3 pr-md-0" >
                                                <h6><?php echo $img->nome?><h6>
                                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                                    <p><h6><?php echo $img->descricao?><h6></p>
                                                </div>
                                                

                                        <?php
                                                
                                            
                                            }
                                        }
                                        ?></div ><?php
                                    }
                                    ?>
                            
                        <?php

                            }
                            
                        }  ?>     
                        </div>
                    </div>
                </div>
            </div>




            </div>
        </div>



        <br>
        <div class="col-lg-12 mb-4 ">
            <div class="card shadow mb-4 " >

            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary">Prova de Histamina Endógena </h2>
            </div>
            <div class="card-body">
            <?php 
                
            foreach ($endo_texto as $texto){
                if($texto->topico=="Introducao"){

            ?>
                    
                        <h3 style="color:blue;">Introdução<h3><br>
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($endo_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($endo_img as $img){
                                    if($img->topico=="Introducao"){
                                ?>
                                        
                                        <div class="col-md-3 pr-md-0" >
                                        <h6><?php echo $img->nome?><h6>
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                            <p><h6><?php echo $img->descricao?><h6></p>
                                        </div>
                                        

                                <?php
                                    }
                                }
                                ?></div ><?php
                            }
                            ?>
                    
            <?php

                }
                
            }
                            
            foreach ($endo_texto as $texto){
                if($texto->topico=="Teste"){
                    ?>
                    
                    <br><h3 style="color:blue;">Método<h3><br>
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($endo_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($endo_img as $img){
                                    if($img->topico=="Teste"){
                                ?>
                                        
                                        <div class="col-md-3 pr-md-0" >
                                        <h6><?php echo $img->nome?><h6>
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                            <p><h6><?php echo $img->descricao?><h6></p>
                                        </div>
                                        

                                <?php
                                    }
                                }
                                ?></div ><?php
                            }
                            ?>
                    
            <?php
                }
                
            }

            ?>

                <div class="row justify-content-center align-items-center mb-1">
                    <div class="col-md-9 pr-md-0 ">          
                        <div class="card shadow mb-4 " >
                            <div class="card-header py-3" style="background:#7927A5!important;">
                                <h1 class="m-0 font-weight-bold text-primary" style="color:white!important;">ATENÇÃO</h1>
                            </div>

                            
                            <div class="card-body">
                            <?php 
                            foreach ($endo_texto as $texto){
                                
                                if($texto->topico == "Conclusao"){

                            ?>
                                
                                    
                                    <p><h4><?php echo $texto->texto?><h4></p>
                                    <p class="mb-0">  </p>

                                        <?php
                                        
                                        if($endo_img!=Null){
                                            
                                                ?><div class="row justify-content-center align-items-center mb-1">

                                                <?php
                                            foreach ($endo_img as $img){
                                                if($img->topico=="Conclusao"){
                                                
                                            ?>
                                                    
                                                    <div class="col-md-3 pr-md-0" >
                                                    <h6><?php echo $img->nome?><h6>
                                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                                        <p><h6><?php echo $img->descricao?><h6></p>
                                                    </div>
                                                    

                                            <?php
                                                    
                                                
                                                }
                                            }
                                            ?></div ><?php
                                        }
                                        ?>
                                
                            <?php

                                }
                                
                            }  ?>     
                            </div>
                        </div>
                    </div>
                </div>
                 

            </div>
        </div>
        
    



    </div>
</div>

