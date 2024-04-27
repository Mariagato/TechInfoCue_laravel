/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    config.language = 'es';
    config.extraPlugins = 'youtube,widget';
    config.toolbar = [['accordionList', 'Source', 'Cut', 'Copy','-', 'Print', 'Scayt'],
        ['Font', 'FontSize', 'Format', 'Bold', 'Italic', 'Underline', 'TextColor'], ['Link', 'Unlink'],
        ['Image', 'Youtube', 'Table'],
        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
    ];
    config.filebrowserBrowseUrl = '/vendors/ckeditor/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = '/vendors/ckeditor/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = '/vendors/ckeditor/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = '/vendors/ckeditor/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = '/vendors/ckeditor/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = '/vendors/ckeditor/kcfinder/upload.php?type=flash';
    config.filebrowserUploadMethod = 'form';
};