$("#responsive-datatable").DataTable({
    "processing": true,
    "serverSide": true,
    // "searching": false,
    "pageLength": 15,
    "ajax": {
        "url": baseUrl + 'api/tiket/index',
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
            "width": "20px",
            "class": "text-center",
            "targets": [0],
            render: (data, type, row, meta) => {

                var tr = "<a href='#' onClick='update(this)' data-id='" + row[0] + "'  class='btn btn-outline-primary btn-icon btn-md'><span class='fas fa-pencil-alt'></span></a> &nbsp;"
                    + "<a href='#' onClick='hapus(this)' data-value='" + row[0] + "' class='btn btn-outline-danger btn-icon btn-md'><span class='fas fa-trash'></span></a> &nbsp;"
                return tr;
            }
        },
        {
            "width": "70px",
            "class": "text-center",
            "targets": [4],
            render: (data, type, row, meta) => {
                var a = "<a target='_blank' href='" + baseUrl + "lampiran-tiket-seminar/" + row[4] + "' class='btn btn-info btn-sm'>Link Gambar</a>";
                return a;
            }
        },
        {
            "class": "text-center",
            "targets": [1]
        }
    ],
    //     {
    //         "width": "150px",
    //         "targets": [2]
    //     },
    //     {
    //         "width": "120px",
    //         "targets": [5],
    //         "class": "text-center",
    //         render: (data, type, row, meta) => {
    //             return row[5] == 0 ? 'Belum Verifikasi' : 'Terverifikasi';
    //         }
    //     },

    // ],
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

