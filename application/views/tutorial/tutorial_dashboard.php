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
            

            <div class="col-md-3 pr-md-0 " style="display: flex; justify-content: center; align-items: center; ">
                <a class="card card-pricing "  style="background:#650086;margin-bottom:10px;border-radius: 50px; padding: 0px 10px;width: 90%; ">
                    <div class="card-header">
                            
                            <span class="price " style="color:#FFFFFF; font-size:2rem">Tutorial</span>
                            
                        
                    </div>
                </a>
            </div>
        
        </div>

        <div class="row justify-content-center align-items-center mb-1" style="color:#FFFFFF;font-size:250%;" >
        
        
            
            
            
                <div class="row justify-content-center align-items-center d-flex flex-wrap ">
                    <div class="col-1 col-md-3 d-flex justify-content-center align-items-center " style="display: flex; justify-content: center; align-items: center; ">
                        <i class="fa-solid fa-file-invoice" style="color:#9223B3;font-size: 6rem;" ></i>

                    </div>
                    <div class="col-6 col-md-6 d-flex justify-content-center align-items-center" style="display: flex; justify-content: center; align-items: center; ">
                        <div style="display: flex; flex-direction: column; ">
                            <span style="color: #ffffff; font-size: 20px; font-family: Bookman Old Style, sans-serif; ">
                                <?php echo $_SESSION['name']; ?>
                            </span>
                            <span style="color: #ffffff; font-size: 15px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                            Hanseníase: <?php echo $_SESSION['crm']; ?>
                            </span>
                            <span style="color: #ffffff; font-size: 15px; font-family: Bookman Old Style, sans-serif; margin: 0;">
                                <i class="fa-solid fa-calendar-days"style="color:#650086;font-size: 1.5rem;"></i>  20/02/2025
                            </span>
                        </div>
                    </div>
                    <div class="col-2 col-md-3 d-flex justify-content-center align-items-center" style="display: flex; justify-content: center; align-items: center; ">
                        
                        <i class="fa-solid fa-camera"style="color:#650086;margin-bottom:20px;border-radius: 50px; padding: 10px 20px;width: 90%; "></i>
                        
                        
                    </div>
                </div>

            
            
        
        <div class="row justify-content-center align-items-center d-flex flex-wrap "> 
            <br>
            <div style="width: 100%; height: 2px; background-color: white;width: 80%;"></div>
        </div>
        


        

    </div>
</div>