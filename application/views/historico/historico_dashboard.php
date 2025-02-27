<style>
.center {
  line-height: 200px;
  height: 200px;
  
  text-align: center;
  padding: 70px 0;
}

.center b{
  line-height: 0px;
  height: 0px;
  
  text-align: center;
  
}

</style>


        
        

<div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
    

    <div class="col-md-3 pr-md-0 " style="display: flex; justify-content: center; align-items: center; ">
        <a class="card card-pricing "  style="background:#650086;margin-bottom:10px;border-radius: 50px; padding: 0px 10px;width: 90%; ">
            <div class="card-header">
                    <i class="fa-solid fa-backward" style="color:#B319D0;font-size: 2rem; position: absolute; left: 20px; top: 30px;" onclick="window.location.href='<?php echo base_url('dashboard'); ?>'"></i>
                    <span class="price " style="color:#FFFFFF; font-size:2rem">Histórico</span>
                    
                
            </div>
        </a>
    </div>

</div>















<?php foreach($exames as $exame){?>
<div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;background:#B319D0" >

    <div class="row justify-content-center align-items-center d-flex flex-wrap ">
        <div class="col-1 col-md-3 d-flex justify-content-center align-items-center " style="display: flex; justify-content: center; align-items: center; ">
            <i class="fa-solid fa-file-invoice" style="color:#9223B3;font-size: 6rem;" ></i>

        </div>
        <div class="col-6 col-md-6 d-flex justify-content-center align-items-center" style="display: flex; justify-content: center; align-items: center; ">
            <div style="display: flex; flex-direction: column; ">
                <span style="color: #ffffff; font-size: 20px; font-family: Bookman Old Style, sans-serif; ">
                    <?php echo $exame->nome_pac; ?>
                </span>
                <span style="color: #ffffff; font-size: 15px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                Hanseníase: <?php if($exame->diagnostico){echo 'Positivo';}else{echo 'Negativo';} ?>
                </span>
                <span style="color: #ffffff; font-size: 15px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                    <i class="fa-solid fa-calendar-days"style="color:#650086;font-size: 1.5rem;"></i>   <?php echo date("d/m/Y", strtotime($exame->data)); ?>
                </span>
            </div>
        </div>
        <div class="col-2 col-md-3 d-flex justify-content-center align-items-center" style="display: flex; justify-content: center; align-items: center; ">
            
            <i class="fa-solid fa-camera abrirModal"style="color:#650086;margin-bottom:20px;border-radius: 50px; padding: 10px 20px;width: 90%;"
                
                data-nome="<?php echo $exame->nome_pac; ?>" 
                data-data="<?php echo $exame->data; ?>" 
                data-foto1="<?php echo $exame->id_foto1; ?>" 
                data-foto2="<?php echo $exame->id_foto2; ?>" 
                data-bs-toggle="modal" 
                data-bs-target="#meuModal"
               
            ></i>
            
            
        </div>
    </div>

    
    

    <div class="row justify-content-center align-items-center d-flex flex-wrap " style="background:#B319D0"> 
        <br>
        <div style="width: 100%; height: 2px; background-color: white;width: 80%;"></div>
    </div>

</div>
<?php }?>
 
<!-- Modal único -->
<div class="modal fade" id="meuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#B319D0">
                <h5 class="modal-title" id="modalTitulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="modalData"></p>
                <p >Foto Antes</p>
                
                <img id="modalFoto1" src="" style=" object-fit: cover;width: 100%;">
                <p >Foto Após</p>
                <img id="modalFoto2" src="" style=" object-fit: cover;width: 100%;">
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para preencher o modal -->
<script>
    let fotos = <?php echo json_encode($fotos); ?>;
    console.log(fotos);
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".abrirModal").forEach(button => {
            button.addEventListener("click", function () {
                let nome = this.getAttribute("data-nome");
                let data = this.getAttribute("data-data");
                let id_foto1 = this.getAttribute("data-foto1");
                let id_foto2 = this.getAttribute("data-foto2");

                document.getElementById("modalTitulo").innerText = "Dados de " + nome;
                document.getElementById("modalData").innerText = "Data: " + data;

                
                let exameSelecionado1 = fotos.find(fotos => fotos.id == id_foto1);
                

                let exameSelecionado2 = fotos.find(exame => exame.id == id_foto2);
                
                document.getElementById("modalFoto1").src = exameSelecionado1.local;
                document.getElementById("modalFoto2").src = exameSelecionado2.local;
            });
        });
    });
</script>



