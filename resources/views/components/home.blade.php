@extends('master')
@section('content')

  <table class="table mt-5">
  <thead>
   
    <tr>
      <th scope="col">#</th>
      <th scope="col">Posisi Lamaran</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
   @foreach($data as $person)
   <tr id="index_applicant_{{$person->id}}">
      <th scope="row">{{$loop->index + 1}}</th>
      <td>{{$person->posisi_lamaran}}</td>
      <td>{{$person->nama_lengkap}}</td>
      <td>
         
         <a role="button" href="/update/{{$person->id}}" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Edit</a>
         <a href="javascript:void(0)" id="delete-applicant" data-id="{{ $person->id }}" data-name="{{$person->nama_panggilan}}" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
               Delete
         </a>
      </td>
   </tr>
   @endforeach
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('after_create'))
<script>
   Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Your work has been saved",
  showConfirmButton: false,
  timer: 1500
});
</script>
@endif
@endsection

<script src="{{asset('template')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script
			  src="https://code.jquery.com/jquery-3.7.1.min.js"
			  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
			  crossorigin="anonymous">
</script>
		
<script>

$(document).ready(function () {
    $("body").on("click", "#delete-applicant", function (event) {
        event.preventDefault();
        const value = $(this).attr("data-id");
        const name = $(this).attr("data-name");
        let token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: "Anda yakin ingin menghapus " + name + " ?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete!",
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
                    url: `/delete/${value}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        id: value,
                        "_token": "{{ csrf_token() }}",
                    },
                })
                    .then((res) => {
                        console.log(res);
                        Swal.fire(
                            "Deleted!",
                            `${name} has been deleted.`,
                            "success"
                        );

                        //   setTimeout(() => {
                        //       window.location.href = '/admin/list'
                        //   }, 1500)

                        $(`#index_applicant_${value}`).remove();
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


</script>