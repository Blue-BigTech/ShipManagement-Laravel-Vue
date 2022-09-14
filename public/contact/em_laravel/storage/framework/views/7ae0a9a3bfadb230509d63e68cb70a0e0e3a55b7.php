<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link href="<?php echo e(config('app.admin_assets_url')); ?>/css/jPages.css" rel="stylesheet" />
  <link href="<?php echo e(config('app.admin_assets_url')); ?>/css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/jquery.cookie.js"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/jquery.blockUI.js"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/lightbox.js" type="text/javascript"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/jPages.js" type="text/javascript"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/base.js"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/dash_board.js"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/csv.js"></script>
  <script src="<?php echo e(config('app.admin_assets_url')); ?>/js/admin.js"></script>
  <?php if(isset($append['admin_head_bottom'])): ?><?php echo $append['admin_head_bottom']; ?><?php endif; ?>
</head>

<body class="sb-nav-fixed">
  <?php if(isset($append['admin_body_top'])): ?><?php echo $append['admin_body_top']; ?><?php endif; ?>
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo e(route('admin.top')); ?>">
      <img src="<?php echo e(config('app.admin_assets_url')); ?>/images/logo_w.svg" class="img-responsive header-logo">
    </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    
    
    <div class="off_white ml-auto mr-2">
      <ul class="navbar-nav d-md-inline-block mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?php echo e(config("app.laravel_url").DIRECTORY_SEPARATOR."resources".DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.Auth::user()->language.DIRECTORY_SEPARATOR."icon.svg"); ?>" style="width: 18px; height: auto;">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="dropdown-item" href="<?php echo e(route('admin.switch_language',["language" => $language->lang_name])); ?>">
              <img src="<?php echo e(config("app.laravel_url").DIRECTORY_SEPARATOR."resources".DIRECTORY_SEPARATOR."lang".DIRECTORY_SEPARATOR.$language->lang_name.DIRECTORY_SEPARATOR."icon.svg"); ?>" style="width: 32px; height: auto;">
              &nbsp;&nbsp;<?php echo e(__("admin_messages.lang.".$language->lang_name)); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </li>
      </ul>
    </div>
    <div class="off_white"><?php echo e(Auth::user()->email); ?></div>
    <ul class="navbar-nav d-md-inline-block mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          
          <?php if(Auth::user()->is_admin || Auth::user()->is_editor): ?>
            <a class="dropdown-item" href="<?php echo e(route('admin.setting')); ?>"><?php echo e(__("admin_messages.menu.admin_setting")); ?></a>
          <?php endif; ?>
          <a class="dropdown-item" href="<?php echo e(route('admin.rew_pass')); ?>"><?php echo e(__("admin_messages.menu.rew_password")); ?></a>
          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><?php echo e(__("admin_messages.menu.log_out")); ?></a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <a class="nav-link" href="<?php echo e(route('admin.top')); ?>">
              <?php echo e(__("admin_messages.menu.dash_board")); ?>

            </a>
            <?php $__currentLoopData = $dash_board_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($menu['type'] == "heading"): ?>
                <div class="sb-sidenav-menu-heading"><?php echo e($menu['title']); ?></div>
              <?php elseif($menu['type'] == "link"): ?>
                <a class="nav-link" href="<?php echo e($menu['href']); ?>">
                  <?php if($menu['icon']): ?>
                    <div class="sb-nav-link-icon"><?php echo $menu['icon']; ?></div>
                  <?php endif; ?>
                  <?php echo e($menu['title']); ?>

                </a>
              <?php elseif($menu['type'] == "accordion"): ?>
                
                <?php if($menu['title'] == __("admin_messages.menu.plugin") && Auth::user()->is_general_editor): ?>
                
                <?php elseif($menu['title'] == __("admin_messages.menu.users") && (Auth::user()->is_editor || Auth::user()->is_general_editor)): ?>
                
                <?php elseif($menu['title'] == __("admin_messages.menu.setting") && Auth::user()->is_general_editor): ?>
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts<?php echo e($loop->iteration); ?>" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><?php echo $menu['icon']; ?></div>
                    <?php echo e($menu['title']); ?>

                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <?php if(isset($menu['item'])): ?>
                    <div class="collapse" id="collapseLayouts<?php echo e($loop->iteration); ?>" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                      <nav class="sb-sidenav-menu-nested nav">
                        <?php $__currentLoopData = $menu['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($item['title'] == __("admin_messages.menu.rew_password")): ?>
                            <a class="nav-link" href="<?php echo e($item['href']); ?>">
                              <div class="sb-nav-link-icon"><?php echo $item['icon']; ?></div>
                              <?php echo e($item['title']); ?>

                            </a>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </nav>
                    </div>
                  <?php endif; ?>
                <?php else: ?>
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts<?php echo e($loop->iteration); ?>" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><?php echo $menu['icon']; ?></div>
                    <?php echo e($menu['title']); ?>

                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <?php if(isset($menu['item'])): ?>
                  <div class="collapse" id="collapseLayouts<?php echo e($loop->iteration); ?>" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <?php $__currentLoopData = $menu['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a class="nav-link" href="<?php echo e($item['href']); ?>">
                        <div class="sb-nav-link-icon"><?php echo $item['icon']; ?></div>
                        <?php echo e($item['title']); ?>

                      </a>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </nav>
                  </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <div class="sb-sidenav-footer text-center">
          <a href="<?php echo e(route('logout')); ?>" data-toggle="tooltip" title="ログアウト"><i class="fas fa-sign-out-alt"></i></a>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <?php echo $__env->yieldContent('content'); ?>
      <footer class="py-3 bg-light mt-auto" style="height: 49px;">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">
              <a href="<?php echo e(__('admin_messages.easymail_url')); ?>" target="_blank" class="text-decoration-none" data-toggle="tooltip" title="<?php echo e(__('admin_messages.easymail_url')); ?>" rel="noopener noreferrer">
                <img src="<?php echo e(config('app.admin_assets_url')); ?>/images/logo_b_02.svg" class="img-responsive" style="height: 18px;">&nbsp;&nbsp;
                <?php echo e(__('admin_messages.easymail_url')); ?>

              </a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?php if(isset($append['admin_body_bottom'])): ?><?php echo $append['admin_body_bottom']; ?><?php endif; ?>
  <?php if(config( "app.demo_mode" )): ?>
  <script>
    $.blockUI({
      message: "デモ画面ですので、保存、複製、削除、メール送信などの動作はできなくなっています。",
      fadeIn: 400,
      fadeOut: 700,
      // timeout: 5000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '60%',
        height: '46px',
        top: '10px',
        left: '20%',
        border: '1px solid #fa3701',
        padding: '12px',
        backgroundColor: "#fff",
        'border-radius': '3px',
        'border-color': '#fa3701',
        '-webkit-border-radius': '3px',
        '-moz-border-radius': '3px',
        opacity: 0.7,
        color: '#fa3701',
        'font-weight': 'bold',
        transition: 'box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1)',
        cursor: 'default'
      }
    });
  </script>
  <?php endif; ?>
</body>

</html>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/layout.blade.php ENDPATH**/ ?>