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

.custom-input {
    width: 80%; /* Ajuste conforme necessário */
    max-width: 400px; /* Para evitar que fique muito grande */
    border-radius: 50px; /* Deixa as bordas circulares */
    padding: 10px 20px; /* Ajusta o espaçamento interno */
    border: 1px solid #ccc; /* Define uma borda sutil */
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2); /* Adiciona uma sombra leve */
    outline: none; /* Remove o contorno padrão ao clicar */
    transition: 0.3s; /* Efeito suave nas mudanças */
}

.custom-input:focus {
    border-color: #650086; /* Cor da borda ao focar */
    box-shadow: 2px 2px 12px rgba(101, 0, 134, 0.5); /* Realce a sombra ao focar */
}

</style>


        
    <div  style="background:#B319D0" >    

        <div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
            

            <div class="col-md-3 pr-md-0 " style="display: flex; justify-content: center; align-items: center; ">
                <a class="card card-pricing "  style="background:#650086;margin-bottom:10px;border-radius: 50px; padding: 0px 10px;width: 90%; ">
                    <div class="card-header">
                        <i class="fa-solid fa-backward" style="color:#B319D0;font-size: 2rem; position: absolute; left: 20px; top: 30px;" onclick="window.location.href='<?php echo base_url('dashboard'); ?>'"></i>
                            <span class="price " style="color:#FFFFFF; font-size:2rem">Enviar fotos</span>
                            
                        
                    </div>
                </a>
            </div>
        
        </div>

        <div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
        <div class="row d-flex justify-content-center mb-3" style="width: 100%;">
            <h1  style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">O ADHans identificou um probabilidade de 76,7% de chance da lesão informada ter sido provocado pela hanseníase.
            </h1>
            <h1  style="color:#FFFFFF; font-size:2rem justify-content: center; align-items: center;">Por favor, nos informa qual o seu diagnostico para otimizar o auxilio ao diagnostico do ADHans </h1>
        </div>
        

        <div class="col-md-3 pr-md-0" style="display: flex; justify-content: center; align-items: center; gap: 1rem;padding-left: 1rem;" onclick='atualizaexame("1")' >
            <a class="card card-pricing"  style="background:#650086;margin-bottom:20px;border-radius: 50px; padding: 10px 20px;width: 90%; ">
                <div class="card-header">
                    <div class="card-price">
                        <span class="price" style="color:#FFFFFF">Hanseniase</span>
                        
                    </div>
                </div>
            </a>                                                                                                                                
        </div>

        <div class="col-md-3 pr-md-0" style="display: flex; justify-content: center; align-items: center; gap: 1rem;padding-left: 1rem;" onclick='atualizaexame("0")'>
            <a class="card card-pricing"  style="background:#650086;margin-bottom:20px;border-radius: 50px; padding: 10px 20px;width: 90%; ">
                <div class="card-header">
                    <div class="card-price">
                        <span class="price" style="color:#FFFFFF">Outros</span>
                        
                    </div>
                </div>
            </a>                                                                                                                                
        </div>

        <button
            class="card card-pricing" 
            id="selecttempo" 
            style="background:#650086; margin-bottom:20px; border-radius: 50px; padding: 10px 0px; width: 40%; cursor: pointer;display: none; "
            onclick="spinner_on(this,uploadImage)"
            value=<?php echo $foto->id?>
            >
            <span style="color:#FFFFFF; font-size:1rem;"></span>
        </button>
    



       

<script>
    function atualizaexame(valor) {
        let id = document.getElementById("selecttempo").value;
        console.log(id);
        console.log(valor);
        $.post("<?php echo site_url('foto/atualizaexame/');?>", {valor:valor,id:id},function(retorno){
            
            if(retorno){
                Swal.fire({
                    text: "certo",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000,
                    customClass: {
                        popup: 'swalpopupvitais',
                    }
                }).then(function(){
                    window.location.href = '<?php echo base_url('dashboard')?>';
                });
            }else{
                
                Swal.fire('erro', 'erro', 'error');
            }
        });
    }
    



</script>
        
        

            
            
        
        
        


        

 