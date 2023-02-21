
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
                <a href="<?php echo base_url('diagnostico')?>">Exames</a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="#">Teste de Sensibilidade</a>
            </li>
        </ul>
        <br><br>

        <div class="col-lg-12 mb-4 ">          
            <div class="card shadow mb-4 " >
                <div class="card-header py-3">
                    <h1 class="m-0 font-weight-bold text-primary">Teste da sensibilidade Termica</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($termica_texto as $texto){
                    
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($termica_img!=Null){
                                
                                    ?><div class="row justify-content-center align-items-center mb-1">

                                    <?php
                                foreach ($termica_img as $img){
                                    
                                ?>
                                        
                                        <div class="col-md-3 pr-md-0" >
                                        <h6><?php echo $img->nome?><h6>
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                            <p><h6><?php echo $img->descricao?><h6></p>
                                        </div>
                                        

                                <?php
                                        
                                    
                                }
                                ?></div ><?php
                            }
                            ?>
                    
                <?php

                    
                    
                }  ?>     
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 mb-4 ">          
            <div class="card shadow mb-4 " >
                <div class="card-header py-3">
                    <h1 class="m-0 font-weight-bold text-primary">Teste da sensibilidade Dolorosa</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($dolorosa_texto as $texto){
                    
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($dolorosa_img!=Null){
                                
                                    ?><div class="row justify-content-center align-items-center mb-1">

                                    <?php
                                foreach ($dolorosa_img as $img){
                                    
                                ?>
                                        
                                        <div class="col-md-3 pr-md-0" >
                                        <h6><?php echo $img->nome?><h6>
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                            <p><h6><?php echo $img->descricao?><h6></p>
                                        </div>
                                        

                                <?php
                                        
                                    
                                }
                                ?></div ><?php
                            }
                            ?>
                    
                <?php

                    
                    
                }  ?>     
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4 ">          
            <div class="card shadow mb-4 " >
                <div class="card-header py-3">
                    <h1 class="m-0 font-weight-bold text-primary">Teste da sensibilidade Tátil</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($tatil_texto as $texto){
                    
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($tatil_img!=Null){
                                
                                    ?><div class="row justify-content-center align-items-center mb-1">

                                    <?php
                                foreach ($tatil_img as $img){
                                    
                                ?>
                                        
                                        <div class="col-md-3 pr-md-0" >
                                        <h6><?php echo $img->nome?><h6>
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                            <p><h6><?php echo $img->descricao?><h6></p>
                                        </div>
                                        

                                <?php
                                        
                                    
                                }
                                ?></div ><?php
                            }
                            ?>
                    
                <?php

                    
                    
                }  ?>     
                </div>
                <div class="row justify-content-center align-items-center mb-1">
                    <div class="col-md-9 pr-md-0 ">          
                        <div class="card shadow mb-4 " >
                            <div class="card-header py-3" style="background:#7927A5!important;">
                                <h1 class="m-0 font-weight-bold text-primary" style="color:white!important;">ATENÇÃO</h1>
                            </div>

                            
                            <div class="card-body">
                            <?php 
                            foreach ($tatil_texto as $texto){
                                
                                if($texto->topico == "importante"){

                            ?>
                                
                                    
                                    <p><h4><?php echo $texto->texto?><h4></p>
                                    <p class="mb-0">  </p>

                                        <?php
                                        
                                        if($tatil_img!=Null){
                                            
                                                ?><div class="row justify-content-center align-items-center mb-1">

                                                <?php
                                            foreach ($tatil_img as $img){
                                                
                                            ?>
                                                    
                                                    <div class="col-md-3 pr-md-0" >
                                                    <h6><?php echo $img->nome?><h6>
                                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                                        <p><h6><?php echo $img->descricao?><h6></p>
                                                    </div>
                                                    

                                            <?php
                                                    
                                                
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
