$(function () {

    var a = function () {

        var b = $("#divOrderLoading");

        var h = $("#btnLoadMore");

        var f = 0;

        var i = 10;

        var c = {

            FIdx: 0,

            EIdx: i,

            isCount: 1

        };

        var g = null;

        var e = false;

        var d = function () {

            var j = function () {

                return "/" + c.FIdx + "/" + c.EIdx + "/" + c.isCount

            };

            var k = function () {

                h.hide();

                b.show();

                // GetJPData("http://m.1yyg.com", "getUserOrderList", j(),

                console.log("getUserOrderList" + j());

                GetJPData(Gobal.Webpath, "shopajax", "getUserOrderList" + j(),

                    function (p) {

                        console.log(p);
                        if (p.code == 0) {

                            if (c.isCount == 1) {

                                c.isCount = 0;

                                f = p.count

                            }

                            var o = p.listItems;

                            var n = o.length;

                            var m = "";


                            for (var l = 0; l < n; l++) {

                                m += '<li onclick="location.href="' + Gobal.Webpath + '/mobile/user/buyDetail/' + o[l].id + '">' +
                                    '<div style="display: block; clear: both;height: 120px">' +
                                    '<div class="u-gds-l">' +
                                    '<a class="fl z-Limg" href="' + Gobal.Webpath + '/mobile/user/buyDetail/' + o[l].id + '">' +
                                    '<img src="' + Gobal.LoadPic + '" src2="' + Gobal.imgpath + '/uploads/' + o[l].thumb + '" border=0 alt=""/></a>' +
                                    '</div>' +
                                    '<div class="u-gds-r">' +
                                    '<p class="z-gds-tt">' +
                                    '<a href="' + Gobal.Webpath + '/mobile/mobile/item/' + o[l].shopid + '" class="gray6">' +
                                    o[l].title + '</a></p>' +
                                    '<p>期号: ' + o[l].qishu + '</p>' +
                                    '<p>总需人次: ' + o[l].zongrenshu + '</p>' +
                                    '<p>本期参与: ' + o[l].zongrenshu + '</p>' +
                                    "<p>揭晓时间: " + FormatTimeToYYYYMMDDHHMMSS(o[l].q_end_time) + "</p>";

                                // var q = parseInt(o[l].orderState);

                                var record = o[l].record;

                                m += '</div>';
                                m += '</div>';
                                m += '<div class="optionDiv">';

                                if (record.status == 1) {
                                    m += '<a>确认收货地址</a>'
                                }


                                m += '</div><div style="display: block; height: 10px;background-color: #F1F1F1;border-top: 1px solid #DDD;border-top: 1px solid #DDD"></div></li>'

                            }

                            if (c.FIdx > 0) {

                                b.prev().removeClass("bornone")

                            }

                            b.before(m).prev().addClass("bornone");

                            if (c.EIdx < f) {

                                e = false;

                                h.show()

                            }

                            loadImgFun()

                        } else {

                            if (p.code == 10) {

                                location.reload()

                            } else {

                                if (c.FIdx == 0) {

                                    b.before(Gobal.NoneHtml)

                                }

                            }

                        }

                        b.hide()

                    })

            };

            this.getInitPage = function () {

                k()

            };

            this.getNextPage = function () {

                c.FIdx += i;

                c.EIdx += i;

                k()

            }

        };

        h.click(function () {

            if (!e) {

                e = true;

                g.getNextPage()

            }

        }).show();

        g = new d();

        g.getInitPage()

    };

    Base.getScript(Gobal.Skin + "/js/mobile/Comm.js", a)

});