$(function(){  
    function create_uploader(btn_id, img_obj) {
    document.getElementById(btn_id).style.cursor = "pointer";
    var uploader = new plupload.Uploader({
        runtimes: 'html5,flash,silverlight,html4',
        browse_button: btn_id, // you can pass in id...
        url: $('input[name="server"]').val()+'/?p=admin&c=Image&a=category_cover',
        flash_swf_url: 'public/plupload-2.1.2/js/Moxie.swf',
        silverlight_xap_url: 'public/plupload-2.1.2/js/Moxie.xap',
        max_file_count: 1,
        filters: {
            max_file_size: '5000kb',
            mime_types: [
                {title: "Images files", extensions: "jpg,jpeg,gif"}
            ]
        },
        init: {
            PostInit: function () {
                /*
                 document.getElementById('filelist').innerHTML = '';
                 document.getElementById('uploadfiles').onclick = function () {
                 uploader.start();
                 return false;
                 };
                 */
            },
            FilesAdded: function (up, files) {
                /*
                 plupload.each(files, function (file) {
                 $("#img_file_filename").html(file.name);
                 });
                 */
                img_obj.unbind();
                layer.msg("开始上传...");
                uploader.start();
                return false;
            },
            UploadProgress: function (up, file) {
            },
            Error: function (up, err) {
                //openDialog("上传文件太大,最大不能超过60kb");
                //document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
                myAlert("上传文件太大,最大不能超过5M");
            },
            FileUploaded: function (up, file, info) {
//                alert(info.response);
                var src = info.response;
                img_obj.attr({"src": src}); 
                $('input[name="cover_path"]').val(src);
                layer.msg("上传结束...");
            }
        }
    });
    uploader.init();
}
        create_uploader('cover',$("#cover"));
});


