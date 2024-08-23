/**
 * app-ecommerce-product-list
 */

'use strict';

// Datatable (jquery)
$(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  // Variable declaration for table
  var dt_product_table = $('.datatables-products');

  // E-commerce Products datatable

  if (dt_product_table.length) {
    var dt_products = dt_product_table.DataTable({
      processing: true,
      serverSide: true,
      ajax:  baseUrl + 'ecommerce-product-list',
      columns: [
        // columns according to JSON
        {data:''},
        { data: 'id' },
        { data: 'category_id' },
        { data: 'type' },
        { data: 'weight' },
        { data: 'price' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          targets: 1,
          render: function (data, type, full, meta) {
            var $id = full['id'];
            return '<span class="text-nowrap">' + $id + '</span>';
          }
        },
        {
          // category
          targets: 2,
          render: function (data, type, full, meta) {
            var $category = full['category_id'];
            return '<span class="text-nowrap">' + $category + '</span>';
          }
        },

        {
          //product
          targets: 3,
          orderable: false,
          render: function (data, type, full, meta) {
            var $product = full['type'];
            return '<span class="text-nowrap">' + $product + '</span>';
          }
        },
        {
          //weight
          targets: 4,
          orderable: false,
          render: function (data, type, full, meta) {
            var $weight = full['weight'];
            return '<span class="text-nowrap">' + $weight + '</span>';
          }
        },
        {
          //price
          targets: 5,
          orderable: false,
          render: function (data, type, full, meta) {
            var $price = full['price'];
            return '<span class="text-nowrap">' + $price + '</span>';
          }
        },
        {
          // Actions
          targets: -1,
          searchable: false,
          title: 'الإجراءات',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<span class="text-nowrap"><button  class="btn btn-sm btn-icon me-2 edit-record" data-bs-target="#editModal" data-id="'.concat(
                full['id'],
                '" data-bs-toggle="modal" data-bs-dismiss="modal "><i class="bx bx-edit"></i></button>'
              ) +
              '<button class="btn btn-sm btn-icon delete-record" data-id="'.concat(
                full['id'],
                '" ><i class="bx bx-trash"></i></button></span>'
              )
            );
          }
        }
      ],
      order: [[1, 'asc']], //set any columns order asc/desc
      dom:
        '<"card-header d-flex border-top rounded-0 flex-wrap py-md-0"' +
        '<"me-5 ms-n2 pe-5"f>' +
        '<"d-flex justify-content-start justify-content-md-end align-items-baseline"<"dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0"lB>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      lengthMenu: [7, 10, 20, 50, 70, 100], //for length of menu
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search Product',
        info: 'Displaying _START_ to _END_ of _TOTAL_ entries'
      },
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-secondary dropdown-toggle mx-3',
          text: '<i class="bx bx-export me-2"></i>تصدير',
          buttons: [
            {
              extend: 'print',
              title: 'Users',
              text: '<i class="bx bx-printer me-2" ></i>طباعة',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be print
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function customize(win) {
                //customize print view for dark
                $(win.document.body)
                  .css('color', config.colors.headingColor)
                  .css('border-color', config.colors.borderColor)
                  .css('background-color', config.colors.body);
                $(win.document.body)
                  .find('table')
                  .addClass('compact')
                  .css('color', 'inherit')
                  .css('border-color', 'inherit')
                  .css('background-color', 'inherit');
              }
            },
            {
              extend: 'csv',
              title: 'Users',
              text: '<i class="bx bx-file me-2" ></i>excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be print
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'excel',
              title: 'Users',
              text: '<i class="bx bxs-file-export me-1"></i>Excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be display
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'pdf',
              title: 'Users',
              text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be display
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'copy',
              title: 'Users',
              text: '<i class="bx bx-copy me-2" ></i>نسخ',
              className: 'dropdown-item',
              exportOptions: {
                columns: [2, 3],
                // prevent avatar to be copy
                format: {
                  body: function body(inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList.contains('user-name')) {
                        result = result + item.lastChild.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }
          ]
        },
        {
          text: '<i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">إضافة طرد</span>',
          className: 'add-new btn btn-primary',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#addModal'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['id'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      },

    });
    $('.dataTables_length').addClass('mt-0 mt-md-3 me-3');
    // To remove default btn-secondary in export buttons
    $('.dt-buttons > .btn-group > button').removeClass('btn-secondary');
    $('.dt-buttons').addClass('d-flex flex-wrap');
  }


  //add
  (function () {
    FormValidation.formValidation(document.getElementById('addForm'), {
      fields: {
        type: {
          validators: {
            notEmpty: {
              message: 'ادخل اسم الطرد'
            }
          }
        },
        price: {
          validators: {
            notEmpty: {
              message: 'ادخل سعر الطرد'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    }).on('core.form.valid', function () {
      // Get form data
      $.ajax({
        data: $('#addForm').serialize(),
        url: ''.concat(baseUrl, 'ecommerce-product-list'),
        type: 'POST',
        success: function success(status) {
          dt_products.draw();
          $('#addModal').modal('hide');
          $('#addForm')[0].reset();

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: status.message,
            text: 'أصبح المنتج في قائمة الطرود ',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        },
        error: function error(err) {
          $('#addModal').modal('hide');

          Swal.fire({
            title: 'حدث خطأ ما!',
            text: 'لم يتم إضافة نوع طرد جديد إلى قائمة الطرود.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();

  // Delete Record
  $(document).on('click', '.delete-record', function () {
    var product_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }
// sweetalert for confirmation of delete
Swal.fire({
  title: ' هل أنت متأكد من ذلك؟',
  text: " لن تكون قادرا على التراجع عن هذا!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: ' نعم ، احذفه!',
  cancelButtonText: 'إلغاء',
  customClass: {
    confirmButton: 'btn btn-primary me-3',
    cancelButton: 'btn btn-label-secondary'
  },
  buttonsStyling: true
}).then(function (result) {
  if (result.value) {
    // delete the data
    $.ajax({
      type: 'DELETE',
      url: ''.concat(baseUrl, 'ecommerce-product-list/').concat(product_id),
      success: function () {
        dt_products.draw();
      },
      error: function (error) {
        console.log(error);
      }
    });

    // success sweetalert
    Swal.fire({
      icon: 'success',
      title: 'حذف!',
      text: ' تم حذف نوع الطرد بنجاح',
      customClass: {
        confirmButton: 'btn btn-success'
      }
    });
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire({
      title: 'ألغيت',
      text: 'لم  يتم حذف نوع الطرد',
      icon: 'error',
      customClass: {
        confirmButton: 'btn btn-success'
      }
    });
  }
});
  });


  // edit Record
  $(document).on('click', '.edit-record', function () {

    var product_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }
    // get data
    $.get(''.concat(baseUrl, 'ecommerce-product-list/').concat(product_id, '/edit'), function (data) {
      $('#editId').val(product_id);
      const selectElement = document.getElementById('category');
       var options = selectElement.options;
      for (var i = 0; i < options.length; i++) {
        if (options[i].value == data.category_id) {
          options[i].selected = true;
          break;
        }
      }
      $('#product-name').val(data.type);
      $('#weight').val(data.weight);
      $('#price').val(data.price);
    });
  });

  /// update
  (function () {
    FormValidation.formValidation(document.getElementById('editForm'), {
      fields: {
        type: {
          validators: {
            notEmpty: {
              message: 'ادخل اسم الطرد'
            }
          }
        },
        price: {
          validators: {
            notEmpty: {
              message: 'ادخل سعر الطرد'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-12'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    }).on('core.form.valid', function () {
      // Get form data to edit theen update
      var product_id =$('#editId').val();
      $.ajax({
        data: $('#editForm').serialize(),
        url: ''.concat(baseUrl, 'ecommerce-product-list/').concat(product_id),
        method: 'PUT',
        success: function success(status) {
          dt_products.draw();
          $('#editModal').modal('hide');
          $('#editForm')[0].reset();

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'تمت عملية التحديث بنجاح ',
            text: 'تم تحديث المنتج ',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          //window.location.reload();
        },
        error: function error(err) {
          $('#editModal').modal('hide');

          Swal.fire({
            title: 'حدث خطأ',
            text: 'لم يتم تحديث المنتج ',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();
  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
