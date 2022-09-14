<!-- Modal -->
<div class="modal fade" id="deleteConfModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("admin_messages.confirm_delete")); ?></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="deleteConfModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("admin_messages.no")); ?></button>
                <button type="button" class="btn btn-danger btn-yes"><?php echo e(__("admin_messages.yes")); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->

<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/modal/deleteConfModal.blade.php ENDPATH**/ ?>