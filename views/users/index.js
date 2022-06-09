$("#responsive-datatable").DataTable({
    "processing": true,
    "serverSide": true,
    // "searching": false,
    "pageLength": 15,
    "ajax": {
        "url": baseUrl + 'api/default/user-index',
        "type": "POST"
    },
    // rowGroup: {
    //     startRender: null,
    //     endRender: function (rows, group) {
    //         return group + ' (' + rows.count() + ')';
    //     },
    //     dataSrc: 6
    // },

    "columnDefs": [
        {
            "width": "150px",
            "class": "text-center",
            "targets": [0],
            render: (data, type, row, meta) => {

                var tr = "<a href='" + baseUrl + "users/update?id=" + row[0] + "' data-toggle='modal' data-title='Data Profile Pasien' data-target='#myModal' class='btn btn-primary btn-icon btn-md'><span class='fas fa-pencil-alt'></span></a> &nbsp;"
                    + "<a href='#' onClick='ubahStatus(this)' data-status='" + row[5] + "' data-value='" + row[0] + "' class='btn btn-warning btn-icon btn-md'><span class='fas fa-check'></span></a> &nbsp;"
                    + "<a href='#' onClick='ubahPasswordDefault(this)' data-value='" + row[0] + "' class='btn btn-danger btn-icon btn-md'><span class='fas fa-key'></span></a> &nbsp;";
                return tr;
            }
        },
        {
            "width": "150px",
            "targets": [2]
        },
        {
            "width": "120px",
            "targets": [5],
            "class": "text-center",
            render: (data, type, row, meta) => {
                return row[5] == 0 ? 'Belum Verifikasi' : 'Terverifikasi';
            }
        },
        {
            "class": "text-center",
            "targets": [4, 3, 2, 1]
        }
    ],
    "createdRow": function (row, data, dataIndex) {
        // if (data[7] == 'Terlaksana') {
        //     $(row).addClass('success');
        // }else{
        //     $(row).addClass('pending');

        // }
    },
    "order": [
        [2, "DESC"]
    ],

});

