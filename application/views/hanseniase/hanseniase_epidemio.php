<style>
.center {
  line-height: 200px;
  height: 200px;
  
  text-align: center;
  padding: 70px 0;
}

</style>

<div class="main-panel">
    <div class="content">
        
    <br>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="<?php echo base_url('dashboard')?>">
                    <i class="flaticon-home"></i>
                    &nbspInício
                </a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('hanseniase')?>">
                    Hanseníase
                </a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="#">Epidemiologia</a>
            </li>
        </ul>
        <br><br>




        <div class="col-lg-12 mb-4 ">
            <div class="card shadow mb-4 " >

            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary">Epidemiologia </h2>
            </div>
            <div class="card-body">
            <?php 
                
            foreach ($epidemio_texto as $texto){
                if($texto->topico=="Introducao"){

            ?>
                    
                        <h3 style="color:blue;">Introdução<h3><br>
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($epidemio_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($epidemio_img as $img){
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
                            
            foreach ($epidemio_texto as $texto){
                if($texto->topico=="Teste"){
                    ?>
                    
                    <br><h3 style="color:blue;">Método<h3><br>
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($epidemio_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($epidemio_img as $img){
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
                <!-- Card de aviso -->
                <div class="row justify-content-center align-items-center mb-1">
                    <div class="col-md-9 pr-md-0 ">          
                        <div class="card shadow mb-4 " >
                            <div class="card-header py-3" style="background:#7927A5!important;">
                                <h1 class="m-0 font-weight-bold text-primary" style="color:white!important;">ATENÇÃO</h1>
                            </div>

                            
                            <div class="card-body">
                                <!--Provisório-->
                                <div class="row">
                                    <div class="col-md-6" style="  text-align: right; ">
                                        <i class="fa-solid fa-person-digging" aria-hidden="true" style="font-size: 5rem;"></i>
                                    </div>
                                    <div class="col-md-6">                
                                        <h1 class="m-0 font-weight-bold text-primary"  style="  padding: 25px 0; " >Em construção</h1>
                                    </div>
                                </div>
                                    <!--Provisório-->

                            <?php
                            foreach ($epidemio_texto as $texto){
                                
                                if($texto->topico == "Conclusao"){

                            ?>
                                
                                    
                                    <p><h4><?php echo $texto->texto?><h4></p>
                                    
                                    <p class="mb-0">  </p>

                                        <?php
                                        
                                        if($epidemio_img!=Null){
                                            
                                                ?><div class="row justify-content-center align-items-center mb-1">

                                                <?php
                                            foreach ($epidemio_img as $img){
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