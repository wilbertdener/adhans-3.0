<div class="main-header">
			
                
				<div style="color:white;background:#7927A5!important" class="logo-header " data-background-color="blue" href="<?php echo base_url('dashboard')?>">
					<a class="card card-pricing" href="<?php echo base_url('dashboard')?>" style="color:white; background:#7927A5!important; text:center; padding: 0px 0px; margin: 0 auto;
    vertical-align: middle;" >
					ADHans
					</a>
				</div>
			

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2" style="background:#792796!important">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <div style="color:white"><?php echo $_SESSION['name']; ?></div>
						</li>
						<li class="nav-item hidden-caret">
							<a class="profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src=<?php echo base_url('/assets/img/profile.png')?> alt="..." class="avatar-img rounded-circle">
								</div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<a class="dropdown-item" href="<?php echo base_url('/profile')?>">Meu Perfil</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo base_url('login/get_out')?>">Sair</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>