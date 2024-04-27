<script>
    var
        video_gallery_id = '{{$reg->video_gallery_id ?? 0}}',
        url_upload_video = '{{route('videos.upload')}}',
        edit_video_url = '{{route('videos.edit')}}',
        delete_video_url = '{{route('videos.delete')}}',
        get_video_url = '{{route('videos.get')}}',
        order_video_url = '{{route('videos.order')}}';
</script>