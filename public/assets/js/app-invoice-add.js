/**
 * App Invoice - Add
 */

'use strict';

(function () {
  const invoiceItemPriceList = document.querySelectorAll('.invoice-item-price'),
    invoiceItemQtyList = document.querySelectorAll('.invoice-item-qty'),
    invoiceDateList = document.querySelectorAll('.date-picker');
  // Datepicker

  $('.selectpicker').selectpicker();
  if (invoiceDateList) {
    invoiceDateList.forEach(function (invoiceDateEl) {
      invoiceDateEl.flatpickr({
        monthSelectorType: 'static'
      });
    });
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // send invoices

  var addNewUserForm = document.getElementById('invoice_add');

  // adding or updating user when form successfully validate
  $('.invoice_btn_submit').on('click', function () {
    console.log($('.invoices-form').serialize());

    $.ajax({
      data: $('.invoices-form').serialize(),
      url: ''.concat(baseUrl, 'add-invoices'),
      type: 'POST',
      success: function success(status) {
        // sweetalert
        Swal.fire({
          icon: 'success',
          title: status.message + ' بنجاح !',
          text: status.message + ' الفاتورة بنجاح ',
          customClass: {
            confirmButton: 'btn btn-success'
          },
          willClose: function (willConfirm) {
            if (willConfirm) {
              // Redirect to a specific URL
              setTimeout(function () {
                window.location.href = ''.concat(baseUrl, 'app/invoice/list');
              }, 200);
            }
          }
        });
      },
      error: function error(err) {
        Swal.fire({
          title: err.message,
          text: 'هنالك خطا في الفاتورة',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });
})();
