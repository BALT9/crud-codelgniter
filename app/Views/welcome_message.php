<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Continentes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <!-- MODAL CONTINENTE -->
        <div class="modal fade" id="modalContinente" tabindex="-1" aria-labelledby="modalContinenteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="formContinente" method="post" action="<?= site_url('/continente') ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" id="codigo_continente" name="codigo_continente" />
                    <div class="modal-content">
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
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL PAIS -->
        <div class="modal fade" id="modalPais" tabindex="-1" aria-labelledby="modalPaisLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="formPais" action="/pais" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" id="codigo_pais" name="codigo_pais" />
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalPaisLabel">Agregar País</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputPais"
                                    name="nombre_pais"
                                    placeholder="Nombre del País"
                                    required />
                                <label for="inputPais">Nombre de País</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select
                                    class="form-select"
                                    id="selectContinentePais"
                                    name="codigo_continente"
                                    required>
                                    <option value="" disabled selected>Selecciona un continente</option>
                                    <?php foreach ($continentes as $continente): ?>
                                        <option value="<?= $continente['codigo_continente'] ?>">
                                            <?= esc($continente['nombre_continente']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="selectContinentePais">Continente</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="btnGuardarPais">Guardar País</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL ESTADO -->
        <div class="modal fade" id="modalEstado" tabindex="-1" aria-labelledby="modalEstadoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?= site_url('/estado/crearEstado') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalEstadoLabel">Agregar Estado</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="inputEstado" name="nombre_estado" placeholder="Nombre del Estado" required />
                                <label for="inputEstado">Nombre de Estado</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="selectPaisEstado" name="codigo_pais" required>
                                    <option value="" disabled selected>Selecciona un País</option>
                                    <?php foreach ($paises as $pais): ?>
                                        <option value="<?= $pais['codigo_pais'] ?>">
                                            <?= esc($pais['nombre_pais']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="selectPaisEstado">País</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="btnGuardarEstado">Guardar Estado</button>
                        </div>
                    </div>
                </form>
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
                                        <a href="<?= site_url('/?continente=' . $continente['codigo_continente']) ?>" class="btn btn-sm btn-success">Ver Países</a>
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
                            <th>Codigo</th>
                            <th>Pais</th>
                            <th>Acciones</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyPaises">
                        <?php if (empty($paises)): ?>
                            <tr>
                                <td colspan="4" class="text-center">Selecciona un continente para ver sus países.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($paises as $pais): ?>
                                <tr>
                                    <td><?= $pais['codigo_pais'] ?></td>
                                    <td><?= $pais['nombre_pais'] ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-warning btn-editar-pais"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalPais"
                                                data-id="<?= $pais['codigo_pais'] ?>"
                                                data-nombre="<?= htmlspecialchars($pais['nombre_pais'], ENT_QUOTES) ?>"
                                                data-continente="<?= $pais['codigo_continente'] ?>">
                                                Editar
                                            </button>
                                            <form action="<?= site_url('/pais/eliminar/' . $pais['codigo_pais']) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="<?= site_url('/estado/listar?pais_id=' . $pais['codigo_pais']) ?>" class="btn btn-sm btn-success">Ver Estados</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4 mb-4">
                <button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEstado"
                    id="btnAgregarEstado">
                    Agregar Estado
                </button>

                <?php if (isset($estados) && !empty($estados)): ?>
                    <h4>Estados del país: <?= esc($paisActivo) ?></h4>
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($estados as $estado): ?>
                                <tr>
                                    <td><?= esc($estado['codigo_estado']) ?></td>
                                    <td><?= esc($estado['nombre_estado']) ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-warning btn-editar-estado"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEstado"
                                                data-id="<?= $estado['codigo_estado'] ?>"
                                                data-nombre="<?= esc($estado['nombre_estado']) ?>"
                                                data-pais="<?= $estado['codigo_pais'] ?>">
                                                Editar
                                            </button>
                                            <form action="<?= site_url('/estado/eliminar/' . $estado['codigo_estado']) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <!-- Puedes personalizar este enlace si tienes ciudades u otra entidad anidada -->
                                            <span class="text-muted">-</span>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No hay estados para este país o no se ha seleccionado uno.</p>
                <?php endif; ?>
            </div>



        </div>

    </div>
    <script>
        document.querySelectorAll('.btn-editar').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const nombre = button.getAttribute('data-nombre');

                document.getElementById('codigo_continente').value = id;
                document.getElementById('nombre_continente').value = nombre;

                document.getElementById('modalContinenteLabel').textContent = 'Editar Continente';
                document.getElementById('btnGuardarContinente').textContent = 'Actualizar Continente';

                document.getElementById('formContinente').action = '<?= site_url('/actualizar') ?>'; // Ruta para actualizar
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.btn-editar-pais').forEach(button => {
                button.addEventListener('click', () => {
                    const codigo = button.getAttribute('data-id');
                    const nombre = button.getAttribute('data-nombre');
                    const continente = button.getAttribute('data-continente');

                    document.getElementById('codigo_pais').value = codigo;
                    document.getElementById('inputPais').value = nombre;
                    document.getElementById('selectContinentePais').value = continente;

                    // Cambiar texto del modal para editar
                    document.getElementById('modalPaisLabel').textContent = 'Editar País';
                    document.getElementById('btnGuardarPais').textContent = 'Actualizar País';

                    // Cambiar acción del formulario para actualizar (ajusta la URL a la correcta)
                    document.getElementById('formPais').action = '/pais/actualizar';
                });
            });

            // Resetea modal al cerrarlo para modo "Agregar"
            const modalPais = document.getElementById('modalPais');
            modalPais.addEventListener('hidden.bs.modal', () => {
                document.getElementById('formPais').reset();
                document.getElementById('codigo_pais').value = '';
                document.getElementById('modalPaisLabel').textContent = 'Agregar País';
                document.getElementById('btnGuardarPais').textContent = 'Guardar País';
                document.getElementById('formPais').action = '/pais'; // ruta para crear
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>