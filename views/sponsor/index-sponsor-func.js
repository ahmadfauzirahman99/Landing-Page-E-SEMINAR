update = (e) => {
    let id = $(e).data('id');
    // console.log(id);
    // e.preventDefault();
    $.ajax({
        url: baseUrl + 'sponsor/update?id=' + id,
        type: 'GET',
        success: (result) => {
            $('#mymodal2').html(result);
            $('#mymodal2').modal({ show: true });
        }
    });
}

tambah = () => {
    $.ajax({
        url: baseUrl + 'sponsor/create',
        type: 'GET',
        success: (result) => {
            $('#mymodal2').html(result);
            $('#mymodal2').modal({ show: true });
        }
    });
}


hapus = (e) => {
    let id = $(e).data('value');
    Swal.fire({
        title: 'Perhatian!',
        text: 'Apakah Ingin Menghapus Data Ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.value) {
            $.post(baseUrl + 'sponsor/delete?id=' + id, function (r) {

                if (r.con) {
                    updateDataTable();
                } else {
                    errorMsg(r.msg)
                }
            }, 'JSON');
        } else {

        }
    })
}