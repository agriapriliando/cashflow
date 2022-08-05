$(document).ready(function () {
    $("#position").select2({
        allowClear: true,
        placeholder: 'Jenis'
    });

    // DataTable
    $('#zero_config tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Cari '+title+'" />' );
        if (title == 'No') {
            $(this).html( '<input type="text" placeholder="" disabled />' );       
        }
        if (title == '###') {
            $(this).html( '<input type="text" placeholder="" disabled />' );       
        }
    } );
    var width = $(window).width();
    var table = $('#zero_config').DataTable({
        responsive: true,
        "columnDefs": [
            { responsivePriority: 1000,  "targets": 0, searchable: false },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 1, targets: 2 },
        ],
        "autoWidth": false,
        initComplete: function () {
            // Apply the search
            this.api().columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        }
    });
    
    // DataTable
    $('#data_all').DataTable({
    });
});
document.getElementById('hariini').valueAsDate = new Date();