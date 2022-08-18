$(document).ready(function () {
    if ($("#form-add-home").length > 0) {
        $("#form-add-home").validate();
        $("#form-add-home").on('submit', async function (e) {
            e.preventDefault();
            if (!$(this).valid()) {
                return false;
            }
            const api = new Api();
            api.url = $(this).attr('action');
            api.fd = new FormData(this);
            // api.type = 'PUT';
            const res = await api.http();
            if (res.success) {
                api.showSuccess(res.message);
                $("#form-add-home").trigger('reset');
            } else {
                api.showError(res.message);
            }
        });
    }
    if ($(".btn-change-status").length > 0) {
        $(".btn-change-status").on('click', function (e) {
            const url = $(this).attr('data-url');
            const id = $(this).attr('data-id');
            const status = $(this).attr('data-status');
            const msg = $(this).attr('data-msg');
            const fd = new FormData();
            fd.append('id', id);
            fd.append('status', status);
            const api = new Api();
            api.url = url;
            api.fd = fd;
            // api.type = 'PUT';
            Swal.fire({
                title: "Are you sure?",
                text: `You are about to ${msg.toLowerCase()} this application`,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: `Yes, ${msg.toLowerCase()} it!`,
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(async (res) => {
                if (res.isConfirmed) {
                    const res = await api.http();
                    if (res.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Changed",
                            text: res.message,
                        });
                        setTimeout(() => {
                            window.location = '';
                        }, 1500);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Fail",
                            text: res.message,
                        });
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Cancelled",
                        text: "Operation cancelled!",
                    });
                }
            });

        });
    }
    if ($("#table1").length > 0) {
        let jquery_datatable = $("#table1").DataTable()
    }
});