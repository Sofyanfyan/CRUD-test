$(document).ready(function () {
    $("body").on("click", "#delete-applicant", function (event) {
        event.preventDefault();
        const value = $(this).attr("data-id");
        const name = $(this).attr("data-name");
        let token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: "Are you sure want to inactive " + name + "?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, inactive!",
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(value);
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                        "Access-Control-Allow-Origin": "*",
                    },
                    accepts: {
                        mycustomtype: "application/x-some-custom-type",
                        "Access-Control-Allow-Origin": "*",
                    },
                    url: `/admin/student/${value}`,
                    type: "PATCH",
                    cache: false,
                    data: {
                        id: value,
                        _token: token,
                    },
                })
                    .then((res) => {
                        console.log(res);
                        Swal.fire(
                            "Inactive!",
                            `${name} has been inactive.`,
                            "success"
                        );

                        //   setTimeout(() => {
                        //       window.location.href = '/admin/list'
                        //   }, 1500)

                        $(`#index_student_${value}`).remove();
                    })
                    .catch((err) => {
                        console.log(err);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            // text: err,
                            footer: '<a href="">Why do I have this issue?</a>',
                        });
                    });
            }
        });
    });
});
