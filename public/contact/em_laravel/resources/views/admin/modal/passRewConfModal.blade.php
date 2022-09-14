<!-- Modal -->
<div class="modal fade" id="passRewConfModal" tabindex="-1" role="dialog" aria-labelledby="passRewConfModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">{{ __("admin_messages.confirm_rew_pass") }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="passRewConfModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("admin_messages.no") }}</button>
                <button type="button" id="passRewYesBtn" class="btn btn-danger">{{ __("admin_messages.yes") }}</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->

