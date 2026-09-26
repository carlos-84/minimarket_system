
<!-- <?php //if (!empty($data)) {?> -->
<!-- Modal -->
<div class="modal fade" id="mdlEditUser" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="login-box-msg">Editar Usuario</p>

                <form id="frmEditUser" method="post" >

                    <div class="input-group mb-3">
                        <!-- Campo oculto indispensable para saber a quién actualizar -->
                        <input type="hidden" id="idUsuarioModal" name="id_usuario">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nombre del usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select id="selectDinamico" class="form-cotrol custom-select" style="width: 100%" name=rol>
                            <option value="">Cargando...</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-check"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select id="selectStatus" class="form-control custom-select" style="width: 100%" name=estado>
                            <option>Selecione Estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-unlock-alt"></span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit"  id="btnGuardarCambios" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<?php //} ?>