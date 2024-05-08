// Add event listener to all elements with the class 'fa-ellipsis-vertical'
$('.fa-ellipsis-vertical').click(function() {
    // Get the corresponding options-list relative to the clicked element
    var optionsList = $(this).closest('.user-post').find('.options-list');

    // If the options-list is already visible, hide it
    if (optionsList.is(':visible')) {
        optionsList.hide();
    } else {
        // Otherwise, hide all options-lists and show the related one
        $('.options-list').hide();
        optionsList.show();
    }
});
