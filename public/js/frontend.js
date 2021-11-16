jQuery(document).ready(function($){

    $('#delete_contact').on('click', function (e) {
        e.preventDefault();
        let data_id = $(this).attr('data-id');
        console.log(data_id);

        $.ajax({
            url: '/contacts/'+data_id,
            headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            type: 'delete',
            success: data => {

                window.location.href = '/contacts/';
            },
            error: function(jqXHR, exception) {

            }
        });

    })

});
