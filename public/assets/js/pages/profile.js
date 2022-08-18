$(document).ready(function () {
    $("#form-profile").validate();
    $("#form-profile").on('submit', async function (e) {
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
        } else {
            api.showError(res.message);
        }
    });
});