<script>
    var upload_url = '{{asset('upload/')}}',
        url_gallery = '{{route('galleries.upload')}}',
        tam_gallery = '{{$tam_gallery ?? '900px de ancho x 600px de alto'}}',
        gallery_id = '{{$reg->gallery_id ?? 0}}',
        edit_img_url = '{{route('galleries.edit')}}',
        delete_img_url = '{{route('galleries.delete')}}',
        get_img_url = '{{route('galleries.get')}}',
        order_url = '{{route('galleries.order')}}',
        img_default = '{{asset('upload/default/no-image-small.png')}}';
</script>