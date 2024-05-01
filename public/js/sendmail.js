$(document).ready(function() {
    // Get CSRF token value from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.deploy-btn').click(function() {
        var staffId = $(this).data('id');
        var staffData = {};
        var row = $(this).closest('tr');
        staffData.surname = row.find('td:eq(1)').text();
        staffData.othername = row.find('td:eq(2)').text();
        staffData.staffid = row.find('td:eq(0)').text();
        staffData.currentrole = row.find('td:eq(4)').text();
        staffData.effectivedate = row.find('td:eq(13)').text();
        staffData.newregion = row.find('td:eq(10)').text();
        staffData.newdepartment = row.find('td:eq(12)').text();
        staffData.newrole = row.find('td:eq(8)').text();
        staffData.newreportinglinerole = row.find('td:eq(17)').text();
        staffData.redeploymenttype = row.find('td:eq(20)').text();
        staffData.email = row.find('td:eq(14)').text();
        staffData.currentregionalmisemail = row.find('td:eq(16)').text();
        staffData.newreportinglineemail = row.find('td:eq(18)').text();
        staffData.newregionalmisemail = row.find('td:eq(19)').text();

        // Include CSRF token in the request headers
        var headers = {
            'X-CSRF-TOKEN': csrfToken
        };

        // Construct URL with staff ID
        var url = '/sendmail/' + staffId;

        // Send AJAX request to backend
        $.ajax({
            url: url,
            type: 'POST',
            headers: headers, // Include CSRF token in the request headers
            data: staffData,

            success: function(response) {
                // Redirect to new page or handle response accordingly
                window.location.href = '/sendmail';
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});