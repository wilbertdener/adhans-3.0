
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
                <a href="#">Classificação</a>
            </li>
        </ul>
        <br><br>

        <div class="col-lg-12 mb-4 ">          
            <div class="card shadow mb-4 " >
                <div class="card-header py-3">
                    <h1 class="m-0 font-weight-bold text-primary">Classificação de Madri para a Hanseniase!</h1>
                </div>


            </div>
        </div>


        <div class="col-lg-12 mb-4 ">          
            <div class="card shadow mb-4 " >
                <div class="card-header py-3">
                    <h1 class="m-0 font-weight-bold text-primary">Hanseníase indeterminada (paucibacilar)</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($indeterminada_texto as $texto){
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($indeterminada_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($indeterminada_img as $img){
                                    
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
                    <h1 class="m-0 font-weight-bold text-primary">Hanseníase tuberculóide (paucibacilar)</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($tuberculoide_texto as $texto){
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($tuberculoide_img!=Null){
                                ?><div class="row justify-content-center align-items-center mb-1">

                                <?php
                                foreach ($tuberculoide_img as $img){
                                    
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
                    <h1 class="m-0 font-weight-bold text-primary">Hanseníase dimorfa (multibacilar)</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($dimorfa_texto as $texto){
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                        <div class="row justify-content-center align-items-center mb-1">

                            <?php
                            foreach ($dimorfa_img as $img){
                                
                            ?>
                                    
                                    <div class="col-md-3 pr-md-0" >
                                    <h6><?php echo $img->nome?><h6>
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                        <p><h6><?php echo $img->descricao?><h6></p>
                                    </div>
                                    

                            <?php
                                
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
                    <h1 class="m-0 font-weight-bold text-primary">Hanseníase virchowiana (multibacilar)</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($virchowiana_texto as $texto){
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        

                        <div class="row justify-content-center align-items-center mb-1">

                            <?php
                            foreach ($virchowiana_img as $img){
                                
                            ?>
                                    
                                    <div class="col-md-3 pr-md-0" >
                                    <h6><?php echo $img->nome?><h6>
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4 " style="width: 25rem;" src= <?php echo $img->local ?> alt="...">
                                        <p><h6><?php echo $img->descricao?><h6></p>
                                    </div>
                                    

                            <?php
                                
                            }
                            ?>
                    
                <?php

                    
                    
                }  ?>     
                </div>
            </div>
        </div>

       

    </div>
</div>