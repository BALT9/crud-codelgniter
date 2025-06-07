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