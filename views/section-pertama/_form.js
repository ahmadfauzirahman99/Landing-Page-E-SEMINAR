$(document).ready(function () {


    tinymce.remove('textarea.iinfo');
    tinymce.init({
        selector: 'textarea.iinfo',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        },
        height: 275,
        plugins: [
            'advlist autolink link image lists charmap hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars media nonbreaking',
            'save table contextmenu directionality emoticons paste textcolor'
        ],
        style_formats: [{
            title: 'Bold text',
            inline: 'b'
        },
        {
            title: 'Red text',
            inline: 'span',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Red header',
            block: 'h1',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Example 1',
            inline: 'span',
            classes: 'example1'
        },
        {
            title: 'Example 2',
            inline: 'span',
            classes: 'example2'
        },
        {
            title: 'Table styles'
        },
        {
            title: 'Table row 1',
            selector: 'tr',
            classes: 'tablerow1'
        }
        ],
        toolbar: [
            'bullist numlist link image hr searchreplace media emoticons forecolor backcolor'
        ],
    })

    $(".dynamicform_wrapper").on("afterInsert", function (e, item) {
        tinymce.remove('textarea.iinfo');
        tinymce.init({
            selector: 'textarea.iinfo',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            height: 275,
            plugins: [
                'advlist autolink link image lists charmap hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars media nonbreaking',
                'save table contextmenu directionality emoticons paste textcolor'
            ],
            style_formats: [{
                title: 'Bold text',
                inline: 'b'
            },
            {
                title: 'Red text',
                inline: 'span',
                styles: {
                    color: '#ff0000'
                }
            },
            {
                title: 'Red header',
                block: 'h1',
                styles: {
                    color: '#ff0000'
                }
            },
            {
                title: 'Example 1',
                inline: 'span',
                classes: 'example1'
            },
            {
                title: 'Example 2',
                inline: 'span',
                classes: 'example2'
            },
            {
                title: 'Table styles'
            },
            {
                title: 'Table row 1',
                selector: 'tr',
                classes: 'tablerow1'
            }
            ],
            toolbar: [
                'bullist numlist link image hr searchreplace media emoticons forecolor backcolor'
            ],
        })

    })

})