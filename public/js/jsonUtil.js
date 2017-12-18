function jsonUtil() {
    var form_to_object = function(form_id) {
        var str = $('#' + form_id).serialize();
        var jsonObj = {};
        str = str.replace(/\+/g," ");   // g表示对整个字符串中符合条件的都进行替换  
        var decode_str = decodeURIComponent(str);
        var param = decode_str.split('&');
        for (var i = 0; param != null && i < param.length; i++) {
            var p = param[i].split('=');
            jsonObj[p[0]] = p[1];
        }
        return jsonObj;
    }

    return {
        form_to_object: form_to_object
    }
}
