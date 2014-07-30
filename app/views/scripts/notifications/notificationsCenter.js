// first temporary version of notification center
// need to be more dynamic

function display_infos() {
    $('.alert.alert-info').each(function (index, node) { toastr.info($(node).html()) });
}

function display_success() {
    $('.alert.alert-success').each(function (index, node) { toastr.success($(node).html()) });
}

function display_warnings() {
    $('.alert.alert-warning').each(function (index, node) { toastr.warning($(node).html()) });
}

function display_errors() {
    $('.alert.alert-danger').each(function (index, node) { toastr.error($(node).html()) });
}

(function () {
    display_errors();
    display_warnings();
    display_success();
    display_infos();
})();
