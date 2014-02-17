(function() {

  var halo_shadow = {
    is_on: false,

    init: function(){
      jQuery(window).scroll(halo_shadow.check).resize(halo_shadow.check);
    },

    check: function(){
      var halo = jQuery('#halo-shadow').first();

      if (document.documentElement.scrollTop > 19 || self.pageYOffset > 19) {
        if (this.is_on !== true){
          this.is_on = true;

          if (halo) {
            halo.show();
          }
        }
      } else if (document.documentElement.scrollTop <= 19 || self.pageYOffset <= 19) {
        this.is_on = false;

        if (halo) {
          halo.hide();
        }
      }
    }
  };

  var register_interest = {
    API_PATH: 'https://dev.12wbt.com/_api/v1/prospective-members',

    init: function() {
      this.subscribe_form = jQuery('#cm-subscribe-form');

      if (this.subscribe_form.length > 0) {
        this.watch();
      }
    },

    watch: function() {
      var self = this;

      this.subscribe_form.submit(function(event) {
        event.preventDefault();

        self.clearErrors();

        if (self.validate() === false) {
          return;
        }

        jQuery.ajax(self.API_PATH, {
          data: jQuery(this).serialize(),
          type: 'POST',
          dataType: 'json'
        }).
          done(function(response) {
            self.success(response);
          }).
          fail(function(response) {
            self.error(response);
          });
      });
    },

    validate: function() {
      var valid = true;

      this.subscribe_form.find('input[type="text"]').each(function() {
        var $element = jQuery(this);

        if ($element.val() === '') {
          $element.after('<p class="form-error">This is a required field</p>');
          valid = false;
        }
      });

      return valid;
    },

    clearErrors: function() {
      this.subscribe_form.find('.form-error').remove();
    },

    success: function(response) {
      this.subscribe_form.siblings('.messages').hide();
      this.subscribe_form.siblings('.success').show();
    },

    error: function(response) {
      this.subscribe_form.siblings('.messages').hide();
      this.subscribe_form.siblings('.error').show();
    }
  };

  jQuery(function() {
    halo_shadow.init();
    register_interest.init();
  });

})();
