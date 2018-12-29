<?php 
  
  $servidor = Ruta::ctrRutaServidor();

  $url = Ruta::ctrRuta();

 ?>

<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>
      
      Alumnos
    
      <small>Panel de Control</small>
    
    </h1>
    
    <ol class="breadcrumb">
     
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio

      </a></li>
      
      <li class="active">Alumnos</li>
    
    </ol>

  </section>


  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAlumno"> <i class="fa fa-user-plus"></i> Agregar Alumno </button>

      </div>
      
      <div class="box-body">
      
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          
          <thead> 

            <tr>
              
              <th style="width: 10px">#</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>N. de Control</th>
              <th>Carrera</th>
              <th>Grupo</th>
              <th>Email</th>
              <th>Imagen</th>
              <th>Activo</th>
              <th>Acciones</th>

            </tr>
  
          </thead>

          <tbody>
            

            <?php 

              $item = null;

              $valor = null;

              $alumnos = ControladorAlumnos::ctrMostrarAlumnos($item, $valor);
              
             ?>

            <?php 

              foreach ($alumnos as $key => $value) {

                echo '

                      <tr>
        
                        <td>'.($key+1).'</td>
                        
                        <td>'.$value["nombre"].'</td>

                        <td>'.$value["apellidos"].'</td>
                        
                        <td>'.$value["numeroControl"].'</td>

                        <td>'.$value["carrera"].'</td>

                        <td>'.$value["grupo"].'</td>

                        <td>'.$value["email"].'</td>';

                        if ($value["foto"] != "") {
                          echo ' 
                          
                            <td><img src="'.$url.$value["foto"].'" class="img-thumbnail" width="40px" alt=""></td>
                          ';
                        } else {

                          echo '
                            
                           <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt=""></td>
                         
                          ';

                        } 

                        $estado = $value["activo"];

                        if ($estado == 1 ) {
                        
                          echo '

                           <td><button class="btn btn-success btn-sm btnActivarAlumno" estadoAlumno="0" idAlumno="'.$value["id"].'">Activo</button></td>
                             
                          ';

                        } else {

                           echo '

                           <td><button class="btn btn-danger btn-sm btnActivarAlumno" estadoAlumno="1" idAlumno="'.$value["id"].'">Inactivo</button></td>
                             
                          '; 

                        } echo '
                              
                        <td>
                          
                          <div class="btn-group">
                            
                            <button class="btn btn-warning btnEditarUsuario" data-toggle="modal" idUsuario="'.$value["id"].'" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                            
                            <button class="btn btn-danger btnEliminarUsuario" usuario="'.$value["numeroControl"].'" idUsuario = "'.$value["id"].'" fotoUsuario="'.$value["foto"].'"><i class="fa fa-times"></i></button>

                          </div>

                        </td>

                      </tr>
                  
                  ';
              
                }

             ?>

          </tbody>

        </table>
      
      </div>
     

    </div>
    
  </section>
  
</div>
<!-- /.content-wrapper -->


<!--=============================
= VENTANA MODAL NUEVO ALLUMNO   =
===============================-->
<div id="modalAgregarAlumno" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">
        <!--======================================
        =  Cabeza del Modal            =
        =======================================-->
        <div class="modal-header" style="background: #3e8dbc; color: #fff;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"><span> <i class="fa fa-user-plus"></i> </span> Agregar Alumno</h4>

        </div>


        <!--======================================
        =  Cuerpo del Modal            =
        =======================================-->
        <div class="modal-body">

          <div class="box-body">
            
            <!-- Entrada para el Nombre -->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                   
                <input type="text" name="nuevoNombre" placeholder="Ingresar Nombre" required class="form-control input-lg">   

              </div>
              
            </div> 

            <!-- Entrada para los Apellidos -->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                   
                <input type="text" name="nuevoApellidos" placeholder="Ingresar Apellidos" required class="form-control input-lg">   

              </div>
              
            </div> 

            <!-- Entrada para Número de Control -->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                   
                <input type="text" name="nuevoNumeroControl" id="nuevoNumeroControl" placeholder="Ingresar Número de Control" required class="form-control input-lg">   

              </div>
              
            </div> 

            
            <!-- Entrada para la Carrera-->
            <div class="form-group">

              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-users"></i> </span>
                   
                <select name="nuevaCarrera" class="form-control input-lg">
                  
                  <option value="">Seleccionar Carrera</option>

                  <option value="ISC">I.S.C.</option>

                </select> 

              </div>

            </div>

            <!-- Entrada para Grupo-->
            <div class="form-group">

              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-users"></i> </span>
                   
                <select name="nuevoGrupo" class="form-control input-lg">
                  
                  <option value="">Seleccionar Grupo</option>

                  <option value="902">902</option>

                </select> 

              </div>

            </div>

            <!-- Entrada para Email -->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                   
                <input type="text" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar email" required class="form-control input-lg">   

              </div>
              
            </div> 


            <!-- Entrada para Contraseña-->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                   
                <input type="text" name="nuevoPassword" placeholder="Ingresar password" required class="form-control input-lg">   

              </div>
              
            </div> 

          </div>

        </div>


        <!--======================================
        =  PIE DEL MODAL            =
        =======================================-->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary pull-left">Guardar Alumno</button>

        </div>


        <?php 

          $crearAlumno = new ControladorAlumnos();

          $crearAlumno -> ctrCrearAlumno();

         ?>
      
      </form>
    
    </div>

  </div>

</div>

<!--=============================
= VENTANA MODAL EDITAR USUARIO   =
===============================-->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">
        <!--======================================
        =  Cabeza del Modal            =
        =======================================-->
        <div class="modal-header" style="background: #3e8dbc; color: #fff;">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"><span> <i class="fa fa-user-plus"></i> </span> Editar usuario</h4>

        </div>


        <!--======================================
        =  Cuerpo del Modal            =
        =======================================-->
        <div class="modal-body">

          <div class="box-body">
            
            <!-- Entrada para el Nombre -->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                   
                <input type="text" id="editarNombre" name="editarNombre" placeholder="Ingresar Nombre" required class="form-control input-lg">  

                <input type="hidden" id="nombreActual" name="nombreActual"> 

              </div>
              
            </div> 

            <!-- Entrada para el Usuario -->
            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-key"></i></span>
                   
                <input type="text" id="editarUsuario" readonly name="editarUsuario" placeholder="Ingresar Usuario" required class="form-control input-lg">   

              </div>

             </div> 

            <!-- Entrada para Contraseña-->
            <div class="form-group">

              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                   
                <input type="password" name="editarPassword" placeholder="Escriba la Nueva Contraseña" class="form-control input-lg"> 

                <input type="hidden" id="passwordActual" name="passwordActual">  

              </div>

            </div>


            <!-- Entrada para Seleccion de Perfil-->

            <div class="form-group">

              <div class="input-group">
                
                <span class="input-group-addon"> <i class="fa fa-users"></i> </span>
                   
                <select name="editarPerfil" class="form-control input-lg">
                  
                  <option value="" id="editarPerfil">Seleccionar Perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select> 

              </div>

            </div>

             <!-- Entrada para la foto-->
            <div class="form-group">

              <div class="panel text-uppercase">Subir Foto</div>

              <input type="file" class="nuevaFoto" name="editarFoto">
              
              <p class="help-block">Peso máximo de la foto 2MB</p>
                
              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarImagen" width="100px">
              <input type="hidden" name="fotoActual" id="fotoActual"> 

            </div>

          </div>

        </div>


        <!--======================================
        =  PIE DEL MODAL            =
        =======================================-->
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary pull-left">Editar Usuario</button>

        </div>


        <?php 

          $editarUsuario = new ControladorUsuarios();

          $editarUsuario -> ctrEditarUsuario();

         ?>
      
      </form>
    
    </div>

  </div>

</div>

<?php 

  $borrarUsuario = new ControladorUsuarios();

  $borrarUsuario -> ctrBorrarUsuario();

 ?>