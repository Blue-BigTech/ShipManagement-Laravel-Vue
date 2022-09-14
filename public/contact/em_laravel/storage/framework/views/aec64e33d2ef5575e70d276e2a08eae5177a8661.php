<?php $__env->startSection('title', __("admin_messages.page_title_plugin_list") ." | ". __("admin_messages.page_title")); ?>
<?php $__env->startSection('description', __("admin_messages.page_description")); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 mt-3">
        <h3 class="page-header"><?php echo e(__("admin_messages.menu.plugin")); ?></h3>
      </div>
    </div>
    <?php echo $__env->make("admin.include.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
      .stretch-row {
        justify-content: stretch;
      }

      .stretch-col {
        align-self: stretch;
      }

      .plugin_thumbnail {
        max-width: 300px;
      }

      .font-small {
        font-size: 0.8rem;
      }

      .spinner {
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        display: none;
      }
    </style>
    <div class="row stretch-row">
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-lg-4 col- col-xl-3 stretch-col plugin_wrap<?php echo e($row->uid); ?>">
          <div class="border rounded p-1 shadow-sm h-100">
            <?php if(isset($row->version)): ?>
              <?php if($row->active_flag == 1): ?>
                <div class="col-12 alert font-weight-bold alert-primary active_title<?php echo e($row->uid); ?>">
                  <a href="javascript:void(0);" class="under-line description_btn" data-uid="<?php echo e($row->uid); ?>" data-versionuid="<?php echo e($row->version_uid); ?>" data-description="<?php echo e($row->description); ?>">
                    <?php echo e($row->name); ?>

                  </a>
                </div>
                <div class="col-12 alert font-weight-bold alert-dark disable_title<?php echo e($row->uid); ?>" style="display: none;">
                  <a href="javascript:void(0);" class="under-line description_btn" data-uid="<?php echo e($row->uid); ?>" data-versionuid="<?php echo e($row->version_uid); ?>" data-description="<?php echo e($row->description); ?>">
                    <?php echo e($row->name); ?>

                  </a>
                </div>
              <?php else: ?>
                <div class="col-12 alert font-weight-bold alert-primary active_title<?php echo e($row->uid); ?>" style="display: none;">
                  <a href="javascript:void(0);" class="under-line description_btn" data-uid="<?php echo e($row->uid); ?>" data-versionuid="<?php echo e($row->version_uid); ?>" data-description="<?php echo e($row->description); ?>">
                    <?php echo e($row->name); ?>

                  </a>
                </div>
                <div class="col-12 alert font-weight-bold alert-dark disable_title<?php echo e($row->uid); ?>">
                  <a href="javascript:void(0);" class="under-line description_btn" data-uid="<?php echo e($row->uid); ?>" data-versionuid="<?php echo e($row->version_uid); ?>" data-description="<?php echo e($row->description); ?>">
                    <?php echo e($row->name); ?>

                  </a>
                </div>
              <?php endif; ?>
            <?php endif; ?>
            <?php if($row->screenshot !== null): ?>
              <div class="col-12 pb-2 text-center">
                <img src="data:png;base64,<?php echo e($row->screenshot); ?>" class="col-12 img-thumbnail plugin_thumbnail" alt="">
              </div>
            <?php endif; ?>
            <?php if(isset($row->active_flag)): ?>
              <div class="row ml-3 mr-3 justify-content-around">
                <?php if($row->active_flag == 1): ?>
                  <div class="text-center mb-2">
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary activation_btn activation_btn<?php echo e($row->uid); ?>" data-uid="<?php echo e($row->uid); ?>" style="display: none;"><?php echo e(__("admin_messages.plugin.activation")); ?></a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark disable_btn disable_btn<?php echo e($row->uid); ?>" data-uid="<?php echo e($row->uid); ?>"><?php echo e(__("admin_messages.plugin.disable")); ?></a>
                  </div>
                <?php else: ?>
                  <div class="text-center mb-2">
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary activation_btn activation_btn<?php echo e($row->uid); ?>" data-uid="<?php echo e($row->uid); ?>"><?php echo e(__("admin_messages.plugin.activation")); ?></a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark disable_btn disable_btn<?php echo e($row->uid); ?>" data-uid="<?php echo e($row->uid); ?>" style="display: none;"><?php echo e(__("admin_messages.plugin.disable")); ?></a>
                  </div>
                <?php endif; ?>
                <div class="text-center mb-2">
                  <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger uninstall_btn uninstall_btn<?php echo e($row->uid); ?>" data-uid="<?php echo e($row->uid); ?>" data-foldername="<?php echo e($row->folder_name); ?>"><?php echo e(__("admin_messages.plugin.uninstall")); ?></a>
                </div>
              </div>
            <?php endif; ?>
            <?php if(isset($row->price)): ?>
              <div class="row font-small ml-3 mr-3">
                <div class="col-5"><?php echo e(__("admin_messages.plugin.price")); ?></div>
                <div class="col-7">
                  <?php if($row->price == 0): ?>
                    <?php echo e(__("admin_messages.plugin.free")); ?>

                  <?php else: ?>
                    <?php echo e(__("admin_messages.plugin.front_currency_unit")); ?><?php echo e(number_format($row->price)); ?><?php echo e(__("admin_messages.plugin.behind_currency_unit")); ?>

                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
            <?php if(isset($row->overview)): ?>
              <div class="row font-small ml-3 mr-3 mt-2 mb-2">
                <div class="col-12"><?php echo e(__("admin_messages.plugin.overview")); ?></div>
                <div class="col-12"><?php echo nl2br($row->overview); ?></div>
              </div>
            <?php endif; ?>

            <?php if(isset($row->version)): ?>
              <div class="row font-small ml-3 mr-3">
                <div class="col-5"><?php echo e(__("admin_messages.plugin.version")); ?></div>
                <div class="col-7"><?php echo e($row->version); ?></div>
              </div>
            <?php endif; ?>
            <?php if(isset($row->release_date)): ?>
              <div class="row font-small ml-3 mr-3">
                <div class="col-5"><?php echo e(__("admin_messages.plugin.release_date")); ?></div>
                <div class="col-7"><?php echo e($row->release_date); ?></div>
              </div>
            <?php endif; ?>
            <?php if(isset($row->corresponding_version)): ?>
              <div class="row font-small ml-3 mr-3">
                <div class="col-5"><?php echo e(__("admin_messages.plugin.corresponding_version")); ?></div>
                <div class="col-7"><?php echo e($row->corresponding_version); ?></div>
              </div>
            <?php endif; ?>
            <?php if(isset($row->developer_name)): ?>
              <div class="row font-small ml-3 mr-3">
                <div class="col-5"><?php echo e(__("admin_messages.plugin.developer")); ?></div>
                <div class="col-7"><?php echo e($row->developer_name); ?></div>
              </div>
            <?php endif; ?>
            <?php if(isset($row->developer_url)): ?>
              <div class="row font-small ml-3 mr-3">
                <div class="col-5"><?php echo e(__("admin_messages.plugin.url")); ?></div>
                <div class="col-7">
                  <a href="<?php echo e($row->developer_url); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo e($row->developer_url); ?>&nbsp;<i class="fas fa-external-link-alt"></i>
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="spinner spinner<?php echo e($row->uid); ?> spinner-border text-secondary position-absolute" role="status"><span class="sr-only">Loading...</span></div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <?php echo csrf_field(); ?>
  <div class="holder"></div>
  <?php echo $__env->make('admin.include.list_bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('admin.modal.plugin_descriptionModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script>
    $ ( document ).ready ( function() {
      $ ( ".activation_btn" ).on ( 'click', function() {
        let uid = $ ( this ).data ( "uid" );
        $ ( ".disable_btn" + uid ).addClass ( "disabled" );
        $ ( ".uninstall_btn" + uid ).addClass ( "disabled" );
        $ ( ".spinner" + uid ).show ();
        $.ajax ( {
          headers: { 'X-CSRF-TOKEN': $ ( 'input[name="_token"]' ).val () },
          type: "POST",
          url: "<?php echo e(route("admin.plugin.activation")); ?>",
          dataType: 'json',
          data: {
            'uid': uid,
          }
        } ).done ( function( data ) {
          $ ( ".activation_btn" + uid ).removeClass ( "disabled" );
          $ ( ".disable_btn" + uid ).removeClass ( "disabled" );
          $ ( ".uninstall_btn" + uid ).removeClass ( "disabled" );
          $ ( ".spinner" + uid ).hide ();
          $ ( ".activation_btn" + uid ).hide ();
          $ ( ".active_title" + uid ).show ();
          $ ( ".disable_title" + uid ).hide ();
          $ ( ".disable_btn" + uid ).show ();
        } ).fail ( function( XMLHttpRequest, textStatus, errorThrown ) {
          $ ( ".activation_btn" + uid ).removeClass ( "disabled" );
          $ ( ".disable_btn" + uid ).removeClass ( "disabled" );
          $ ( ".uninstall_btn" + uid ).removeClass ( "disabled" );
          $ ( ".spinner" + uid ).hide ();
          alert ( "Server connection error.." );
        } );
      } );

      $ ( ".disable_btn" ).on ( 'click', function() {
        let uid = $ ( this ).data ( "uid" );
        $ ( ".disable_btn" + uid ).addClass ( "disabled" );
        $ ( ".uninstall_btn" + uid ).addClass ( "disabled" );
        $ ( ".spinner" + uid ).show ();
        $.ajax ( {
          headers: { 'X-CSRF-TOKEN': $ ( 'input[name="_token"]' ).val () },
          type: "POST",
          url: "<?php echo e(route("admin.plugin.disable")); ?>",
          dataType: 'json',
          data: {
            'uid': uid,
          }
        } ).done ( function( data ) {
          $ ( ".activation_btn" + uid ).removeClass ( "disabled" );
          $ ( ".disable_btn" + uid ).removeClass ( "disabled" );
          $ ( ".uninstall_btn" + uid ).removeClass ( "disabled" );
          $ ( ".spinner" + uid ).hide ();
          $ ( ".activation_btn" + uid ).show ();
          $ ( ".active_title" + uid ).hide ();
          $ ( ".disable_title" + uid ).show ();
          $ ( ".disable_btn" + uid ).hide ();
        } ).fail ( function( XMLHttpRequest, textStatus, errorThrown ) {
          $ ( ".activation_btn" + uid ).removeClass ( "disabled" );
          $ ( ".disable_btn" + uid ).removeClass ( "disabled" );
          $ ( ".uninstall_btn" + uid ).removeClass ( "disabled" );
          $ ( ".spinner" + uid ).hide ();
          alert ( "Server connection error.." );
        } );
      } );

      $ ( ".uninstall_btn" ).on ( 'click', function() {
        let uid    = $ ( this ).data ( "uid" );
        let result = confirm ( '<?php echo e(__("admin_messages.plugin.uninstall_conf_msg")); ?>' );
        if ( result ) {
          uninstall ( uid );
        }
      } );

      function uninstall ( uid ) {
        $ ( ".disable_btn" + uid ).addClass ( "disabled" );
        $ ( ".uninstall_btn" + uid ).addClass ( "disabled" );
        $ ( ".spinner" + uid ).show ();
        $.ajax ( {
          headers: { 'X-CSRF-TOKEN': $ ( 'input[name="_token"]' ).val () },
          type: "POST",
          url: "<?php echo e(route("admin.plugin.uninstall")); ?>",
          dataType: 'json',
          data: {
            'uid': uid,
          }
        } ).done ( function( data ) {
          $ ( ".plugin_wrap" + uid ).remove ();
          alert ( '<?php echo e(__("admin_messages.plugin.uninstall_comp_msg")); ?>' );
        } ).fail ( function( XMLHttpRequest, textStatus, errorThrown ) {
          $ ( ".activation_btn" + uid ).removeClass ( "disabled" );
          $ ( ".disable_btn" + uid ).removeClass ( "disabled" );
          $ ( ".uninstall_btn" + uid ).removeClass ( "disabled" );
          $ ( ".spinner" + uid ).hide ();
          alert ( "Server connection error.." );
        } );
      }

      $ ( '.description_btn' ).on ( 'click', function() {
        $.blockUI ( { message: 'Loading ...' } );
        $.ajax ( {
          headers: { 'X-CSRF-TOKEN': $ ( 'input[name="_token"]' ).val () },
          type: "POST",
          url: "<?php echo e(route("admin.plugin.description")); ?>",
          dataType: 'json',
          data: {
            'version_uid': $ ( this ).data ( "versionuid" ),
          }
        } ).done ( function( data ) {
          $.unblockUI ();
          let msg = "";
          $ ( '#plugin_descriptionModalHeader' ).removeClass ( "alert-primary" );
          $ ( '#plugin_descriptionModalHeader' ).removeClass ( "alert-dark" );
          if ( data['active_flag'] == true ) {
            $ ( '#plugin_descriptionModalHeader' ).addClass ( "alert-primary" );
          }
          else {
            $ ( '#plugin_descriptionModalHeader' ).addClass ( "alert-dark" );
          }
          $ ( '#plugin_descriptionModalTitle' ).html ( data['name'] );
          if ( data['description'] ) {
            $ ( '.description_content' ).html ( nl2br ( data['description'] ) );
          }
          $ ( '.developer_content' ).html ( data['developer_name'] );
          if ( data['developer_url'] ) {
            $ ( '.developer_url_content' ).html ( '<a href="' + data['developer_url'] + '" target="_blank" rel="noopener noreferrer">' + data['developer_url'] + '&nbsp;<i class="fas fa-external-link-alt"></i></a>' );
          }
          if ( data['price'] > '0' ) {
            $ ( '.price_content' ).html ( data['price'] + "<?php echo e(__("admin_messages.plugin.behind_currency_unit")); ?>" );
          }
          else if ( data['price'] == '0' ) {
            $ ( '.price_content' ).html ( "<?php echo e(__("admin_messages.plugin.free")); ?>" );
          }
          $ ( '.release_date_content' ).html ( data['release_date'] );
          $ ( '.final_update_date_content' ).html ( data['final_update_date'] );
          $ ( '.required_version_content' ).html ( data['required_version'] );
          $ ( '.latest_version_supported_content' ).html ( data['latest_version_supported'] );
          $ ( '#plugin_descriptionModal' ).modal ( 'show' );
        } ).fail ( function( XMLHttpRequest, textStatus, errorThrown ) {
          $.unblockUI ();
          alert ( "Server connection error.." );
        } );
      } );

    } );
  </script>
  <style>
    .under-line{
      text-decoration: underline;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/plugin/list.blade.php ENDPATH**/ ?>