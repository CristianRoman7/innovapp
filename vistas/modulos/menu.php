<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Gerencial"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="solicitudes">

					<i class="fa fa-check-circle"></i>
					<span>Solicitudes</span>

				</a>

			</li>
			
			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>
			
			<li>

				<a href="clientes">

					<i class="fa fa-briefcase"></i>
					<span>Clientes</span>

				</a>

			</li>
			<li>

				<a href="equipos">

					<i class="fa fa-th-large"></i>
					<span>Equipos</span>

				</a>

			</li>
			<li>

				<a href="ubicaciones">

					<i class="fa fa-map"></i>
					<span>Ubicaciones</span>

				</a>

			</li>
			<li>

				<a href="archivos">

					<i class="fa fa-file-pdf-o"></i>
					<span>Mis Archivos</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrativo"){

			echo '<li>

				<a href="solicitudes">

				<i class="fa fa-user"></i>
                <span>Solicitudes</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>
			<li>

				<a href="clientes">

					<i class="fa fa-user"></i>
					<span>Clientes</span>

				</a>

			</li>
			<li>

				<a href="archivos">

					<i class="fa fa-user"></i>
					<span>Mis Archivos</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Operativo"){

			echo '<li>

				<a href="solicitudes">

					<i class="fa fa-users"></i>
					<span>Solicitudes</span>

				</a>

			</li>
			';

		}

		?>

		</ul>

	 </section>

</aside>