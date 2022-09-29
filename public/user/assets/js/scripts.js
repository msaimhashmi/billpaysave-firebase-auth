$(function() {
    var dd1 = new dropDown($('.myDropdown'));
    
    $(document).click(function() {
      $('.wrapper-dropdown').removeClass('active');
    });
  });
  
  function dropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.dropdown > li');
    this.val = '';
    this.index = -1;
    this.initEvents();
  }
  dropDown.prototype = {
    initEvents: function() {
      var obj = this;
      
      obj.dd.on('click', function() {
        $(this).toggleClass('active');
        return false;
      });
      
      obj.opts.on('click', function() {
        var opt = $(this);
        obj.val = opt.text();
        obj.index = opt.index();
        obj.placeholder.text(obj.val);
      });
    }
  }