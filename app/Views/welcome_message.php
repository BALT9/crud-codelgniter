<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Grid con 3 columnas y modales separados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">

        <!-- MODAL CONTINENTE -->
        <div class="modal fade" id="modalContinente" tabindex="-1" aria-labelledby="modalContinenteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="formContinente" method="post" action="<?= site_url('/continente') ?>">
                        <?= csrf_field() ?>
                        <input type="hidden" id="codigo_continente" name="codigo_continente" />
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalContinenteLabel">Agregar Continente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nombre_continente"
                                    name="nombre_continente"
                                    placeholder="Nombre del Continente"
                                    required />
                                <label for="nombre_continente">Nombre de Continente</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="btnGuardarContinente">Guardar Continente</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- MODAL PAIS -->
        <div class="modal fade" id="modalPais" tabindex="-1" aria-labelledby="modalPaisLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalPaisLabel">Agregar País</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputPais" placeholder="Nombre del País" />
                            <label for="inputPais">Nombre de País</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputContinentePais" placeholder="Continente" />
                            <label for="inputContinentePais">Continente</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar País</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL ESTADO -->
        <div class="modal fade" id="modalEstado" tabindex="-1" aria-labelledby="modalEstadoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEstadoLabel">Agregar Estado</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputEstado" placeholder="Nombre del Estado" />
                            <label for="inputEstado">Nombre de Estado</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputPaisEstado" placeholder="País" />
                            <label for="inputPaisEstado">País</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar Estado</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- GRID DE 3 COLUMNAS -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-toggle="modal"
                    data-bs-target="#modalContinente"
                    id="btnAgregarContinente">
                    Agregar Continente
                </button>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Codigo</th>
                            <th>Continente</th>
                            <th>Acciones</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($continentes as $continente): ?>
                            <tr>
                                <td><?= $continente['codigo_continente'] ?></td>
                                <td><?= $continente['nombre_continente'] ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-warning btn-editar"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalContinente"
                                            data-id="<?= $continente['codigo_continente'] ?>"
                                            data-nombre="<?= $continente['nombre_continente'] ?>">
                                            Editar
                                        </button>


                                        <form action="<?= site_url('/eliminar/' . $continente['codigo_continente']) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm btn-success">Ver Países</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

            <div class="col-md-4 mb-4">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalPais">
                    Agregar País
                </button>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>País</th>
                            <th>Continente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Argentina</td>
                            <td>América</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>España</td>
                            <td>Europa</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>China</td>
                            <td>Asia</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-4">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalEstado">
                    Agregar Estado
                </button>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Estado</th>
                            <th>País</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Buenos Aires</td>
                            <td>Argentina</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Andalucía</td>
                            <td>España</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Guangdong</td>
                            <td>China</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // para editar 
        document.querySelectorAll('.btn-editar').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const nombre = button.getAttribute('data-nombre');

                document.getElementById('codigo_continente').value = id;
                document.getElementById('nombre_continente').value = nombre;

                document.getElementById('modalContinenteLabel').textContent = 'Editar Continente';
                document.getElementById('btnGuardarContinente').textContent = 'Actualizar Continente';

                // Acción para actualizar
                document.getElementById('formContinente').action = '<?= site_url('/actualizar') ?>';
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>