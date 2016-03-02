$(document).ready(function() {
// $(document).mnkModal("Lorem fezfezfezgtrehtrehtre");


function SelectText(element) {
    var doc = document;
    var text = doc.getElementById(element);    
    if (doc.body.createTextRange) { // ms
        var range = doc.body.createTextRange();
        range.moveToElementText(text);
        range.select();
    } else if (window.getSelection) {
        var selection = window.getSelection();
        var range = doc.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);

    }
}
function extract(variable) {
  for (var key in variable) {
    window[key] = variable[key];
  }
}


$("#toggle-menu").on("click",function (){
var t = $(this);
    $("body").toggleClass("navbar-hidden");
    $("body").toggleClass("sidebar-hidden");

    var sidebar = ($("body").hasClass("sidebar-hidden")?"sidebar-hidden":"")
    var navbar = ($("body").hasClass("navbar-hidden")?"navbar-hidden":"")

    var data = {
      body : sidebar+" "+navbar
    }
    var url = t.attr("href")
    $.post(url,data);
return false;
})

$(document).on('click','.mnk-tabulator a.mnk-tab-link',function (){
  var t = $(this);
  var p = t.parents(".mnk-tabulator");
  var tab = t.attr("href");
  if (!t.hasClass("mnk-tab-link-open")){

    p.find(".mnk-tab-link-open").removeClass('mnk-tab-link-open')
    t.addClass('mnk-tab-link-open');
    p.find(".mnk-tabs-list .mnk-tab").hide();
    p.find(tab.replace("#",".")).show().addClass('mnk-tab-open');
  }
  else {
    t.removeClass('mnk-tab-link-open');
    p.find(".mnk-tabs-list .mnk-tab").hide();
  }

  return false;

});
  //alternative key
  var altKey = {
    91: "onAltCmd",
    18: "onAltAlt",
    17: "onAltCtrl",
    16: "onAltMaj",
    9: "onAltTab",
    32: "onAltSpace"
  };
  $("body").append($("<div>", {
    "id": "dataAltKeyLister"
  }));
  $(document).on("keydown keyup", function(e) {

    var eval = e.keyCode in altKey;
    if (eval) {
      {

        var value = altKey[e.keyCode];
        if (e.type == "keydown") {
          if ($("#" + value).lenth < 1) {
            var altKeyDiv = $("<div>", {
              "class": "dataAltKey",
              "id": value
            }).html(value.replace("onAlt", ""));
            $("#dataAltKeyLister").append(altKeyDiv);
          }
          $("body").addClass(value);
        } else {
          $("body").removeClass(value);
          $("#" + value).remove();
        }
      }
    }
  })

  $(document).on('click',".mnk-debug .mnk-debug-header", function() {
    var t = $(this);
    t.parents(".mnk-debug").find("pre").slideToggle(150);

  })
  $(document).on('dblclick',".mnk-debug", function() {
    $(this).find(".mnk-debug-header").trigger("click")
  });

  /* Fonction Plein Ecran */
  function fullscreen(id) {
    var element = document.getElementById(id);
    if (element.mozRequestFullScreen)
      element.mozRequestFullScreen(element.ALLOW_KEYBOARD_INPUT);
    else if (element.webkitRequestFullScreen)
      element.webkitRequestFullScreen(element.ALLOW_KEYBOARD_INPUT);
  }



  $('.to-fullscreen').on("click", function() {
    var t = $(this);
    var rel = t.attr("rel");

    fullscreen(rel);
    return false;
  })
  // ajoute la class "focus_label" aux labels lier par l'attribut "for" des elements de formulaire lors du focus


  $(document).on("click", '.pagin_footer a.pagin', function() {
    var t = $(this);
    if (!t.hasClass("curPage")) {
      var contentContainer = t.parents(".pagin_container");
      t.parents(".pagin_footer").find("a.pagin.curPage").removeClass("curPage");
      var href = t.attr("href");
      t.addClass("curPage");

      $.post(href, function(html) {
        contentContainer.html(html);
        lazy();
      })
    }
    return false;
  })
  $(document).on("click", '.pagin_footer a.pagin-next', function() {
    var t = $(this);
    $("a.pagin.curPage").next().trigger("click");
    return false;
  })

  $(document).on("click", '.pagin_footer a.pagin-prev', function() {
    var t = $(this);
    $("a.pagin.curPage").prev().trigger("click");
    return false;
  })

  /* GESTION DES ELEMENTS DE FORMULAIRES */

  $(document).on({
    "focus": function() {

      var attr = $(this).attr("name");
      $("label[for='" + attr + "']").addClass("focus-label");
    },
    "blur": function() {
      var attr = $(this).attr("name");
      $("label[for='" + attr + "']").removeClass("focus-label");
    }
  }, "input, select, textarea")



  /* GESTION INPUT RANGE */
  $('input[type=range]').on("change mousemove", function() {
    var t = $(this);
    var forRange = $("input[for=" + t.attr('name') + "]");
    forRange.val(t.val());
  })

  $('input[type=text].range-value').on("keyup", function() {
    var t = $(this);
    var forRange = $("input[name=" + t.attr('for') + "]");
    forRange.val(t.val());
    forRange.trigger("change")
  })

  /* GESTION INPUT TEXT NUM */

  $(".bt-num-plus").on('mousedown mouseup', function(e) {
    var t = $(this);
    if (e.type == "mousedown") {
      t.everyTime(100, function() {
        forTxt(t, 1)
      });
    } else {
      forTxt(t, 1);
      t.stopTime();
    }
    return false;
  });

  $(".bt-num-moins").on('mousedown mouseup', function(e) {
    var t = $(this);
    if (e.type == "mousedown") {
      t.everyTime(100, function() {
        forTxt(t, -1)
      });
    } else {
      forTxt(t, -1);
      t.stopTime();
    }
    return false;
  });

  function forTxt(t, sens) {
    var p = t.parents(".input-bt-num");
    var input = p.find("input.num-edit");
    input.val(parseInt(input.val()) + sens);
    input.trigger("keyup");
  }


  $('input[type=text].num-edit, input[type=range]').mousewheel(function(e, delta) {
    var t = $(this);
    var vale = (delta < 0) ? 1 : -1
    t.val(parseInt(t.val()) + vale);
    t.trigger("keyup").trigger("mousemove")
  });

  $("a.toggle-switch").on("click", function() {
    var t = $(this);
    var href = t.attr("href");
    var dataSwitch = (t.hasClass("toggle-switch-on")) ? 0 : 1;

    $.post(href, {
      "switch": dataSwitch
    }, function() {
      t.toggleClass("toggle-switch-on");
    })


    return false;
  })


  var msg = $("<div>").addClass('stick').html("champs obligatoire");
  // validation de formulaire
  $("form").on('submit', function() {
    var t = $(this);
    var i = 0;



    t.find('input.required').each(function() {
      var input = $(this);



      if (input.val() == "") {
        i++;
        var posX = input.position().left;
        var posY = input.position().top;
        var width = input.width();
        var msg = $("<div>").addClass("stick red").css({
          "top": posY,
          "left": posX + width
        }).append("champs obligatoire");

        input.addClass('alert').after(msg);

      }


    });

    return (i > 0) ? false : true;
  })

  $('input.required.alert').on('focusout', function() {
    var t = $(this);
    if (t.val() != "") {
      t.removeClass('alert');
      t.next(".stick").remove();
    }
  })


  $(document).on('click',".form-toggle", function() {
    var t = $(this);
    var speed = 125;
    var check = t.find("input[type=checkbox]");
    var slide = t.find(".form-toggle-slide");
    // slide.toggleClass("toggle-off");
    if (slide.hasClass("form-toggle-off")) {
      slide.stop().animate({
        "margin-left": -50
      }, speed).removeClass('form-toggle-off');;
      check.removeAttr("checked");

    } else {

      slide.stop().animate({
        "margin-left": 0
      }, speed).addClass('form-toggle-off');;
      check.attr("checked", "checked");
    }
    // check.trigger("mouseup");
  }).on("mousedown",".form-toggle", function() {
    return false;
  });



})