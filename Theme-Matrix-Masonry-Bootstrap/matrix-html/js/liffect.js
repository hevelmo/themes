// special thx @fkadev
(function($) {
	$.fn.shuffleElements = function () 
{
    var o = $(this);
    for (var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}};


$(document).ready(function () {

    liffect();

    $("#generate").on("click", function () {
        codeRefresh();
        $("#code").slideDown();
    });

    $("input#liffect_random").on("change", function () {	
        if ($(this).is(":checked")) {
            $("#code").slideUp();
            liffect()
        }
        else {
            $("#code").slideUp();
            liffect()
        }
    });

    $("#config #pfxAll").on("change", function () {
        if (!$(this).is(":checked")) {
            $("#config input[type='radio']").prop("disabled", false);
        }
        else {
            $("#config input[type='radio']").prop("disabled", true);
        }
    });

    $("select#liffect_name").on("change", function () {
        $("#code").slideUp();
        liffect()
    });

    $("input#liffect_duration").on({
        mouseup:function () {
            liffect()
        },
        change:function () {
            var duration = $(this).val()
            $(".liffect_duration span").text(duration);
        }
    });


    $("input#liffect_delay").on({
        mouseup:function () {
            liffect()
        },
        change:function () {
            var delay = $(this).val()
            $(".liffect_delay span").text(delay);
        }
    });

    function liffect() {

        var name = $("select#liffect_name option:selected").val(),
            duration = parseInt($("input#liffect_duration").val()),
            delay = parseInt($("input#liffect_delay").val()),
            newDelay = 0,
            random = $("input#liffect_random");


        if (random.is(":checked")) {
            $('#content .item').shuffle().each(function (i) {
                newDelay = i * delay;
                $(this).attr("style", "-webkit-animation-delay:" + newDelay + "ms; "
                    + "-moz-animation-delay:" + newDelay + "ms; "
                    + "-o-animation-delay:" + newDelay + "ms; "
                    + "animation-delay:" + newDelay + "ms; "
                    + "-webkit-animation-duration:" + duration + "ms;"
                    + "-moz-animation-duration:" + duration + "ms;"
                    + "-o-animation-duration:" + duration + "ms;"
                    + "animation-duration:" + duration + "ms;");
            });
        }
        else {
            $("#content .item").each(function (i) {
                newDelay = i * delay;
                $(this).attr("style", "-webkit-animation-delay:" + newDelay + "ms; "
                    + "-moz-animation-delay:" + newDelay + "ms; "
                    + "-o-animation-delay:" + newDelay + "ms; "
                    + "animation-delay:" + newDelay + "ms; "
                    + "-webkit-animation-duration:" + duration + "ms;"
                    + "-moz-animation-duration:" + duration + "ms;"
                    + "-o-animation-duration:" + duration + "ms;"
                    + "animation-duration:" + duration + "ms;");
            });
        }

        $("ul[data-liffect]").html($("#template").html()).attr("data-liffect", name);
    }

    function codeRefresh() {

        var name = $("select#liffect_name option:selected").val(),
            duration = $("input#liffect_duration").val(),
            delay = $("input#liffect_delay").val(),
            pfx = $("#config input[name='pfx']:checked").val(),
            url = "liffect/",
            random = $("input#liffect_random");

        if (random.is(":checked")) {
            random = "r";
        }
        else {
            random = "";
        }

        // HTML
        $("#html pre code").html("").load(url + "li.html", function () {
            $(this).html($(this).html().replace('[name]', name));
            Prism.highlightAll();
        });

        // CSS
        $("#css pre code").html("").load(url + name + pfx + ".css", function () {
            $(this).html($(this).html().replace(/\[duration]/g, duration + "ms"));
            Prism.highlightAll();
        });

        // JS
        $("#js pre code").html("").load(url + "js" + random + pfx + ".html", function () {
            $(this).html($(this).html().replace(/\[delay]/g, delay));
            Prism.highlightAll();
        });

    }
});
