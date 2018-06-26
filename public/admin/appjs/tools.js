function rangoutil(totalpage, currentpage) {
    let star, end, total;
    total = (totalpage !== null) ? parseInt(totalpage) : 0;
    if (total <= 5) {
        star = 1;
        end = total + 1
    } else {
        if (currentpage <= 2) {
            star = 1
            end = 6
        } else if (currentpage + 2 >= total) {
            star = total - 5;
            end = total + 1
        } else {
            star = currentpage - 2;
            end = currentpage + 3
        }
    }
    return _.range(star, end)
};

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2400",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};