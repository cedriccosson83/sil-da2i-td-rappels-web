/**
 * Created by c15009594 on 04/12/17.
 */

$(document).ready(function() {

    $("#load_faq").click(function () {
        $("aside").load("http://cedriccosson83500.alwaysdata.net/index.php?page=FAQ #faq", function () {
            $("dd").css("display", "none");
            $("dt").attr("value", "0");
            $("dt").append(" (0)");
        });
    });

    $("#hideAside").click(function () {
        $("aside").delay(2000).hide(200);
    });

    $("#fadeImg").click(function () {
        $('img').delay(2000).fadeOut(500);
    });

    $("#toggleMenu").click(function () {
        $("nav").slideToggle(500);

    });

    $("dd").css("display", "none");
    $("dt").attr("value", "0");
    $("dt").append(" (0)");


    $("body").on( "mouseenter", "#faq dt", function () {

        if (!($(this).hasClass("persistent")))
            $(this).next().slideDown(250);

    });

    $("body").on( "mouseleave", "#faq dt", function () {

        if (!($(this).hasClass("persistent")))
            $(this).next().slideUp(250);

    });

    $("body").on( "click", "#faq dt", function () {

        if (!($(this).hasClass("persistent"))) {
            var text_content = $(this).text(); // get tag text content

            var old_value =  $(this).attr("value"); // get nb of click
            var new_value = ++old_value; // increment this value
            $(this).attr("value", new_value); // set new value of nb of click

            var pos = text_content.indexOf("("); // get index of '(' which is the begin of the string to add that contains
            // the nb of click

            var substring = text_content.substr(0,pos); // truncate text content to keep only the initial text (without nb of
            // click)

            $(this).html(substring + "(" + new_value + ")"); // set new value of tag text content
        }

        $(this).toggleClass("persistent"); // toggle class to add or remove the persistent mark

        if (($(this).hasClass("persistent"))) {
            sort_and_move_questions();
        }

    });


    /* ---------- fonctions ---------- */


    function sort_and_move_questions () {
        var questions = document.getElementsByClassName("main_question"); // get questions
        var answers = document.getElementsByClassName("main_answer"); // get answers

        var block_question_answer = new Array();

        for (var j = 0; j < questions.length; ++j) {
            var block = [questions[j].outerHTML + " " + answers[j].outerHTML, questions[j].attributes[1].value]; // get
            // outerHTML of the questions and answers and value of attribute value
            block_question_answer[j] = block; // store this into an array
        }

        for (var i = 0; i < block_question_answer.length; ++i) { // to sort the table, I compare the value attribute of
            // an element with an other and swap their position if needed

            for (var j = i + 1; j < block_question_answer.length; ++j) {
                if (block_question_answer[i][1] < block_question_answer[j][1]) {
                    var temp_max_value = block_question_answer[i]; // store value 1
                    block_question_answer[i] = block_question_answer[j]; // replace current value
                    block_question_answer[j] = temp_max_value; // use value stored
                }
            }
        }

        $("#faq").empty(); // empty faq to set the questions sorted
        $("#faq").append("<h1>F.A.Q.</h1>");
        for (var i = 0; i < block_question_answer.length; ++i )
            $("#faq").append(block_question_answer[i][0]); // add questions 1 by 1

        var questions = $(".main_question"); // get questions
        var answers = $(".main_answer"); // get answers

        questions.each(function () {
            $(this).css("display", "none");
            $(this).next().css("display", "none");
        });

        questions.each(function () {
            $(this).fadeIn(200);
            if (($(this).hasClass("persistent")))
                $(this).next().fadeIn(400);
        });

    }
});