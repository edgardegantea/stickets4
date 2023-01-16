<?= $this->extend('admin/template/admin_template'); ?>



<?= $this->section('content'); ?>

<div>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/tickets/new') ?>" class="btn btn-primary float-right">Nuevo</a>
            <h3 class="card-title"><?= esc($title); ?></h3>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Remitente</th>
                    <th>Área</th>
                    <th>Estado</th>
                    <th>Asunto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                <?php if (!empty($tickets) && is_array($tickets)): ?>
                    <?php foreach ($tickets as $ticket): ?>

                        <td>
                            <?= esc($ticket->created_at); ?>
                        </td>



                        <td>
                            <?= esc($ticket->name . ' ' . $ticket->apaterno . ' ' . $ticket->amaterno); ?>
                        </td>

                        <td>
                            <?= esc($ticket->nombrearea) ?>  
                        </td>
                        
                        <td>
                            <?= esc($ticket->estado) ?>
                        </td>

                        <td>
                            <p><?= esc($ticket->title) ?></p>
                        </td>

                        <td>
                            <?= esc($ticket->description) ?>
                        </td>

                        <td class="d-flex">
                            <a href="<?= base_url('/admin/tickets/'.$ticket->id) ?>" class="btn btn-sm mx-1" title="Ver"><span class="fas fa-eye"><span></a>
                            <a href="<?= base_url('/admin/tickets/'.$ticket->id.'/edit') ?>" class="btn btn-sm mx-1"><span class="fas fa-edit"><span></a>
                            
                            <form class="display-none" method="post" action="<?= base_url('/admin/tickets/'.$ticket->id)?>" id="ticketDeleteForm<?=$ticket->id?>">
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <a href="javascript:void(0)" onclick="deleteTicket('ticketDeleteForm<?=$ticket->id?>')" class="btn btn-sm bg-danger" title="Eliminar registro"><span class="fas fa-trash"></span></a>
                                </form>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Remitente</th>
                    <th>Área</th>
                    <th>Estado</th>
                    <th>Asunto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>


<script>
    function deleteTicket(formId) {
        var confirm = window.confirm('Esta operación no se puede revertir. ¿Desea continuar?');
        if(confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>

<?= $this->include('admin/template/css'); ?>
<?= $this->include('admin/template/js'); ?>







