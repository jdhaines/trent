/*
*       Javascript for Trent's online resume.  Pretty simple, mostly jquery.
*/

/**
 * Start info hider.  Then plug in info to display in specified class selector (its a span).  Hat tip to Dustin Spicuzza
 * as he was the first I saw do this.
 */
function emailFix() { // try to avoid spam trollers, intentionally complex
var a = "Tre";
var b = "nton.Loga";
var c = "n@gmai";
var d = "l.com";
var e = "";
var f = "";
var g = "";
var h = "";
var i = "";
var j = "";
var k = "";
var l = "";
var m = "";
var n = "";
var o = "";
var p = "";
var q = "";
var r = "";
var s = "";
var t = "";

var e_string = "<a href=\"ma" + "ilto:" + a + b + c + d + "\">" + a + b + c + d + "</a>";
var p_string = e + f + g + h + h + h + i;
var a_string = j + k + l + m + n + o + p + q + r + s + t;

        $(document).ready(function(){
                $(".emailValue").append(e_string);
                $(".phoneValue").append(p_string);
                $(".addressValue").append(a_string);
        });
}
emailFix();

/**
 * Calls to make certain class selectors slide down or up based on button clicked.
 */
$(document).ready(function(){
        $(".engButton").click(function(){ //What to do if the eng button is clicked?  Show eng, hide rest.
                if($(".eng").is(':hidden')){
                        $(".eng").slideDown('slow');
                }
                if($(".spt").is(':hidden')){
                        //$(".spt").slideDown('slow');
                } else{
                        $(".spt").slideUp('slow');
                }
                if($(".pc").is(':hidden')){
                        //$(".pc").slideDown('slow');
                } else{
                        $(".pc").slideUp('slow');
                }
                if($(".tac").is(':hidden')){
                        //$(".tac").slideDown('slow');
                } else{
                        $(".tac").slideUp('slow');
                }
                if($(".notTac").is(':hidden')){
                        $(".notTac").slideDown('slow');
                } else{
                        //$(".notTac").slideUp('slow');
                }
        });
        $(".sptButton").click(function(){
                if($(".spt").is(':hidden')){
                        $(".spt").slideDown('slow');
                }
                if($(".eng").is(':hidden')){
                        //$(".spt").slideDown('slow');
                } else{
                        $(".eng").slideUp('slow');
                }
                if($(".pc").is(':hidden')){
                        //$(".pc").slideDown('slow');
                } else{
                        $(".pc").slideUp('slow');
                }
                if($(".tac").is(':hidden')){
                        //$(".tac").slideDown('slow');
                } else{
                        $(".tac").slideUp('slow');
                }
                if($(".notTac").is(':hidden')){
                        $(".notTac").slideDown('slow');
                } else{
                        //$(".notTac").slideUp('slow');
                }
        });
        $(".fullButton").click(function(){
                if($(".tac").is(':hidden')){
                        //$(".tac").slideUp('slow');
                } else{
                        $(".tac").slideUp('slow');
                }
                if($(".eng").is(':hidden')){
                        $(".eng").slideDown('slow');
                } else{
                        //$(".eng").slideDown('slow');
                }
                if($(".spt").is(':hidden')){
                        $(".spt").slideDown('slow');
                } else{
                        //$(".spt").slideDown('slow');
                }
                if($(".pc").is(':hidden')){
                        $(".pc").slideDown('slow');
                } else{
                        //$(".pc").slideDown('slow');
                }
                if($(".notTac").is(':hidden')){
                        $(".notTac").slideDown('slow');
                } else{
                        //$(".pc").slideDown('slow');
                }
        });
});