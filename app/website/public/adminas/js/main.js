$(document).ready(function() {
    $('#btn-logout').on('click', function() {
        $('#logout-form').submit();
    });

    let stop = true;
    $('.btn-delete').on('click', function(e) {
        if (stop) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    stop = false;
                    this.click();
                }
            })
        } else {
            stop = true;
        }
    });

    $('.change-password').on('click', function(e) {
        var index = $('#change-password').val();
        $('#change-password').val(-index);
    });


    // $('#edit-user').on('click', function(e) {
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         url: '/user/edit',
    //         method: 'PATCH',
    //         data: {
    //             '_method': "PATCH",
    //             'username': $('.edit-user #username').val(),
    //             'email': $('.edit-user #email').val(),
    //             'phone': $('.edit-user #phone').val(),
    //             'oldPassword': $('.edit-user #oldPassword').val(),
    //             'password': $('.edit-user #password').val(),
    //             'password_confirmation': $('.edit-user #password_confirmation').val(),
    //         },
    //         success: (data) => {
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Đề xuất thành công',
    //                 text: 'Bạn đã gửi đê xuất!',
    //                 button: false,
    //                 timer: 3000
    //             });
    //         },
    //         error: (err) => {

    //         }
    //     });
    // });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#comment-post').on('submit', function(e) {
        e.preventDefault();
        var content = $('#comment-post #content').val();
        var user_id = $('#comment-post #user_id').val();
        var post_id = $('#comment-post #post_id').val();
        $.ajax({
            url: '/users/comment',
            type: 'POST',
            data: {
                'content': content,
                'user_id': user_id,
                'post_id': post_id,
            },
            success: (data) => {
                alert('oke');
            },
            error: (data) => {
                alert('loi');
            }
        });
    });

    $('#followForm').on('click', function(e) {
        e.preventDefault();
        var checkLogin = $('#checkLogin').val();
        console.log(checkLogin);
        var youNeedLogin = $('#youNeedLogin').val();
        if(checkLogin == 0) {
            alert('youNeedLogin');
        }
        else {
            $('#followForm').submit();
        }
        var author_id = $('#followForm #author_id').val();
        var following_id = $('#followForm #following_id').val();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     url: 'http://localhost:8000/users/follow',
        //     type: 'POST',
        //     data: {
        //         'author_id': author_id,
        //         'following_id': following_id,
        //     },
        //     dataType: "json",
        //     success: (data) => {
        //         alert('oke');
        //     },
        //     error: (data) => {
        //         alert('loi');
        //     }
        // });
    });
});
