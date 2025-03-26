<script>
    $(document).ready(function(){
        /* //////////////////////// 
                DATATABLE
        ////////////////////////// */
        const table = $('.datatables').DataTable({
            order: [],
            paging: true, 
            searching: true,  // Arama işlevi aktif kalır
        })

        if (table.length && table?.data().count() === 0) {
            table?.destroy()
            table({
                "paging": false
            })
        }

        /* //////////////////////// 
                SUMMERNOTE
        ////////////////////////// */
        $('.summernote').summernote({
            placeholder: 'Hello Bootstrap 5',
            tabsize: 2,
            height: 100,
        })
        $('.note-toolbar').css('display', 'flex').css('justify-content', 'flex-start');   
    })
</script>