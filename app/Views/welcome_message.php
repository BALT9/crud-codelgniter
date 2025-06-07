<?= $this->include('Layouts/Header') ?>

<body>
    <div class="container mt-5">
        <!-- MODAL CONTINENTE -->
        <?= $this->include('Modals/Continente') ?>

        <!-- MODAL PAIS -->
        <?= $this->include('Modals/Pais') ?>
        <!-- MODAL ESTADO -->
        <?= $this->include('Modals/Estado') ?>

        <!-- GRID DE 3 COLUMNAS -->
        <div class="row">
            <div class="row">
                <!-- Columna de Continentes -->
                <div class="col-md-4 mb-4">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalContinente">
                        Agregar Continente
                    </button>

                    <?php foreach ($continentes as $continente): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($continente['nombre_continente']) ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Código: <?= esc($continente['codigo_continente']) ?></h6>

                                <div class="d-flex gap-2 mb-2">
                                    <button
                                        class="btn btn-sm btn-warning btn-editar"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalContinente"
                                        data-id="<?= $continente['codigo_continente'] ?>"
                                        data-nombre="<?= esc($continente['nombre_continente']) ?>">
                                        Editar
                                    </button>
                                    <form action="<?= site_url('/eliminar/' . $continente['codigo_continente']) ?>" method="post">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>

                                <a href="<?= site_url('/?continente=' . $continente['codigo_continente']) ?>" class="btn btn-sm btn-success w-100">Ver Países</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Columna de Países -->
                <div class="col-md-4 mb-4">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalPais">
                        Agregar País
                    </button>

                    <?php if (empty($paises)): ?>
                        <div class="alert alert-info">Selecciona un continente para ver sus países.</div>
                    <?php else: ?>
                        <?php foreach ($paises as $pais): ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?= esc($pais['nombre_pais']) ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Código: <?= esc($pais['codigo_pais']) ?></h6>

                                    <div class="d-flex gap-2 mb-2">
                                        <button
                                            class="btn btn-sm btn-warning btn-editar-pais"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalPais"
                                            data-id="<?= esc($pais['codigo_pais']) ?>"
                                            data-nombre="<?= esc($pais['nombre_pais']) ?>"
                                            data-continente="<?= esc($pais['codigo_continente']) ?>">
                                            Editar
                                        </button>
                                        <form action="<?= site_url('/pais/eliminar/' . $pais['codigo_pais']) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </div>

                                    <a href="<?= site_url('/estado/listar?pais_id=' . $pais['codigo_pais']) ?>" class="btn btn-sm btn-success w-100">Ver Estados</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Columna de Estados -->
                <div class="col-md-4 mb-4">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalEstado">
                        Agregar Estado
                    </button>

                    <?php if (isset($estados) && !empty($estados)): ?>
                        <h5 class="mb-3">Estados del país: <?= esc($paisActivo) ?></h5>
                        <?php foreach ($estados as $estado): ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?= esc($estado['nombre_estado']) ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Código: <?= esc($estado['codigo_estado']) ?></h6>

                                    <div class="d-flex gap-2">
                                        <button
                                            class="btn btn-sm btn-warning btn-editar"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEstado"
                                            data-id="<?= esc($estado['codigo_estado']) ?>"
                                            data-nombre="<?= esc($estado['nombre_estado']) ?>"
                                            data-pais-id="<?= esc($estado['codigo_pais']) ?>">
                                            Editar
                                        </button>
                                        <form action="<?= site_url('/estado/eliminar/' . $estado['codigo_estado']) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info">Selecciona un Pais para ver sus estados.</div>
                    <?php endif; ?>
                </div>
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

        document.querySelectorAll('.btn-editar').forEach(button => {
            button.addEventListener('click', () => {
                // Obtener los datos del botón
                const id = button.getAttribute('data-id');
                const nombre = button.getAttribute('data-nombre');
                const paisId = button.getAttribute('data-pais-id');

                // Establecer los valores en el formulario del modal
                document.getElementById('codigo_estado').value = id; // Establece el ID del estado
                document.getElementById('inputEstado').value = nombre; // Establece el nombre del estado
                document.getElementById('selectPaisEstado').value = paisId; // Establece el país

                // Cambiar el título del modal a "Editar Estado"
                document.getElementById('modalEstadoLabel').textContent = 'Editar Estado';
                // Cambiar el texto del botón para reflejar la actualización
                document.getElementById('btnGuardarEstado').textContent = 'Actualizar Estado';
                // Cambiar la acción del formulario para que se actualice el estado
                document.getElementById('formEstado').action = '<?= site_url("/estado/actualizarEstado") ?>'; // Ruta para actualizar el estado
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>