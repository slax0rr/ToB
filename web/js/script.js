// Trial of Bloodright
// Standalone page for
//
// Coin Ritual
//
// Copyright 2017 CWG
// Clan Wolf Gamma
// http://www.clanwolf.net

galaxyImage_Alpha = new Image();
galaxyImage_Alpha.src = 'img/WolfAlpha.png';    /* Alpha */
galaxyImage_Beta = new Image();
galaxyImage_Beta.src = 'img/WolfBeta.png';      /* Beta  */
galaxyImage_Gamma = new Image();
galaxyImage_Gamma.src = 'img/WolfGamma.png';    /* Gamma */
galaxyImage_Empty = new Image();
galaxyImage_Empty.src = 'img/WolfEmpty.png';    /* Empty */

const changeImage = (imagename, newimagename) => {
  document.images[imagename].src = eval(newimagename + '.src')
}

const endsWith = (str, suffix) => {
  return str.indexOf(suffix, str.length-suffix.length) !== -1;
}

const fadeouttext_redirect = (url, timeout) => {
  $('#typedtext').fadeOut(timeout, function() {
    window.location = url;
  });
}

const initScroll = () => {
  $(function() {
    var container = $('.container');
    container.jScrollPane({
      hideFocus:      true,
      verticalGutter: 10
    });
    container.each(
      function() {
        $(this).jScrollPane({
          showArrows: $(this).is('.arrow')
        });
        var api = $(this).data('jsp');
        var throttleTimeout;
        $(window).bind(
          'resize',
          function() {
            // IE fires multiple resize events while you are dragging the browser window which
            // causes it to crash if you try to update the scrollpane on every one. So we need
            // to throttle it to fire a maximum of once every 300 milliseconds...
            if (!throttleTimeout) {
              throttleTimeout = setTimeout(
                function() {
                  api.reinitialise();
                  throttleTimeout = null;
                },
                300
              );
            }
          }
        );
      }
    )
  });
}

var tobAPI = {};

$(document).ready(function() {
  $('#flag').on('click', function() {
    var flag = $(this);
    $('#contentwindow').fadeOut(1000, function() {
      window.location = '/apps/ToB/language';
    });
  });

  // setup axios
  tobAPI = axios.create({
    baseURL: appData.apiurl,
    timeout: 1000
  });

  tobAPI.interceptors.response.use(function(resp) {
    return resp;
  }, function (err) {
    // TODO(slax0rr): pretty notifications
    alert(err.response.data.message)
    console.debug(err.response.data.message)
    return Promise.reject(err);
  })
});
