<style>

input[type=file]::file-selector-button {
  border: 2px solid #6c5ce7;
  padding: .2em .4em;
  border-radius: .2em;
  background-color: #7927A5;
  color:white;
  transition: 1s;
}

input[type=file]::file-selector-button:hover {
  background-color: #c300c3;
  border: 2px solid #00cec9;
}

.upload{
  border: 2px solid #6c5ce7;
  padding: .2em .4em;
  border-radius: .2em;
  background-color: #7927A5;
  color:white;
  transition: 1s;
  text-align: center;
}

.center {
  line-height: 0px;
  height: 100px;
  
  text-align: center;
  padding: 0px 0;
}

.right {
    align:"right";
}


</style>


<div class="main-panel" id="teste">
    <div class="content">
        <head>

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
                    <a href="#">Acompanhamento</a>
                </li>
            </ul>
            <br><br>
        
        </head>
        <body>
            <div class="col-lg-12 mb-4 ">
                <div class="card shadow mb-4 " >
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">   
                                <div class="col-md-10">
                                    <h6 class="m-0 font-weight-bold text-primary">Usuários em acompanhamento</h6>
                                </div>
                                <div class="col-md-2">

                                    <button id="addUs" data-toggle="modal" data-target="#modalNewUser" data-id="add" class="open-AddUser btn btn-success float-right btn-round" style="background:#7927A5!important" title="Inserir Usuário">
                                        <span class="btn-label">
                                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                        </span>&nbsp;Adicionar usuário
                                    </button>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Mostrar <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> dados</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Pesquisar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 62px;">Nome</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 72px;">Cadastro</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 52px;">Exame</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Histórico</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Editar</th></tr>
                                    </thead>
                                    <tfoot>
                                        <tr><th rowspan="1" colspan="1">Nome</th><th rowspan="1" colspan="1">Cadastro</th><th rowspan="1" colspan="1">Exames</th><th rowspan="1" colspan="1">Historico</th><th rowspan="1" colspan="1">Editar</th></tr>
                                    </tfoot>
                                    <tbody>

                                    <?php foreach ($pacientes as $pac){?>
                                        <tr>
                                            <td class="sorting_1"><?php echo $pac->nome?></td>
                                            <td><?php echo $pac->cod?></td>
                                            <td>
                                                
                                                <div class="d-flex justify-content-around">
                                                    
                                                    <button data-toggle="modal" data-target="#modalUpLoadEndo" data-id="<?php echo $pac->cod?>" class="btn btn-light" onclick="setid(<?php echo $pac->cod?>)">
                                                        <a href="#" onclick="">
                                                        <i class="fa-sharp fa-solid fa-heading" title="Teste da histamina endogena" style="color:#7927A5!important" ></i>
                                                        </a>
                                                    </button>

                                                    <button data-toggle="modal" data-target="#modalUpLoadExo" data-id="<?php echo $pac->cod?>" class="btn btn-light">
                                                        <a href="#" onclick="">
                                                        <i class="fa-solid fa-syringe" title="Teste da histamina exogena" style="color:#7927A5!important" ></i>
                                                        </a>
                                                    </button>
                                                    
                                                    <button data-toggle="modal" data-target="#modalUpLoadTerm" data-id="<?php echo $pac->cod?>" class="btn btn-light">
                                                        <a href="#" onclick="">
                                                        <i class="fa-solid fa-fire" title="Teste termica" style="color:#7927A5!important" ></i>
                                                        </a>
                                                    </button>

                                                    <button data-toggle="modal" data-target="#modalUpLoadDol" data-id="<?php echo $pac->cod?>" class="btn btn-light">
                                                        <a href="#" onclick="">
                                                        <i class="fa-solid fa-hand-back-fist" title="Teste dolorosa" style="color:#7927A5!important" ></i>
                                                        
                                                        </a>
                                                    </button>

                                                    <button data-toggle="modal" data-target="#modalUpLoadTat" data-id="<?php echo $pac->cod?>" class="btn btn-light">
                                                        <a href="#" onclick="">
                                                        <i class="fa-solid fa-hand-point-up" title="Teste tátil" style="color:#7927A5!important" ></i>
                                                        </a>
                                                    </button>


                                                    
                                                    <button data-toggle="modal" data-target="#modalUpLoadSud" data-id="<?php echo $pac->cod?>" class="btn btn-light">
                                                        
                                                    <a href="#" onclick="">
                                                        <i class="fa-solid fa-droplet" title="Função sudoral" style="color:#7927A5!important" id="Função sudoral" ></i>
                                                        </a>
                                                        
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">    
                                                    <button data-toggle="modal" data-target="#modalHistorico" data-id="a" class="btn btn-light">
                                                        
                                                        <a href="#" onclick="" >
                                                            <i class="fa-solid fa-file-waveform" style="color:#7927A5!important" title="Ver histórico"></i>
                                                        </a>
                                                        
                                                    </button>
                                                </div>
                                            </td>

                                            <td>
                                                <button data-toggle="modal" data-target="#modalEditUser" data-id="<?php echo $pac->cod?>" class="btn btn-light">
                                                    
                                                    <a href="#" onclick="">
                                                    
                                                        <i class="fa-solid fa-user-pen" title="Editar" style="color:#7927A5!important" id="Editar" ></i>
                                                    </a>
                                                    
                                                </button>

                                            </td>
                                            
                                        </tr>



                                    <?php }?>
                                   
                                </table>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Mostrando 1 a 10 de <?php echo count($pacientes)?> </div>
                            </div>
                            <div class="col-sm-12 col-md-7" >
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination" >
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a>
                                        </li>
                                        <li class="paginate_button page-item active" >
                                            <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                        </li><li class="paginate_button page-item ">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                        </li>
                                        <li class="paginate_button page-item ">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                        </li>
                                        <li class="paginate_button page-item next" id="dataTable_next">
                                            <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Próximo</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            
                        
                    </div>
                </div>
            </div>
            
            

        </body>


        

                                      
        <!--upload foto endogena modal-->
        
        <div class="container-fluid modal fade" id="modalUpLoadEndo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                    <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalUpLoadEndoTitle">
                                <span class="fw-mediumbold">
                                Teste da Histamina Endógena</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form id="uploadimage" action="/action_page.php" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="center">
                                            <a href="<?php echo base_url('diagnostico/histamina')?>" class="btn btn-primary btn-lg " style="background:#7927A5!important;margin-bottom:20px;position:right;">Como realizar o teste</a><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <h3>Tente enviar fotos com:</h3>
                                        <h6>Foco<br>Em locais bem iluminado<br>De preferencia com fundo branco</h6><br>
                                    </div>
                                </div>    
                                
                                
                                <form  action="upload.php" method="post" >
                                    
                                    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                                    <!--
                                    <label>Documento(*.csv)</label>
                                    <input type="file" class="custom-file-input" accept=".csv" id="csv_file" name="csv_file" />
                                    <label for="csv_file" class = 'label_doc_name'>Nenhum arquivo inserido</label>-->
                                    
                                </form>
                                <!--<input id="myFile" name="filename"  ><br><br>-->
                                
                                <p>Resumo</p>
                                <input type="text" class="form-control form-control-user" id="resumo" placeholder="Resumo" value=""><br>
                                <p>Status</p>
                                <input type="text" class="form-control form-control-user" id="status" placeholder="Status" value=""><br>
                                <!-- ID oculto do paciente -->
                                <input type="text" style="display:none" id="id_do_paciente">
                                <p>Comentario</p>
                                
                                <textarea   class="form-control form-control-user" id="comentario"  value="" >
                                   
                                    </textarea><br>
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="addNewDoc()" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--upload foto exogena modal-->
        
        <div class="container-fluid modal fade" id="modalUpLoadExo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalUpLoadExoTitle">
                                <span class="fw-mediumbold">
                                Teste da histamina Exogena</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="center">
                                            <a href="<?php echo base_url('diagnostico/histamina')?>" class="btn btn-primary btn-lg " style="background:#7927A5!important;margin-bottom:20px;position:right;">Como realizar o teste</a><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <h3>Tente enviar fotos com:</h3>
                                        <h6>Foco<br>Em locais bem iluminado<br>De preferencia com fundo branco</h6><br>
                                    </div>
                                </div>    
                                
                                <input type="file" id="myFile" name="filename"><br><br>
                                <!--<input id="myFile" name="filename"  ><br><br>-->
                                
                                <p>Resumo</p>
                                <input type="text" class="form-control form-control-user" id="resumo" placeholder="Resumo" value=""><br>
                                <p>Status</p>
                                <input type="text" class="form-control form-control-user" id="status" placeholder="Status" value=""><br>
                                <!-- ID oculto do paciente -->
                                <input type="text" style="display:none" id="id_do_paciente">
                                <p>Comentario</p>
                                
                                <textarea   class="form-control form-control-user" id="comentario"  value="" >
                                   
                                    </textarea><br>
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="addNewDoc()" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--modal lixo-->
        <div class="container-fluid modal fade" id="modalTrash" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalTrashTitle">
                                <span class="fw-mediumbold">
                                Teste da sensibilidade Termica</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="center">
                                            <a href="<?php echo base_url('diagnostico/sens')?>" class="btn btn-primary btn-lg " style="background:#7927A5!important;margin-bottom:20px;position:right;">Como realizar o teste</a><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <h3>Tente enviar fotos com:</h3>
                                        <h6>Foco<br>Em locais bem iluminado<br>De preferencia com fundo branco</h6><br>
                                    </div>
                                </div>    
                                
                                <input type="file" id="myFile" name="filename"><br><br>
                                <!--<input id="myFile" name="filename"  ><br><br>-->
                                
                                <p>Resumo</p>
                                <input type="text" class="form-control form-control-user" id="resumo" placeholder="Resumo" value=""><br>
                                <p>Status</p>
                                <input type="text" class="form-control form-control-user" id="status" placeholder="Status" value=""><br>
                                <!-- ID oculto do paciente -->
                                <input type="text" style="display:none" id="id_do_paciente">
                                <p>Comentario</p>
                                
                                <textarea   class="form-control form-control-user" id="comentario"  value="" >
                                   
                                    </textarea><br>
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="setphoto('termica')" >
                            </p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--upload foto termica modal-->
        
        <div class="container-fluid modal fade" id="modalUpLoadTerm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalUpLoadTermTitle">
                                <span class="fw-mediumbold">
                                Teste da sensibilidade Termica</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="center">
                                            <a href="<?php echo base_url('diagnostico/sens')?>" class="btn btn-primary btn-lg " style="background:#7927A5!important;margin-bottom:20px;position:right;">Como realizar o teste</a><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <h3>Tente enviar fotos com:</h3>
                                        <h6>Foco<br>Em locais bem iluminado<br>De preferencia com fundo branco</h6><br>
                                    </div>
                                </div>    
                                
                                <input type="file" id="myFile" name="filename"><br><br>
                                <!--<input id="myFile" name="filename"  ><br><br>-->
                                
                                <p>Resumo</p>
                                <input type="text" class="form-control form-control-user" id="resumo" placeholder="Resumo" value=""><br>
                                <p>Status</p>
                                <input type="text" class="form-control form-control-user" id="status" placeholder="Status" value=""><br>
                                <!-- ID oculto do paciente -->
                                <input type="text" style="display:none" id="id_do_paciente">
                                <p>Comentario</p>
                                
                                <textarea   class="form-control form-control-user" id="comentario"  value="" >
                                   
                                    </textarea><br>
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="setphoto('termica')" >
                            </p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--upload foto dolorosa modal-->
        
        <div class="container-fluid modal fade" id="modalUpLoadDol" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalUpLoadDolTitle">
                                <span class="fw-mediumbold">
                                Teste da Sensibilidade Dolorosa</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="center">
                                            <a href="<?php echo base_url('diagnostico/sens')?>" class="btn btn-primary btn-lg " style="background:#7927A5!important;margin-bottom:20px;position:right;">Como realizar o teste</a><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <h3>Tente enviar fotos com:</h3>
                                        <h6>Foco<br>Em locais bem iluminado<br>De preferencia com fundo branco</h6><br>
                                    </div>
                                </div>    
                                
                                <input type="file" id="myFile" name="filename"><br><br>
                                <!--<input id="myFile" name="filename"  ><br><br>-->
                                
                                <p>Resumo</p>
                                <input type="text" class="form-control form-control-user" id="resumo" placeholder="Resumo" value=""><br>
                                <p>Status</p>
                                <input type="text" class="form-control form-control-user" id="status" placeholder="Status" value=""><br>
                                <!-- ID oculto do paciente -->
                                <input type="text" style="display:none" id="id_do_paciente">
                                <p>Comentario</p>
                                
                                <textarea   class="form-control form-control-user" id="comentario"  value="" >
                                   
                                    </textarea><br>
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="setphoto('dolorosa')" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--upload foto tatil modal-->
        
        <div class="container-fluid modal fade" id="modalUpLoadTat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalUpLoadTatTitle">
                                <span class="fw-mediumbold">
                                Teste de Sensibilidade Tátil</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="center">
                                            <a href="<?php echo base_url('diagnostico/sens')?>" class="btn btn-primary btn-lg " style="background:#7927A5!important;margin-bottom:20px;position:right;">Como realizar o teste</a><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <h3>Tente enviar fotos com:</h3>
                                        <h6>Foco<br>Em locais bem iluminado<br>De preferencia com fundo branco</h6><br>
                                    </div>
                                </div>    
                                
                                <input type="file" id="myFile" name="filename"><br><br>
                                <!--<input id="myFile" name="filename"  ><br><br>-->
                                
                                <p>Resumo</p>
                                <input type="text" class="form-control form-control-user" id="resumo" placeholder="Resumo" value=""><br>
                                <p>Status</p>
                                <input type="text" class="form-control form-control-user" id="status" placeholder="Status" value=""><br>
                                <!-- ID oculto do paciente -->
                                <input type="text" style="display:none" id="id_do_paciente">
                                <p>Comentario</p>
                                
                                <textarea   class="form-control form-control-user" id="comentario"  value="" >
                                   
                                    </textarea><br>
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="setphoto('tatil')" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--upload foto sudoral modal-->
        
        <div class="container-fluid modal fade" id="modalUpLoadSud" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalUpLoadSudTitle">
                                <span class="fw-mediumbold">
                                Função Sudoral</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="center">
                                            <a href="<?php echo base_url('diagnostico/sudoral')?>" class="btn btn-primary btn-lg " style="background:#7927A5!important;margin-bottom:20px;position:right;">Como realizar o teste</a><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <h3>Tente enviar fotos com:</h3>
                                        <h6>Foco<br>Em locais bem iluminado<br>De preferencia com fundo branco</h6><br>
                                    </div>
                                </div>    
                                
                                <input type="file" id="myFile" name="filename"><br><br>
                                <!--<input id="myFile" name="filename"  ><br><br>-->
                                
                                <p>Resumo</p>
                                <input type="text" class="form-control form-control-user" id="resumo" placeholder="Resumo" value=""><br>
                                <p>Status</p>
                                <input type="text" class="form-control form-control-user" id="status" placeholder="Status" value=""><br>
                                <!-- ID oculto do paciente -->
                                <input type="text" style="display:none" id="id_do_paciente">
                                <p>Comentario</p>
                                
                                <textarea   class="form-control form-control-user" id="comentario"  value="" >
                                   
                                    </textarea><br>
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="setphoto('sudoral')" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--timeline historico modal-->
        <div class="container-fluid modal fade" id="modalHistorico" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                    <div class = "modal-content">
                        
                        <div class="modal-header no-bd">
                            <h1 class="modal-title" id="modalHistorico">
                                <span class="fw-mediumbold">
                                Histórico</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <div class="timeline">
                                <div class="container left">
                                    <div class="content">
                                        <div class="tracking-item">
                                            <div class="row">

                                                <div class="col-md-2">
                                                    <img id="myImg1" src="/adhans/application/views/acompanhamento/imagens/a (2).jpg" style="width: 10rem;" alt="Snow" style="float: left;  margin: 0 15px 0 0;">
                                                </div>

                                                <div class="col-md-10">

                                                    <a title="Exibir minha ficha" class="tracking-icon status-intransit" data-toggle="collapse" data-target="#detail0">
                                                        <i class="fas fa-clipboard-list"></i>
                                                        
                                                    </a>
                                                    <span>28/12/2022</span>
                                                    <span>01:35:36</span><br>
                                                    <span>Status: Suspeita</span><br>
                                                    <span>Exame: Teste de Histamina Endógena</span><br>
                                                </div>

                                            
                                                <div id="myModal" class="modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content" id="img01">
                                                    <div id="caption"></div>
                                                </div>

                                                <div class="card collapse border-left-info" id="detail0">
                                                    <div class="card-header">Comentários</div>
                                                    <div class="card-body">
                                                        <ul>* Realizado teste de hiostamina endogena na area suspeita. *</ul>    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <br><br><br><br>
                                <div class="container right">
                                    <div class="content">
                                        <div class="tracking-item">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img id="myImg2" src="/adhans/application/views/acompanhamento/imagens/a (3).jpg" style="width: 10rem;" alt="Snow" style="float: left;  margin: 0 15px 0 0;">
                                                </div>
                                                <div class="col-md-10">

                                                    <a title="Exibir minha ficha" class="tracking-icon status-intransit" data-toggle="collapse" data-target="#detail0">
                                                        <i class="fas fa-clipboard-list"></i>
                                                        
                                                    </a>
                                                    <span>28/12/2022</span>
                                                    <span>01:35:36</span><br>
                                                    <span>Status: Suspeita</span><br>
                                                    <span>Exame: Teste de Histamina Endógena</span><br>
                                                </div>

                                            
                                                <div id="myModal" class="modal">
                                                    <span class="close">&times;</span>
                                                    <img class="modal-content" id="img02">
                                                    <div id="caption2"></div>
                                                </div>
                                                <div class="card collapse border-left-info" id="detail0">
                                                    <div class="card-header">Comentários</div>
                                                    <div class="card-body">
                                                        <ul>* Realizado teste de hiostamina endogena na area suspeita. *</ul>    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>

                        

                    </div>
                </div>
            </div>
        </div>

        <!--Editar paciente-->
        
        <div class="container-fluid modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                    <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalEditUserTitle">
                                <span class="fw-mediumbold">
                                Editar usuário em acompanhamento</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            
 
                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <p>Nome</p>
                                <input type="text" class="form-control form-control-user" id="nome_edit_user" placeholder="Nome completo" value=""><br>
                                <p>Data Nascimento</p>
                                <input type="date" class="form-control form-control-user" id="data_edit_user"  value=""><br>
                                <p>Código de registro</p>
                                <input type="text" class="form-control form-control-user" id="cod_edit_user" placeholder="Resumo" value=""><br>
                                
                                
                                
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="updateuser()" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--Novo paciente-->
        
        <div class="container-fluid modal fade" id="modalNewUser" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="row justify-content-center" style="margin-bottom:20px;margin-top:20px;">
            
                <div class="col-sm-10 col-sm-offset-1 col-md-10 col-lx-6 col-md-offset-3 main" style="background-color:#fff; padding:20px;border-radius:10px;">
                    <div class = "modal-content">
                        
                        <div class="modal-header no-bd" >
                            <h1 class="modal-title" id="modalNewUserTitle">
                                <span class="fw-mediumbold">
                                Adicionar novo usuário</span> 
                                
                            </h1>
                            
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" onclick="reload()" >
                                <span aria-hidden="true" >&times;</span>
                                
                            </button>
                            

                        </div>
                    
                        <div class="modal-body">

                            <p></p>
                            <form action="/action_page.php">

                                <p>Nome</p>
                                <input type="text" class="form-control form-control-user" id="nome_new_user" placeholder="Nome completo" value=""><br>
                                <p>Data Nascimento</p>
                                <input type="date" class="form-control form-control-user" id="data_new_user"  value=""><br>
                                <p>Código de registro</p>
                                <input type="text" class="form-control form-control-user" id="cod_new_user" placeholder="Resumo" value=""><br>
                                
                                
                                
                            </form>
                            

                        </div>

                        <div class="modal-tail" >
                            <p align="right">
                                <input type="submit" class="btn btn-primary btn-lg" style="background:#7927A5!important" onclick="setuser()" >
                            </p>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>

            
                                        



    </div>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script >

    function reload(){
        location.reload();
    }
    //$(document).on("click", function () {
        
        //var modal = document.getElementById('close');
        //location.reload();
        
    //});

    $(document).ready(function() {

        $('#modalUpLoadEndo').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var pac_id = $(e.relatedTarget).data('id');
            var div_do_id = document.getElementById("id_do_paciente");
            div_do_id.value = pac_id;

            //populate the textbox
            //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
            //alert(pac_id);
            
        });

    });

    $(document).ready(function() {

        $('#modalUpLoadExo').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var pac_id = $(e.relatedTarget).data('id');
            var div_do_id = document.getElementById("id_do_paciente");
            div_do_id.value = pac_id;

            //populate the textbox
            //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
            //alert(pac_id);
        });

    });

    $(document).ready(function() {

        $('#modalUpLoadTerm').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var pac_id = $(e.relatedTarget).data('id');
            var div_do_id = document.getElementById("id_do_paciente");
            div_do_id.value = pac_id;

            //populate the textbox
            //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
            //alert(pac_id);
        });

    });

    $(document).ready(function() {

        $('#modalUpLoadDol').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var pac_id = $(e.relatedTarget).data('id');
            var div_do_id = document.getElementById("id_do_paciente");
            div_do_id.value = pac_id;

            //populate the textbox
            //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
            //alert(pac_id);
        });

    });

    $(document).ready(function() {

        $('#modalUpLoadTat').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var pac_id = $(e.relatedTarget).data('id');
            var div_do_id = document.getElementById("id_do_paciente");
            div_do_id.value = pac_id;

            //populate the textbox
            //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
            //alert(pac_id);
        });

    });

    $(document).ready(function() {

        $('#modalUpLoadSud').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var pac_id = $(e.relatedTarget).data('id');
            var div_do_id = document.getElementById("id_do_paciente");
            div_do_id.value = pac_id;

            //populate the textbox
            //$(e.currentTarget).find('input[name="bookId"]').val(bookId);
            //alert(pac_id);
        });

    });

    $(document).ready(function() {

        $('#modalEditUser').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            var pac_id = $(e.relatedTarget).data('id');
            var div_do_id = document.getElementById("id_do_paciente");
            div_do_id.value = pac_id;

            
        });

    });
    console.log(<?php echo $teste?>);
    // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img1 = document.getElementById("myImg1");
var modalImg1 = document.getElementById("img01");
var captionText = document.getElementById("caption");

img1.onclick = function(){
  modal.style.display = "block";
  modalImg1.src = this.src;
  captionText.innerHTML = this.alt;
  modal.style.width = "50rem";
}


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[2];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

function setphoto(tipo){
    
    var resumo = document.getElementById("resumo").value;//document.getElementById("resumo");//.value;
    
    var status = document.getElementById("status").value;//document.getElementById("status");//.value;
    var comentario = document.getElementById("comentario").value;
    var pac = document.getElementById("id_do_paciente").value;
    
    var local = "/adhans/application/views/acompanhamento/historico/" + pac;// + "-" + data + ".jpg";
    
    //var id_m = <?php echo $id_user?>;





     
    $.post("<?php echo site_url('acompanhamento/setfoto/');?>", {id_resumo:resumo,id_status:status,id_comentario:comentario,id_exame:tipo,id_local:local,id_paciente:pac, id_med:id_m },
    
    );
    

    location.reload();
}

function setuser(){
    var nome = document.getElementById("nome_new_user").value;
    var data = document.getElementById("data_new_user").value;
    var cod = document.getElementById("cod_new_user").value;

    //var id_m = <?php echo $id_user?>;

    $.post("<?php echo site_url('acompanhamento/setuser/');?>", {id_nome:nome,id_data:data,id_cod:cod,id_med:id_m},
    
    );
    location.reload();

}

function updateuser(){
    var nome = document.getElementById("nome_edit_user").value;
    var data = document.getElementById("data_edit_user").value;
    var newcod = document.getElementById("cod_edit_user").value;
    var cod = document.getElementById("id_do_paciente").value;


    

    $.post("<?php echo site_url('acompanhamento/updateuser/');?>", {id_nome:nome,id_data:data,id_cod:cod,id_new_cod:newcod},
    
    );
    location.reload();

}

function addNewDoc(){
        var nameChosen = "teste";//document.getElementById("docName").value;
        var doc = document.getElementById("fileToUpload").files;
        var docTest = document.getElementById("fileToUpload").value;
        
        
        
        var form = document.getElementById("uploadimage");
        var formData = new FormData(form);

        if(verifyRequired(nameChosen, docTest)){

            for(var pair of formData.entries()) {
                if(pair[0] == 'fileToUpload'){
                    var file = pair[1];
                }
            }
            console.log();
            
            var docName = doc[0].name;
            var indices = getIndicesOf(docName);
            var extension = docName.substr(indices);//ok ate aqui
            
            var url = "<?php echo site_url('acompanhamento/addNewDocument/');?>";//
            
            var url = String(url+extension+'/'+nameChosen+'/');
            
            

            $.ajax({
                type: "POST",
                url: url,
                data: file,
                processData: false, // impedir que o jQuery tranforma a "data" em querystring
                
                success: function (data) {
                    swal({
                        title: 'Você adicionou!',
                        text: 'Documento adicionado com sucesso',
                        icon: 'success',
                        buttons : {
                            confirm: {
                            className : 'btn btn-success'
                            }
                        }
                        }).then(function(){ 
                            //console.log(data);
                            location.reload();
                        });
                },
                // manipular erros da requisição
                error: function (e) {
                    swal({
                        title: 'Não importado!',
                        text: 'Esse problema pode ocorrer devido a caracteres especiais no nome',
                        icon: 'error',
                        buttons : {
                            confirm: {
                            className : 'btn btn-danger'
                            }
                        }
                        //swal.close();
                        }).then(function(){ 
                        //location.reload();
                        });// fecha o swal
                }
            });
        }
    }

    function getIndicesOf(searchStr) {
        var str = ".";
        var start = searchStr.length;
        var indices = -1;
        if (start == 0) {
            return -1;
        }
        for (var i = start; i > -1; i--){
            if(searchStr[i] == str){
                indices = i;
                break;
            }
        }
        return indices;
    }

    function verifyRequired(nameChosen, doc){
        if(nameChosen == ""){
            swal("Atenção!", "Por favor, preencha o nome do documento.", {
              icon : "info",
              buttons: {        			
                confirm: {
                  className : 'btn btn-info'
                }
              },
            });
            return false;
        }else if(doc == ''){
            swal("Atenção!", "Por favor, faça o upload de algum documento.", {
              icon : "info",
              buttons: {        			
                confirm: {
                  className : 'btn btn-info'
                }
              },
            });
            return false;
        }else{
            return true;
        }
    }

    function setid(id){

        <?php $pac->cod?>
    }


</script>