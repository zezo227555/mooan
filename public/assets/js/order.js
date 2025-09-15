(function () {
    "use strict";

    let checkAll = document.querySelector('.check-all');
    checkAll.addEventListener('click', checkAllFn)
  
    function checkAllFn() {
      if (checkAll.checked) {
        document.querySelectorAll('.product-checkbox input').forEach(function (e) {
          e.closest('tr').classList.add('selected');
          e.checked = true;
        });
      }
      else {
        document.querySelectorAll('.product-checkbox input').forEach(function (e) {
          e.closest('tr').classList.remove('selected');
          e.checked = false;
        });
      }
    };

  })();
  