/* select2 */
$(document).ready(function () {
    if ($('.select2').length) {
        $('.select2').select2();
    }

    $('.modal').on('shown.bs.modal', function () {
        $(this).find('.select2').each(function () {
            if ($(this).length) {
                $(this).select2({
                    dropdownParent: $(this).closest('.modal')
                });
            }
        });
    });
});
/* end select2 */

/* tooltip */
$('.title-tooltip').tooltip();
$('.btn').tooltip();
$('i').tooltip();
/* end tooltip */

/* fancyapps */
$(document).ready(function () {
    Fancybox.bind('[data-fancybox="gallery-1"]');
    Fancybox.bind('[data-fancybox="gallery-2"]');
});
/* end fancyapps */

/* button loading */
$(document).ready(function () {
    $('.btn-loading').on('click', function () {
        $(this).prop('disabled', true);

        var loadingText = $(this).data('loading-text') || 'Loading';
        $(this).html(loadingText);

        setTimeout(() => {
            $(this).closest('form').submit();
        });
    });
});
/* end button loading */

//  ################################################################################################
// Function to initialize the editor if the element exists
function initializeEditor(editorClass) {
    const editorElement = document.querySelector(editorClass);
    if (editorElement) {
        ClassicEditor
            .create(editorElement, {
                toolbar: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    // 'underline',
                    // 'strikethrough',
                    '|',
                    'link',
                    // 'imageUpload',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    '|',
                    'insertTable',
                    'mediaEmbed',
                    'horizontalLine',
                    '|',
                    'undo',
                    'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    }
}

// Initialize the editors based on their class names
initializeEditor('.ckeditor0');
initializeEditor('.ckeditor1');
initializeEditor('.ckeditor2');
initializeEditor('.ckeditor3'); 
