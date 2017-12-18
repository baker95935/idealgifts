$(function () {
    $('#save_category').click(function () {
        var category_name = $('input[name="category_name"]').val();
        var category_pid = $('select[name="category_pid"]').val();
        var is_show = $('input[name="is_show"]:checked').val();
        var sort_order = $('input[name="sort_order"]').val();
        var cover_path = $('input[name="cover_path"]').val();
        var category_id = $('input[name="category_id"]').val();
        var is_tuijian = $('input[name="is_tuijian"]:checked').val();

        if (!$.trim(category_name)) {
            layer.msg('请输入分类名称', {icon: 5, time: 2000});
            return;
        }

        if (!$.trim(sort_order)) {
            layer.msg('请输入排序', {icon: 5, time: 2000});
            return;
        }



        $.post($('input[name="server"]').val() + '/?p=admin&c=Category&a=save', {"category_id": category_id, "category_name": category_name, "category_pid": category_pid, "is_show": is_show, "sort_order": sort_order, "cover_path": cover_path,"is_tuijian":is_tuijian}, function (data) {
            if (data == 'ok') {
                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
                    window.location.href = $('input[name="server"]').val() + '?p=admin&c=Category&a=index';
                });
            } else {
                layer.msg('操作失败', {icon: 5, time: 2000});
            }
        });
    });


    $('#update_good').click(function () {
        var t = new jsonUtil();
        var good = t.form_to_object('update_good_form');

        if (good.category_id == -1) {
            layer.msg('请选择商品分类', {icon: 5, time: 2000});
            return;
        }
        if (good.good_name == '') {
            layer.msg('请填写商品名称', {icon: 5, time: 2000});
            return;
        }
        if (good.good_code == '') {
            layer.msg('请填写商品编号', {icon: 5, time: 2000});
            return;
        }
        if (good.good_order == '') {
            layer.msg('请填写商品排序', {icon: 5, time: 2000});
            return;
        }


        $.post($('input[name="server"]').val() + '/?p=admin&c=Good&a=insert_or_update', good, function (data) {
            if (data == 'ok') {
                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
                    window.location.href = $('input[name="server"]').val() + '/?p=admin&c=Good&a=index';
                });
            }
        });
    });




    $('#save_good').click(function () {
        var t = new jsonUtil();
        var good = t.form_to_object('add_good_form');
         if (good.category_id == -1) {
            layer.msg('请选择商品分类', {icon: 5, time: 2000});
            return;
        }
        if (good.good_name == '') {
            layer.msg('请填写商品名称', {icon: 5, time: 2000});
            return;
        }
        if (good.good_code == '') {
            layer.msg('请填写商品编号', {icon: 5, time: 2000});
            return;
        }
        if (good.good_order == '') {
            layer.msg('请填写商品排序', {icon: 5, time: 2000});
            return;
        }

//
//        var category_id = $('select[name="category_id"]').val();
//        var good_name = $('input[name="good_name"]').val();
//        var good_code = $('input[name="good_code"]').val();
//        var is_hot = 0;
//        var is_new = 0;
//        var is_best = 0;
//        $('input[name="promote"]:checked').each(function () {
//            if ('hot' == $(this).val()) {
//                is_hot = 1;
//            } else if ('new' == $(this).val()) {
//                is_new = 1;
//            } else if ('best' == $(this).val()) {
//                is_best = 1;
//            }
//
//        });
//
//        var is_show = $('input[name="is_show"]:checked').val();
//        var good_order = $('input[name="good_order"]').val();
//        var img1_path = $('input[name="img1_path"]').val();
//        var img2_path = $('input[name="img2_path"]').val();
//        var img3_path = $('input[name="img3_path"]').val();
//        var img4_path = $('input[name="img4_path"]').val();
//        var img5_path = $('input[name="img5_path"]').val();
//
//        var good_desc = $('textarea[name="good_desc"]').val();
//        var pdf_path = $('input[name="pdf_text"]').val();



//        $.post($('input[name="server"]').val() + '/?p=admin&c=Good&a=insert', {"category_id": category_id, "good_name": good_name, "is_show": is_show, "good_code": good_code,
//            "good_order": good_order, "img1_path": img1_path, "img2_path": img2_path, "img3_path": img3_path, "img4_path": img4_path, "img5_path": img5_path,
//            "good_desc": good_desc, "is_hot": is_hot, "is_new": is_new, "is_best": is_best, "pdf_path": pdf_path}, function (data) {
//            if (data == 'ok') {
//                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
//                    window.location.href = $('input[name="server"]').val() + '/?p=admin&c=Good&a=index';
//                });
//            }
//        });
        $.post($('input[name="server"]').val() + '/?p=admin&c=Good&a=insert_or_update', good, function (data) {
            if (data == 'ok') {
                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
                    window.location.href = $('input[name="server"]').val() + '/?p=admin&c=Good&a=index';
                });
            }
        });
    });

    $('#save_shop_info').click(function () {

        var id = $('input[name="id"]').val();
        var shop_name = $('input[name="shop_name"]').val();
        var title = $('input[name="title"]').val();
        var sub_title = $('#sub_title').val();
        var is_show = $('input:radio[name="is_show"]:checked').val();
        var introdution = window.ue.getContent();

        $.post('?p=admin&c=Shop&a=save_shop_info', {"id": id, "shop_name": shop_name,
            "title": title, "sub_title": sub_title, "is_show": is_show, "introdution": introdution}, function (data) {
            if (data == 'ok') {
                layer.msg('操作成功,正在跳转...', {icon: 6, time: 2000}, function () {
                    window.location.href = $('input[name="server"]').val() + '/?p=admin&c=Shop&a=index';
                });
            }
            else {
                layer.msg(data, {icon: 5, time: 2000});
            }

        });
    });

    $('#save_ad_img').click(function () {

        var id = $('input[name="id"]').val();
        var img_path = $('#img_path').attr('src');
        var img_order = $('input[name="img_order"]').val();
        var href = $('#href').val();
        var is_show = $('input:radio[name="is_show"]:checked').val();
        
        if ($.trim(img_order) == '') {
            layer.msg('请填写图片排序', {icon: 5, time: 2000});
            return;
        }

        $.post('?p=admin&c=Advertisement&a=ad_img_update', {"id": id, "img_path": img_path,
            "img_order": img_order, "href": href, "is_show": is_show}, function (data) {
            if (data == 'ok') {
                layer.msg('操作成功,正在跳转...', {icon: 6, time: 2000}, function () {
                    window.location.href = $('input[name="server"]').val() + '/?p=admin&c=Advertisement&a=index';
                });
            }
            else {
                layer.msg(data, {icon: 5, time: 2000});
            }

        });
    });
    $('#save_promotion').click(function () {
        var t = new jsonUtil();
        var promotion = t.form_to_object('add_promotion_form');

        if (promotion.category_id == '') {
            layer.msg('请选择种类', {icon: 5, time: 2000});
            return;
        }
        if (promotion.is_show == '') {
            layer.msg('请填写排序', {icon: 5, time: 2000});
            return;
        }
        if (promotion.start_time == '') {
            layer.msg('请填写开始日期', {icon: 5, time: 2000});
            return;
        }
        if (promotion.end_time == '') {
            layer.msg('请填写结束日期', {icon: 5, time: 2000});
            return;
        }


        $.post($('input[name="server"]').val() + '/?p=admin&c=promotion&a=insert_or_update', promotion, function (data) {
            if (data == 'ok') {
                layer.msg('操作成功，正在跳转...', {icon: 6, time: 2000}, function () {
                    window.location.href = $('input[name="server"]').val() + '/?p=admin&c=promotion&a=index';
                });
            }
        });
    });

});


