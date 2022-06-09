
$(`#form`)
    .on("beforeSubmit", function (e) {
        e.preventDefault();
        var btn = $(".btn-submit");
        var html = btn.html();
        setBtnLoading(btn, "Menyimpan");
        var formURL = $("#form").attr("action");
        $.ajax({
            url: formURL,
            type: "post",
            dataType: "json",
            data: $(this).serialize(),
            success: function (result) {
                if (result.con) {
                    successMsg(result.msg);
                    resetBtnLoading(btn, html);
                    updateDataTable();
                } else {
                    // $.each(result.e, function (i, v) {
                    //     errorMsg(v);
                    // });
                    errorMsg(result.msg + ' - ' + JSON.stringify(result.results));
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
