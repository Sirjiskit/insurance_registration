$(document).ready(function () {
    $("#form-register").validate({
        rules: {
            fullname: "required",
            password: {
                required: true,
                minlength: 5
            },
            confirmPassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            fullname: "Please enter your fullname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirmPassword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address"
        }
    });
    $("#form-register").on('submit', async function (e) {
        e.preventDefault();
        const api = new Api();
        api.url = $(this).attr('action');
        api.fd = new FormData(this);
        const res = await api.http();
        if (res.success) {
            api.showSuccess(res.message);
            setTimeout(function(){
                window.location = res.data;
            },1500);
        } else {
            api.showError(res.message,'center','bottom');
        }
    });
    $("#auth-login").on('submit', async function (e) {
        e.preventDefault();
        const api = new Api();
        api.url = $(this).attr('action');
        api.fd = new FormData(this);
        const res = await api.http();
        if (res.success) {
            api.showSuccess(res.message);
            setTimeout(function(){
                window.location = res.data;
            },1500);
        } else {
            api.showError(res.message,'center','bottom');
        }
    });
});