<nav class="navbar navbar-expand-lg navbar-light nav-color">
			<a class="navbar-brand" href="index.php">
				<img src="images/logo.png" width="50" height="50" alt="logo">reklasicizam
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="index.php">početna</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="onama.php">o nama</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="muskarci.php">muškarci</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="zene.php">žene</a>
					</li>
					<?php
						if(isset($_SESSION['role'])){
							if($_SESSION['role'] == 'admin'){
								echo "
							<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"admin.php\">admin panel</a>
							</li>";
							}
							else{
								echo "
								<li class=\"nav-item\">
									<a class=\"nav-link\" href=\"profil.php\">moj profil</a>
								</li>";
							}
							echo "<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"php/logout.php\">logout</a>
							</li>
							";
						}
						else{
							echo "
							<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"login.php\">login</a>
							</li>
							<li class=\"nav-item\">
								<a class=\"nav-link\" href=\"registracija.php\">registracija</a>
							</li>
							";
						}
					?>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    </li>
				</ul>
			</div>
		</nav>