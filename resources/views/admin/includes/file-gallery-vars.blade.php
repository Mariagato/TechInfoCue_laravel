<script>
    var
        upload_url_file = '{{asset('upload/file')}}',
        file_gallery_id = '{{$reg->file_gallery_id ?? 0}}',
        url_upload_file = '{{route('files.upload')}}',
        edit_file_url = '{{route('files.edit')}}',
        delete_file_url = '{{route('files.delete')}}',
        get_file_url = '{{route('files.get')}}',
        order_file_url = '{{route('files.order')}}',
        img_default = '{{asset('upload/default/upload-pdf.png')}}';
</script>