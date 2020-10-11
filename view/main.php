<?php
session_start();
$usuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SODI | IMOS</title>

    <link href="hefestoLib/css/dataTable.css" rel="stylesheet" />
    <link rel="stylesheet" href="hefestoLib/css/main.css">
    <link rel="stylesheet" href="hefestoLib/css/bootstrap43.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <script src="hefestoLib/js/jquery331.js"></script>
    <script src="hefestoLib/js/popper114.js"></script>
    <script src="hefestoLib/js/bootstrap431.js"></script>
    
</head>

<body>
    <div class="topnav">
        <img src="img/logoImos.png" width="45" height="45" style="margin-left:5px;margin-top:5px" alt="">
        <a href="logout.php"> Salir</a>
        <a href="captura.php">Captura</a>
        <a href="main.php">Inicio</a>
        <p style="margin-top: 1%;">Bienvenido <?php echo $usuario; ?></p>
    </div>

    <div class="containerSames">
        <table id="example" class="stripe" style="width:50%">
            <thead>
                <tr>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Subir Archivos</th>
                    <th>Visualizar PDFS</th>
                    <th>Actualizaciones</th>
                    <th>Expediente Interno</th>
                    <th>Expediente</th>
                    <th>juzgado</th>
                    <th>Quejoso(S)</th>
                    <th>Autorizado</th>
                    <th>Autoridades &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Responsables</th>
                    <th>Tercero&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Interesado</th>
                    <th>Acto Reclamado</th>
                    <th>Audiencias</th>
                    <th>Estado Procesal</th>
                    <th>Fecha Actuación</th>
                    <th>Fehca De</th>
                    <th>Jucio Principal</th>
                    <th>Incidente Suspención</th>
                    <th>Observaciones</th>


                </tr>
            </thead>
            <tbody>
                <?php
                include('config/conn.php');
                $resultado = $conn->query("SELECT * FROM demanda ");

                // echo 'Número de resultados: '. $resultado->num_rows;

                /* recorrer los resultados  */
                while ($fila = $resultado->fetch_assoc()) {
                    $id = $fila['ID'];
                    $expInterno = $fila["expInterno"];
                    $expediente = $fila["expediente"];
                    $juzgado = $fila["juzgado"];
                    $quejosos = $fila["quejosos"];
                    $autorizados = $fila["autorizados"];
                    $aResponsables = $fila["aResponsables"];
                    $tInteresado = $fila["tInteresado"];
                    $aReclamado = $fila["aReclamado"];
                    $audiencias = $fila["audiencias"];
                    $estadoP = $fila["estadoP"];
                    $factuacion = $fila["factuacion"];
                    $fechade = $fila["fechade"];
                    $juicioP = $fila["juicioP"];
                    $incidenteSus = $fila["incidenteSus"];
                    $observaciones = $fila["observaciones"];

                    echo '<td><a href="updateForm.php?id=' . $id . '"><img src="img/update.png" width="30px" height="30px" alt="" style="display:block;margin-left:auto;margin-right:auto;  "></a></td>';
                    echo '<td><a href="sweetDelete.php?id=' . $id . '"><img src="img/delete.png" width="30px" height="30px" alt="" style="display:block;margin-left:auto;margin-right:auto;  "></a></td>';
                    echo '<td><a href="upload.php?id=' . $id . '"><img src="img/doc.png" width="30px" height="30px" alt="" style="display:block;margin-left:auto;margin-right:auto;  "></a></td>';
                    echo '<td><a href="visorPdf.php?id=' . $id . '"><img src="img/buscar.png" width="30px" height="30px" alt="" style="display:block;margin-left:auto;margin-right:auto;  "></a></td>';
                    echo '<td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><img src="img/row.png" width="30px" height="30px" alt="" style="display:block;margin-left:auto;margin-right:auto;  "></button></td>';

                    echo '<td>' . $expInterno . '</td>';
                    echo '<td>' . $expediente . '</td>';
                    echo '<td>' . $juzgado . '</td>';
                    echo '<td>' . $quejosos . '</td>';
                    echo '<td>' . $autorizados . '</td>';
                    echo '<td>' . $aResponsables . '</td>';
                    echo '<td>' . $tInteresado . '</td>';
                    echo '<td>' . $aReclamado . '</td>';
                    echo '<td>' . $audiencias . '</td>';
                    echo '<td>' . $estadoP . '</td>';
                    echo '<td>' . $factuacion . '</td>';
                    echo '<td>' . $fechade . '</td>';
                    echo '<td>' . $juicioP . '</td>';
                    echo '<td>' . $incidenteSus . '</td>';
                    echo '<td>' . $observaciones . '</td>';
                    echo '</tbody>';
                } ?>
        </table>
    </div>
    <div  class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">Actualizaciones de: <?php echo "$expInterno"; ?></h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="containerSames">


                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Exp.Interno</th>
                                <th>Expediente</th>
                                <th>Fecha Actuacion</th>
                                <th>Fecha Notificación</th>
                                <th>Incidente</th>
                                <th>Jucio Principal</th>
                                <th>Comentarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('config/conn.php');
                            $resultado = $conn->query("SELECT * FROM demanda_actualiza where demanda_expInterno='$expInterno' AND demanda_expediente='$expediente' ");

                            // echo 'Número de resultados: '. $resultado->num_rows;

                            /* recorrer los resultados  */
                            while ($fila = $resultado->fetch_assoc()) {
                                $id = $fila['id'];
                                $demanda_expInterno = $fila["demanda_expInterno"];
                                $demanda_expediente = $fila["demanda_expediente"];
                                $fecha_actuacion = $fila["fecha_actuacion"];
                                $fecha_notificacion = $fila["fecha_notificacion"];
                                $icidente = $fila["icidente"];
                                $jucio_principal = $fila["jucio_principal"];
                                $comentarios = $fila["comentarios"];


                                echo '<td>' . $demanda_expInterno . '</td>';
                                echo '<td>' . $demanda_expediente . '</td>';
                                echo '<td>' . $fecha_actuacion . '</td>';
                                echo '<td>' . $fecha_notificacion . '</td>';
                                echo '<td>' . $icidente . '</td>';
                                echo '<td>' . $jucio_principal . '</td>';
                                echo '<td>' . $comentarios . '</td>';
                                echo '</tbody>';
                            } ?>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- <script src="js/lib/jquery.min.js"></script> -->
    <script src="hefestoLib/js/dataTables.js"></script>
    <!-- <script src="    https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> -->

    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever')
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('', "")
            modal.find('.modal-body input').val()
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({

                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                autoWidth: true,

                columnDefs: [{
                    targets: ['_all'],
                    className: 'mdc-data-table__cell'
                }],


                "scrollX": true,
                "pageLength": 7,

            });
        })
    </script>

    <p>© IMOS - SODI | Gerencia Sistemas | Versión 1.3.3 | ▲</p>
    </div>


</body>

</html>
<?php?>