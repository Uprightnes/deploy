$(document).ready(function() {
    $('#staffTable').DataTable();

});

$(document).on('click', '.edit-btn', function(e) {
    e.preventDefault();
    var staffId = $(this).data('id');
    var item = $(this).closest('tr').find('td');
    $('#editForm').attr('data-id', staffId); // Set staffId as a data attribute for the form
    $('#newrole').val($(item[8]).text());
    $('#newfeeder').val($(item[9]).text());
    $('#newregion').val($(item[10]).text());
    $('#newdepartment').val($(item[12]).text());
    $('#newreportinglinerole').val($(item[17]).text());
    $('#newreportinglineemail').val($(item[18]).text());
    $('#newregionalmisemail').val($(item[19]).text());
    $('#editModal').modal('show');

});

$(document).on('submit', '#editForm', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    var staffId = $(this).data('id'); // Retrieve staffId from the form's data attribute
    formData += '&staffId=' + staffId;
    $.ajax({
        type: "PUT",
        url: '/edit/' + staffId,
        data: formData,
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.status == 400) {
                $('#updateForm').html("");
                $('#updateForm').addClass('alert alert-danger');
                $.each(response.errors, function(key, err_values) {
                    $('#updateForm').append('<li>' + err_values + '</li>');
                });
            } else if (response.status == 404) {
                $('#updateForm').html("");
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
            } else {
                $('#updateForm').html("");
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
                $('#editModal').modal('hide'); // Close the modal
                location.reload(); // Reload the page
            }
        }
    });
});