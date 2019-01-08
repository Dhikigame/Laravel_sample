(function() {
    'use strict';
    var cmds = document.getElementsByClassName('del');
    var i;
    // console.log(cmds.length);
    for (i = 0; i < cmds.length; i++) {
        cmds[i].addEventListener('click', function(e) {
        // console.log(i);
        // e.preventDefault();
        if (confirm('are you sure?')) {
          document.getElementById('form_' + this.dataset.id).submit();
        }
      });
    }
})();