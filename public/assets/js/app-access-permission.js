/**
 * App user list (jquery)
 */

'use strict';

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var dataTablePermissions = $('.datatables-permissions'),
    dt_permission;
  // Users List datatable
  if (dataTablePermissions.length) {
    dt_permission = dataTablePermissions.DataTable({
      processing: true,
      serverSide: true,
      ajax: baseUrl + 'access-permission',
      columns: [
        // columns according to JSON
        {
          data: ''
        },

        {
          data: 'name'
        },

        {
          data: 'action'
        }
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
          // Name
          targets: 1,
          render: function (data, type, full, meta) {
            var $name = full['name'];
            return '<span class="text-nowrap">' + $name + '</span>';
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
              '<span class="text-nowrap"><button  class="btn btn-sm btn-icon me-2 edit-record" data-bs-target="#editPermissionModal" data-id="'.concat(
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
      order: [[1, 'asc']],
      dom:
        '<"row mx-1"' +
        '<"col-sm-12 col-md-3" l>' +
        '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-3"f>B>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: '_MENU_',
        search: 'بحث',
        searchPlaceholder: 'بحث...'
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: 'إضافة صلاحية',
          className: 'add-new btn btn-primary mb-3 mb-md-0',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#addPermissionModal'
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
              return 'Details of ' + data['name'];
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
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(3)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
            )
              .appendTo('.user_role')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
      }
    });
  }


  // edit Record

  $(document).on('click', '.edit-record', function () {
    var user_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
    // hide responsive modal in small screen
    console.log(user_id + 'gg');
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'access-permission/').concat(user_id, '/edit'), function (data) {
      console.log(data.name + 'gg');

      $('#editPermissionId').val(user_id);
      $('#editPermissionName').val(data.name);
    });
  });

  //add
  (function () {
    FormValidation.formValidation(document.getElementById('addPermissionForm'), {
      fields: {
        modalPermissionName: {
          validators: {
            notEmpty: {
              message: 'ادخل اسم الصلاحية'
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
      var n = $('#addPermissionForm').serialize();
      console.log(n);

      $.ajax({
        data: $('#addPermissionForm').serialize(),
        url: ''.concat(baseUrl, 'access-permission'),
        type: 'POST',
        success: function success(status) {
          dt_permission.draw();
          $('#addPermissionModal').modal('hide');
          $('#addPermissionForm')[0].reset();

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status.message, '!'),
            text: 'Permission '.concat(status.message, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        },
        error: function error(err) {
          $('#addPermissionModal').modal('hide');

          Swal.fire({
            title: 'Duplicate Entry!',
            text: 'Your Permission should be unique.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();

  // edit Record
  $(document).on('click', '.edit-record', function () {

    var user_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
    // hide responsive modal in small screen
    console.log(user_id + 'gg');
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'access-permission/').concat(user_id, '/edit'), function (data) {
      console.log(data.name + 'gg');

      $('#editPermissionId').val(user_id);
      $('#editPermissionName').val(data.name);
    });
  });

  /// update
  (function () {
    FormValidation.formValidation(document.getElementById('editPermissionForm'), {
      fields: {
        editPermissionName: {
          validators: {
            notEmpty: {
              message: 'Please enter permission name'
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
          rowSelector: '.col-sm-9'
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      }
    }).on('core.form.valid', function () {
      // Get form data to edit theen update
      var n = $('#editPermissionForm').serialize();
      console.log(n);
      var permission_id = $('#editPermissionId').val();
      console.log(permission_id);
      $.ajax({
        data: $('#editPermissionForm').serialize(),
        url: ''.concat(baseUrl, 'access-permission/').concat(permission_id),
        method: 'PUT',
        success: function success(status) {
          dt_permission.draw();
          $('#editPermissionModal').modal('hide');
          $('#editPermissionForm')[0].reset();

          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'Successfully '.concat(status.message, '!'),
            text: 'Permission '.concat(status.message, ' Successfully.'),
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        },
        error: function error(err) {
          $('#editPermissionModal').modal('hide');

          Swal.fire({
            title: 'Duplicate Entry!',
            text: 'Your Permission should be unique.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();

  //delete

  // Delete Record
  $(document).on('click', '.delete-record', function () {
    var permission_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');

    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }
    // sweetalert for confirmation of delete
    Swal.fire({
      title: ' هل أنت متأكد من ذلك؟',
      text: ' لن تكون قادرا على التراجع عن هذا!',
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
          url: ''.concat(baseUrl, 'access-permission/').concat(permission_id),
          success: function () {
            dt_permission.draw();
          },
          error: function (error) {
            console.log(error);
          }
        });

        // success sweetalert
        Swal.fire({
          icon: 'success',
          title: 'حذف!',
          text: ' تم حذف الصلاحية',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'ألغيت',
          text: 'لم  يتم حذف الصلاحية',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
