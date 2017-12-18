require.config({
    shim: {
        "image_upload":['jquery'],
        "good_add":['image_upload']
    },
    paths: {
        "jquery":"../../js/jquery-2.0.0",
        "image_upload": "image_upload",
        "good_add": "good_add"
    }
});
require(['jquery', 'image_upload','good_add'],function(jquery,image_upload,good_add){
});

