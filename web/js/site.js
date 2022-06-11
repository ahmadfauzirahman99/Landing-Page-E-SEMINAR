function setBtnLoading(btn, txt = "") {
    btn
        .html('<i class="fas fa-spinner fa-spin fa-fw"></i> ' + txt)
        .attr("disabled", true);
}

function resetBtnLoading(btn, htm) {
    btn.html(htm).removeAttr("disabled");
}

function errorMsg(txt) {
    if (typeof txt == "object") {
        $.each(txt, function (i, v) {
            toastr["error"](v);
        });
    } else {
        toastr["error"](txt);
    }
}
// animasi untuk modal body
let bodyLoad = `
  <div style="text-align: center; margin: 3% 0 3% 0">
      <img src="${baseUrl}/../../img/loading_3.gif">
  </div>
  `
function successMsg(txt) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr["success"](txt);

}
function errorMsg2(txt) {
    toastr["error"](txt);
}

$(function () {
    $('[data-rel="tooltip"]').tooltip()
})

$("#pj-site-index").on("pjax:end", function () {
    $('[data-rel="tooltip"]').tooltip()
})

updateDataTable = () => {
    $('#responsive-datatable').DataTable().ajax.reload(null, false);
}
