$(document).ready(function() {
    $('#pdfForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission
        $.ajax({
            url: 'generate_pdf.php',
            type: 'POST',
            success: function(response) {
                window.location.href = 'download_pdf.php?file=' + response;
                console.log(response);
            }
        });
    });
});
