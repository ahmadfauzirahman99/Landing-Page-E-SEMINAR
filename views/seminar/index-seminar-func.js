updateSeminar = (e) => {
    let id = $(e).data('id');
    // console.log(id);
    // e.preventDefault();
    $.ajax({
        url: baseUrl + 'seminar/update?id=' + id,
        type: 'GET',
        success: (result) => {
            $('#mymodal2').html(result);
            $('#mymodal2').modal({ show: true });
        }
    });
}