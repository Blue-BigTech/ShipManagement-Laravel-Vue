<script>
    $ ( document ).ready ( function() {
        $ ( '#data_table' ).DataTable ( {
                "stateSave": true,
                colReorder: true,
                lengthMenu: [ 10, 25, 50, 100 ],
                displayLength: 50,
                "language": {
                    "emptyTable": "<?php echo e(__("admin_messages.list_page.no_data_registered")); ?>",
                    "info": "<?php echo e(__("admin_messages.list_page.view_count_info",["start"=>"_START_","end"=>"_END_","total"=>"_TOTAL_"])); ?>",
                    "infoEmpty": "",
                    "infoFiltered": "(<?php echo e(__("admin_messages.list_page.narrow_down_display", ["max" => "_MAX_"])); ?>)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "_MENU_<?php echo e(__("admin_messages.list_page.display_count")); ?>",
                    "loadingRecords": "<?php echo e(__("admin_messages.list_page.loading")); ?>",
                    "processing": "<?php echo e(__("admin_messages.list_page.processing")); ?>",
                    "search": "<?php echo e(__("admin_messages.list_page.search")); ?>",
                    "zeroRecords": "<?php echo e(__("admin_messages.list_page.not_found")); ?>",
                    "paginate": {
                        "first": "<?php echo e(__("admin_messages.list_page.first")); ?>",
                        "previous": "<?php echo e(__("admin_messages.list_page.forward")); ?>",
                        "next": "<?php echo e(__("admin_messages.list_page.next")); ?>",
                        "last": "<?php echo e(__("admin_messages.list_page.end")); ?>"
                    },
                    "order": [ [ 0, "desc" ] ]
                }
            }
        );
    } );
</script>
<?php /**PATH /home/xs958314/yugyosen.com/public_html/public/contact/em_laravel/resources/views/admin/include/list_bottom.blade.php ENDPATH**/ ?>