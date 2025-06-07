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