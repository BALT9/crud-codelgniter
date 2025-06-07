<div class="modal fade" id="modalEstado" tabindex="-1" aria-labelledby="modalEstadoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Formulario para Crear o Editar un Estado -->
        <form id="formEstado" action="<?= site_url('/estado/crearEstado') ?>" method="POST">
            <?= csrf_field() ?>
            <!-- Campo Oculto para Código de Estado -->
            <input type="hidden" id="codigo_estado" name="codigo_estado" />

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEstadoLabel">Agregar Estado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="inputEstado" name="nombre_estado" placeholder="Nombre del Estado" required />
                        <label for="inputEstado">Nombre del Estado</label>
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