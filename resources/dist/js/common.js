//csrf token
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

//Reload Datatable
function reloadTable(table_id) {
    $(table_id)
        .DataTable()
        .ajax.reload();
}

function roundNumber(num=0, delimiter=2) {
    return +(Math.round(num + "e+" + delimiter) + "e-" + delimiter);
}

function round_field(field, delimiter=2) {
    if (!isNaN(field.value)) {
        var value = Number(field.value);
        value = value >= 0 ? roundNumber(value, delimiter) : 0;
        if (!$('#' + field.id).attr('readonly'))
            $('#' + field.id).val(value.toFixed(delimiter));
    }

}

$(function () {
    window.Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });
});