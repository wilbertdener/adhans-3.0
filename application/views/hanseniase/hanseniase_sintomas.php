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
                <a href="<?php echo base_url('hanseniase')?>">
                    Hanseníase
                </a>
            </li>

            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>

            <li class="nav-item">
                <a href="#">Sintomas</a>
            </li>
        </ul>
        <br><br>

        <div class="col-lg-12 mb-4 ">          
            <div class="card shadow mb-4 " >
                <div class="card-header py-3">
                    <h1 class="m-0 font-weight-bold text-primary">Sintomas</h1>
                </div>

                
                <div class="card-body">
                <?php 
                foreach ($sintomas_texto as $texto){
                    
                    

                ?>
                    
                        
                        <p><h4><?php echo $texto->texto?><h4></p>
                        <p class="mb-0">  </p>

                            <?php
                            
                            if($sintomas_img!=Null){
                                
                                    ?><div class="row justify-content-center align-items-center mb-1">

                                    <?php
                                foreach ($sintomas_img as $img){
                                    
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
        
        

    </div>
</div>
