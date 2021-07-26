<?php include(__DIR__ . '/Conexion.php'); ?>
<?php include("Views/Includes/header.php"); ?>


<body style="background-color:#EBEBEB">
    <!-- <link rel="stylesheet" href="../Templates/css/estilos.css" /> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Solicitudes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=#">Solicitantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Revisores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="card card-body">
                <br>
                <br>
                <div>
                    <h1>
                        Crear una solicitud
                    </h1>
                </div>
                <hr>
                <div class="container">
                    <div>
                        <h2>
                            Información del solicitante
                        </h2>
                    </div>
                    <form action="GuardarSolicitante.php" method="POST" ">
                        <div class=" form-group row my-2 ">
                            <label for=" nombre" class="col-form-label col-sm-2">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nombre" id="nombreSolicitante" placeholder="Nombre del solicitante" maxLength="85" autofocus required">
                        </div>
                </div>
                <div class="form-group row my-2">
                    <label for="primerApellido" class="col-form-label col-sm-2">Primer apellido</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="primerApellido" id="primerApellido" placeholder="Primer Apellido" maxLength="85" required>
                    </div>
                </div>
                <div class=" form-group row my-2">
                    <label for="segundoApellido" class="col-form-label col-sm-2">Segundo apellido</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" placeholder="Segundo Apellido" maxLength="85" required>
                    </div>
                </div>
                <div class=" form-group row my-2">
                    <label for="celular" class="col-form-label col-sm-2">Celular</label>
                    <div class="col-sm-6">
                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxLength="15" class="form-control" name="celular" id="celular" placeholder="Número de celular" required>
                    </div>
                </div>
                <div class=" form-group row my-2">
                    <label for="fechaSolicitud" class="col-form-label col-sm-2">Fecha de solicitud</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="fechaSolicitud" id="fechaSolicitud" placeholder="Fecha de solicitud" required>
                    </div>
                </div>
                <div class=" form-group row my-2">
                    <label for="jefeDirecto" class="col-form-label col-sm-2">Jefe directo</label>
                    <div class="col-sm-6">
                        <select class="form-select" aria-label="Default select example" id="jefeDirectoSolicitante" required>
                            <option selected>Seleccione el jefe directo</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div>
                        <h2>
                            Información de la persona que requiere el permiso
                        </h2>
                    </div>
                    <br>
                    <div class="form-group row my-2">
                        <table id="tablaPersonas" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo electrónico</th>
                                    <th>Correo jefe</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo electrónico</th>
                                    <th>Correo jefe</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                        <hr>
                        <div>
                            <h2>
                                Datos del ausentismo
                            </h2>
                        </div>
                        <br>
                        <div class="form-group row col-sm-12 py-6">
                            <div class="col-4">
                                <fieldset>
                                    <legend>Cardinalida</legend>
                                    <label>
                                        <input type="radio" name="cardinalidad" id="cardinalidadEntrada" value="entrada"> Entrada
                                    </label>
                                    <label>
                                        <input type="radio" name="cardinalidad" id="cardinalidadSalida" value="salida"> Salida
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-4">
                                <div class=" form-group row">
                                    <label for="fechaInicio" class="col-form-label col-sm-5">Fecha de inicio</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="fechaInicio" id="fechaInicio" placeholder="Fecha de inicio" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class=" form-group row">
                                    <label for="fechaFin" class="col-form-label col-sm-5">Fecha de finalización</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="fechaFin" id="fechaFin" placeholder="Fecha de finalización" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-sm-12">
                            <div class="col-4">
                                <div class=" form-group row">
                                    <label for="horaInicio" class="col-form-label col-sm-5">Hora de inicio</label>
                                    <div class="col-sm-7">
                                        <input type="time" class="form-control" name="horaInicio" id="horaInicio" min="07:00" max="18:00" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class=" form-group row">
                                    <label for="horaFin" class="col-form-label col-sm-5">Hora de finalización</label>
                                    <div class="col-sm-7">
                                        <input type="time" class="form-control" name="horaFin" id="horaFin" min="07:00" max="18:00" required>
                                    </div>
                                </div>
                            </div>
                            <div class=" form-group row col">
                                <label for="numeroDias" class="col-form-label col-sm-6">Número de días</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="numeroDias" id="numeroDias" placeholder="Número de días" readonly required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <label for="dias m-8">Días</label>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row my-2">
                        <label for="frecuencia" class="col-form-label col-sm-2">Frecuencia</label>
                        <div class="col-sm-6">
                            <select class="form-select" aria-label="Default select example" id="frecuencia" required>
                                <option selected>Seleccione la frecuencia en que se ausentará</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label for="explique" class="col-form-label col-sm-2">Explique</label>
                        <textarea name="explique" id="explique" cols="30" id="expliqacion" rows="10"></textarea>
                    </div>
                    <div class=" form-group row my-2">
                        <label for="jefeDirecto" class="col-form-label col-sm-2">Jefe directo</label>
                        <div class="col-sm-6">
                            <select class="form-select" aria-label="Default select example" id="jefeDirectoPersona" required>
                                <option selected>Seleccione el jefe directo</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class=" form-group row my-2">
                    <input type="submit" class="btn btn-primary" name="guardar" value="Enviar">
                </div>
                </form>
                <div id="error">

                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="js/formularioSolicitud.js" />
    </script>
</body>

<?php include("Views/Includes/footer.php") ?>