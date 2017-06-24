// position the callout underneath the fixed header
require('./libraries/jquery.qtip');

$.fn.qtip.zindex = 900;

$(function() {
  // toggle
  //
  $('a.callout').each(function() {
    let $this = $(this);

    let pos = {
        my: 'top right',
        at: 'bottom right'
    }

    if($this.is('.callout--panel-mobile')) {
      pos = {
        my: 'top left',
        at: 'bottom left'
      }
    }

    $(this).qtip({
      show: 'click',
      hide: 'unfocus click',
      content: {
        text: function(event, api) {
          return $($(this).data('callout-content')).html();
        }
      },
      position: pos
    })
  })

  function resizeHandler(){
    $('a.callout').qtip('hide');
  }

  $(window).on('resize scroll', window.throttle(resizeHandler, 500));

})
