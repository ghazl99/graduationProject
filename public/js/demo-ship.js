(function webpackUniversalModuleDefinition(root, factory) {
  if (typeof exports === 'object' && typeof module === 'object') module.exports = factory();
  else if (typeof define === 'function' && define.amd) define([], factory);
  else {
    var a = factory();
    for (var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
  }
})(self, function () {
  return /******/ (function () {
    // webpackBootstrap
    /******/ 'use strict';
    var __webpack_exports__ = {};
    /*!*************************************************!*\
  !*** ./resources/js/laravel-user-management.js ***!
  \*************************************************/
    /**
     * Page User List
     */
    $(function () {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var wizardValidationFormStep3 = document.getElementById('demoShip');
      // changing the title
      $('#submit-btn').on('click', function (event) {
        event.preventDefault(); // منع إعادة تحميل الصفحة

        var total = 0;
        $('.shipment-line').each(function () {
          var quantity = $(this).find('.quantity').val();
          var price = $(this).find('.price_for_wight').val();
          var lineTotal = quantity * price;
          total += lineTotal;
        });
        console.log(total);
        // Display total
        $('#demoCalc').removeClass('d-none');
        $('#total-cost').text(total);
      });


      var catt = document.getElementById('category_shipment');

      $('#category_shipment').change(function () {
        var categoryID = $(this).val();

        $.ajax({
          url: ''.concat('http://127.0.0.1:8000/', 'get-category-details/') + categoryID,
          type: 'GET',
          success: function (data) {
            $('#category-detail').empty();
            $.each(data, function (index, detail) {
              $('#category-detail').append('<option value="' + detail.id + '">' + detail.type + '</option>');
            });
          }
        });
      });

      function attachChangeHandler() {
        $('.shipment-line').on('change', '#category-detail', function () {
          var categoryName = $(this).find(':selected').text();
          var row = $(this).closest('.shipment-line');
          $.ajax({
            type: 'POST',
            url: ''.concat('http://127.0.0.1:8000/', 'form/wizard-icons/price'),
            data: {
              categoryName: categoryName
            },
            success: function (response) {
              row.find('.price_for_wight').val(response.price);
              row.find('.total_wight').val(response.weight);
            }
          });
        });

      }

  attachChangeHandler();
});
/******/ return __webpack_exports__;
/******/
})();


});
