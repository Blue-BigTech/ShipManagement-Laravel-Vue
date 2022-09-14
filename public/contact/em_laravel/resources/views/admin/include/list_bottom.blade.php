<script>
    $ ( document ).ready ( function() {
        $ ( '#data_table' ).DataTable ( {
                "stateSave": true,
                colReorder: true,
                lengthMenu: [ 10, 25, 50, 100 ],
                displayLength: 50,
                "language": {
                    "emptyTable": "{{__("admin_messages.list_page.no_data_registered")}}",
                    "info": "{{__("admin_messages.list_page.view_count_info",["start"=>"_START_","end"=>"_END_","total"=>"_TOTAL_"])}}",
                    "infoEmpty": "",
                    "infoFiltered": "({{__("admin_messages.list_page.narrow_down_display", ["max" => "_MAX_"])}})",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "_MENU_{{__("admin_messages.list_page.display_count")}}",
                    "loadingRecords": "{{__("admin_messages.list_page.loading")}}",
                    "processing": "{{__("admin_messages.list_page.processing")}}",
                    "search": "{{__("admin_messages.list_page.search")}}",
                    "zeroRecords": "{{__("admin_messages.list_page.not_found")}}",
                    "paginate": {
                        "first": "{{__("admin_messages.list_page.first")}}",
                        "previous": "{{__("admin_messages.list_page.forward")}}",
                        "next": "{{__("admin_messages.list_page.next")}}",
                        "last": "{{__("admin_messages.list_page.end")}}"
                    },
                    "order": [ [ 0, "desc" ] ]
                }
            }
        );
    } );
</script>
