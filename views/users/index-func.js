ubahStatus = (e) => {
    var id = $(e).data('value');
    var status = $(e).data('status');
    // console.info(status);

    $.post(baseUrl + 'api/users/update-status-verifikasi', { id: id, status: status }, function (r) {
        if (r.con) {
            successMsg(r.msg);
            updateDataTable();
        } else {
            errorMsg(r.msg + '....' + r.results);
        }
    }, 'JSON');
}

ubahPasswordDefault = (e) => {
    var id = $(e).data('value');
    // console.info(status);

    $.post(baseUrl + 'api/users/password-default', { id: id }, function (r) {
        if (r.con) {
            successMsg(r.msg);
            updateDataTable();
        } else {
            errorMsg(r.msg + '....' + r.results);
        }
    }, 'JSON');
}