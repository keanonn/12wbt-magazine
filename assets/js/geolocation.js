
jQuery( document ).ready(function( $ ) {

    var redirect = (function () {

    var sites = ['us'];

    var redirectBrowser = function (code) {
      var regExp = new RegExp('\/(' + sites.join('|') + ')(\/|$)', 'i');

      var path = location.pathname.replace(regExp, '/');
      path = !!code ? '/' + code + path : path;

      if(path != location.pathname){
        if(code == 'us'){
           location.replace('/us/blog');
        }
        else{
           location.replace('/blog');
        }
      }
    };

    var onSuccess = function (geoipResponse) {
      if (!geoipResponse.country.iso_code) {
        redirectBrowser('');
        return;
      }

      var code = geoipResponse.country.iso_code.toLowerCase();
      verifyCountryCode(code);
    };

    var onError = function (error) {
    };

    var verifyCountryCode = function (code) {
      if (sites.indexOf(code) != -1) {
        redirectBrowser(code);
      }
      else {
        redirectBrowser('');
      }

      $.cookie('preferred_location', code, { expires: 30, path: '/' });
    };

    return function (preferred_location) {
      if (preferred_location) {
        verifyCountryCode(preferred_location);
      }
      else {
          //To bypass the w3c geolocation attempt:
       geoip2.country(onSuccess, onError, { w3cGeolocationDisabled: true });
      }
    };
  }());

  redirect($.cookie('preferred_location'));

  $(document).ready(function () {

    function onPreferredLocationClick(event) {
      event.preventDefault();
      $.cookie('preferred_location', event.data.location, { expires: 30, path: '/' });
      redirect(event.data.location);
    }

    $('#view_us_site_btn').on('click', {location: 'us'}, onPreferredLocationClick);
    $('#view_au_site_btn').on('click', {location: 'au'}, onPreferredLocationClick);
  });

});
