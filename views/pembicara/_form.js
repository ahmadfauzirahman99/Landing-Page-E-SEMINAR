$(`#form`)
    .on("beforeSubmit", function (e) {
        e.preventDefault();

        console.log("asdasdasadsa");
        var btn = $(".btn-submit");
        var html = btn.html();
        setBtnLoading(btn, "Menyimpan");
        var formURL = $("#form").attr("action");
        var formData = new FormData($('#form')[0])

        $.ajax({
            url: formURL,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,

            // Form data
            data: formData,

            success: function (result) {

                console.log(result);
                if (result.con) {
                    successMsg(result.msg);
                    resetBtnLoading(btn, html);
                    updateDataTable();
                    //     // location.replace(baseUrl + "pasien/update?id=" + result.id);
                    //     // $('.btn-next').show('slow');
                    //     // $('.progress-daftar').removeClass('inactive progress-bar-warning').addClass('progress-bar-success active').find('.status-icon').html('<i class=\'fa fa-check-circle\'></i>');
                } else {
                    error(result.msg + '---' + JSON.stringify(result.results));

                    resetBtnLoading(btn, html);
                }
            },
            error: function (xhr, status, error) {
                errorMsg(error);
                resetBtnLoading(btn, html);
            },
        });
    })
    .on("submit", function (e) {
        e.preventDefault();
    });