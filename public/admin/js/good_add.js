$(function () {
    function create_uploader(btn_id, img_obj, text_obj,img_delete) {
        document.getElementById(btn_id).style.cursor = "pointer";
        var uploader = new plupload.Uploader({
            runtimes: 'html5,flash,silverlight,html4',
            browse_button: btn_id, // you can pass in id...
            url: $('input[name="server"]').val() + '/?p=admin&c=Image&a=image_upload',
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
                },
                FilesAdded: function (up, files) {
                    img_obj.unbind();
                    layer.msg("开始上传...");
                    uploader.start();
                    return false;
                },
                UploadProgress: function (up, file) {
                },
                Error: function (up, err) {
                    myAlert("上传文件太大,最大不能超过5M");
                },
                FileUploaded: function (up, file, info) {
                    var src = info.response
                    img_obj.attr({"src": src});
                    text_obj.val(src);
                    //img_delete.html(src);
                    //img_delete.html('<a  onclick=deleteImg('+src+')>删除</a>');
                    layer.msg("上传结束...");
                }
            }
        });
        uploader.init();
    }
    function pdf_uploader(btn_id, img_obj, text_obj) {
        document.getElementById(btn_id).style.cursor = "pointer";
        var uploader = new plupload.Uploader({
            runtimes: 'html5,flash,silverlight,html4',
            browse_button: btn_id, // you can pass in id...
            url: $('input[name="server"]').val() + '/?p=admin&c=File&a=file_upload',
            flash_swf_url: 'public/plupload-2.1.2/js/Moxie.swf',
            silverlight_xap_url: 'public/plupload-2.1.2/js/Moxie.xap',
            max_file_count: 1,
            filters: {
                max_file_size: '5000kb',
                mime_types: [
                    {title: "Images files", extensions: "pdf"}
                ]
            },
            init: {
                PostInit: function () {
                },
                FilesAdded: function (up, files) {
                    img_obj.unbind();
                    layer.msg("开始上传...");
                    uploader.start();
                    return false;
                },
                UploadProgress: function (up, file) {
                },
                Error: function (up, err) {
                    myAlert("上传文件太大,最大不能超过5M");
                },
                FileUploaded: function (up, file, info) {
                    var src = info.response;
                    text_obj.val(src);
                    layer.msg("上传结束...");
                }
            }
        });
        uploader.init();
    }
    create_uploader('img1', $('#img1'), $('input[name="img1_path"]'),$('#imgDelete1'));
    create_uploader('img2', $('#img2'), $('input[name="img2_path"]'),$('#imgDelete2'));
    create_uploader('img3', $('#img3'), $('input[name="img3_path"]'),$('#imgDelete3'));
    create_uploader('img4', $('#img4'), $('input[name="img4_path"]'),$('#imgDelete4'));
    create_uploader('img5', $('#img5'), $('input[name="img5_path"]'),$('#imgDelete5'));
    
    pdf_uploader('pdf',$('#pdf'), $('input[name="pdf_path"]'));
    
  
});

//图片缩略图删除
function deleteImg(id)
{
     layer.confirm('是否删除所选的图片', {
         btn: ['是', '否']
     }, function () {
        $.post("?p=admin&c=good&a=deleteImg",{"img_id":id},function(data){
            if(data == "ok"){
                layer.msg("删除成功",{icon: 6, time: 2000});
                window.location.reload();
            }else{
                layer.msg("删除失败",{icon: 5, time: 2000});
            }
        });
     }, function () {            
     });
}

