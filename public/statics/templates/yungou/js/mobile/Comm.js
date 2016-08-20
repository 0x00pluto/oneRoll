function CastMoney(a) {
    a = Math.round(a * 1000) / 1000;
    a = Math.round(a * 100) / 100;
    if (/^\d+$/.test(a)) {
        return a + ".00"
    }
    if (/^\d+\.\d$/.test(a)) {
        return a + "0"
    }
    return a
}
String.prototype.rExp = function (b, a) {
    var c = new RegExp(b, "g");
    return this.replace(c, a)
};
String.prototype.toHTML = function (a) {
    var b = String(this);
    if (a) {
        b = b.substring(0, a)
    }
    b = b.rExp(">", "&gt;");
    b = b.rExp("<", "&lt;");
    b = b.rExp(" ", "&nbsp;");
    b = b.rExp("'", "'");
    b = b.rExp('"', '"');
    b = b.rExp("\r\n", "<br/>");
    b = b.rExp("\n", "<br/>");
    b = b.rExp("\r", "<br/>");
    return b
};
$.cookie = function (b, j, m) {
    if (typeof j != "undefined") {
        m = m || {};
        if (j === null) {
            j = "";
            m.expires = -1
        }
        var e = "";
        if (m.expires && (typeof m.expires == "number" || m.expires.toUTCString)) {
            var f;
            if (typeof m.expires == "number") {
                f = new Date();
                f.setTime(f.getTime() + (m.expires * 24 * 60 * 60 * 1000))
            } else {
                f = m.expires
            }
            e = "; expires=" + f.toUTCString()
        }
        var l = m.path ? "; path=" + (m.path) : "";
        var g = m.domain ? "; domain=" + (m.domain) : "";
        var a = m.secure ? "; secure" : "";
        document.cookie = [b, "=", encodeURIComponent(j), e, l, g, a].join("")
    } else {
        var d = null;
        if (document.cookie && document.cookie != "") {
            var k = document.cookie.split(";");
            for (var h = 0; h < k.length; h++) {
                var c = jQuery.trim(k[h]);
                if (c.substring(0, b.length + 1) == (b + "=")) {
                    d = decodeURIComponent(c.substring(b.length + 1));
                    break
                }
            }
        }
        return d
    }
};
function zeroPad(nr, base) {
    var len = (String(base).length - String(nr).length) + 1;
    return len > 0 ? new Array(len).join('0') + nr : nr;
}
/**
 * 格式化字符串
 * @param timeMilliSecond
 * @returns {string}
 * @constructor
 */
function FormatTimeToYYYYMMDDHHMMSSMMM(timeMilliSecond) {
    var date = new Date(timeMilliSecond);
    var formatString = date.getFullYear() + "-" + zeroPad((date.getMonth() + 1), 10) + "-" + zeroPad(date.getDay(), 10) + " "
        + zeroPad(date.getHours(), 10) + ":" + zeroPad(date.getMinutes(), 10) + ":" + zeroPad(date.getSeconds(), 10)
        + "." + zeroPad(date.getMilliseconds(), 100);
    return formatString;
}

function FormatTimeToYYYYMMDDHHMMSS(Second) {

    var date = new Date(Second * 1000);
    var formatString = date.getFullYear() + "-" + zeroPad((date.getMonth() + 1), 10) + "-" + zeroPad(date.getDay(), 10) + " "
        + zeroPad(date.getHours(), 10) + ":" + zeroPad(date.getMinutes(), 10) + ":" + zeroPad(date.getSeconds(), 10);
    return formatString;
}