<script>

        $(function() {
            $('table').DataTable({
                    responsive: true,
                    "bPaginate": false,
            "bInfo": false,
                })
                .columns.adjust()
                .responsive.recalc();
        })
</script>
