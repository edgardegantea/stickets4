<?= $this->extend('admin/template/admin_template'); ?>

<?= $this->section('content') ?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edición de datos del ticket seleccion</h3>
    </div>




    <!-- <section class="section"> -->

    <div class="card-body">


        <?php $validation = \Config\Services::validation(); ?>

        <form action="<?= base_url('tickets/'.$ticket['id']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT" />


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputBorderWidth2">Asunto:</label>
                        <input class="form-control form-control-border border-width-2 <?php if ($validation->getError('title')): ?>is-invalid<?php endif; ?>" required
                            type="text" name="title" id="exampleInputBorderWidth2"
                            value="<?php if($ticket['title']): echo $ticket['title']; else: set_value('title'); endif ?>">
                        <?php if ($validation->getError('title')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            

            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="status" value="s01">

                    <div class="form-group">
                        <label for="exampleInputBorderWidth2">Área:</label>
                        <select required name="area" class="form-control form-control-border border-width-2">

                            <option disabled selected>Seleccione el área</option>
                            <?php foreach ($areas as $a): ?>
                            <option value="<?= $a['id'] ?>"><?= $a['name'] ?><?php echo set_value('name'); ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="exampleInputBorderWidth2">Categoría:</label>
                    <select required name="category" class="form-control form-control-border border-width-2">
                        <option disabled selected>Seleccione la categoría</option>
                        <?php foreach ($categories as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= $c['name'] ?><?php echo set_value('name'); ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>


                <div class="col-md-4">
                    <label for="exampleInputBorderWidth2">Prioridad:</label>
                    <select required name="priority" class="form-control form-control-border border-width-2">
                        <option disabled selected>Seleccione la prioridad</option>
                        <?php foreach ($priorities as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <label for="exampleInputBorderWidth2">Descripción de la falla o situación:</label>
                    <textarea required class="form-control form-control-border border-width-2 <?php if ($validation->getError('description')): ?>is-invalid<?php endif; ?>"
                            name="description">
                        <?php if($ticket['description']): echo $ticket['description']; else: set_value('description'); endif ?>
                    </textarea>
                    <?php if ($validation->getError('description')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('description'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="forFile" class="form-label">Evidencias:</label>
                    <input class="mt-2" type="file" id="forFile" name="evidence" multiple>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputBorderWidth2">URL:</label>
                        <input class="form-control form-control-border border-width-2" type="url" name="url" id="exampleInputBorderWidth2" value="<?php if($ticket['url']): echo $ticket['url']; else: echo ''; endif ?>">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label id="exampleInputBorderWidth2">Teléfono de contacto:</label>
                        <input required
                            class="form-control form-control-border border-width-2 <?php if ($validation->getError('phone')): ?>is-invalid<?php endif; ?>"
                            type="tel" name="phone" pattern="{[0-9][3]}-{[0-9][3]}-{[0-9][4]}"
                            accept="application/vnd.apple.numbers"
                            value="<?php if($ticket['phone']): echo $ticket['phone']; else: set_value('phone'); endif ?>">

                        <?php if ($validation->getError('phone')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label id="exampleInputBorderWidth2">Correo electrónico:</label>
                        <input required
                            class="form-control form-control-border border-width-2 <?php if ($validation->getError('email')): ?>is-invalid<?php endif; ?>"
                            type="email" name="email"
                            value="<?php if($ticket['email']): echo $ticket['email']; else: set_value('email'); endif ?>">
                        <?php if ($validation->getError('email')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <div class="card-footer">
                <button type="reset" class="btn btn-default">Restablecer</button>
                <button type="submit" class="btn btn-primary float-right">Guardar cambios</button>
            </div>

        </form>

    </div>

</div>

<!-- </section> -->


<?= $this->endSection() ?>