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

<div class="main-panel" style="background-color: #B319D0">
    <div class="content" >

        <div style="display: flex;  gap: 1rem;padding-left: 1rem;">
            <div class="flex-md-row">
                <div class="profile-pic pb-3">
                    <img src="/adhans/img/fotoperfil/1.jpg" id="foto-perfil-menu" 
                        style="width: 7rem; height: 7rem; border-radius: 50%; object-fit: cover;">
                </div>
            </div>

            <div style="display: flex; flex-direction: column; line-height: 1; gap: 2px;">
                <span style="color: #ffffff; font-size: 40px; font-family: Bookman Old Style, sans-serif; margin: 0;font-weight: bold;">ADHans</span>
                <span style="color: #ffffff; font-size: 20px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                    <?php echo $_SESSION['name']; ?>
                </span>
                <span style="color: #ffffff; font-size: 20px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                    <?php echo $_SESSION['crm']; ?>
                </span>
            </div>

        </div>
        
        

        <div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
            

            <div class="col-md-3 pr-md-0 " style="display: flex; justify-content: center; align-items: center; gap: 1rem;padding-left: 1rem;">
                <a class="card card-pricing "  style="background:#650086;margin-bottom:20px;border-radius: 50px; padding: 10px 20px;width: 90%; ">
                    <div class="card-header">
                            
                            <span class="price " style="color:#FFFFFF;margin: auto; font-size:2rem">Histórico</span>
                            
                        
                    </div>
                </a>
            </div>
        
        </div>

    </div>
</div>