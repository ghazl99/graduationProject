/**
 * App eCommerce customer all
 */

'use strict';

// Datatable (jquery)
$(function () {
  let borderColor, bodyBg, headingColor;

  if (isDarkStyle) {
    borderColor = config.colors_dark.borderColor;
    bodyBg = config.colors_dark.bodyBg;
    headingColor = config.colors_dark.headingColor;
  } else {
    borderColor = config.colors.borderColor;
    bodyBg = config.colors.bodyBg;
    headingColor = config.colors.headingColor;
  }
  // Variable declaration for table
  var dt_user_table = $('.datatables-users'),
  select2 = $('.select2'),
  userView = baseUrl + 'app/ecommerce/customer/all',
  offCanvasForm = $('#offcanvasAddUser'),
  offCanvasFormEdit = $('#offcanvasEditUser');
  if (select2.length) {
  var $this = select2;
  $this.wrap('<div class="position-relative"></div>').select2({
    placeholder: 'Select Country',
    dropdownParent: $this.parent()
  });
  }

  // customers datatable

      // ajax setup
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // Users datatable
      if (dt_user_table.length) {
        var dt_user = dt_user_table.DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: baseUrl + 'customer/all'
          },
          columns: [
            // columns according to JSON
            {
              data: ''
            },
            {
              data: 'id'
            },
            {
              data: 'name'
            },
            {
              data: 'email'
            },
            {
              data: 'email_verified_at'
            },
            {
              data: 'role'
            },
            {
              data: 'action'
            }
          ],
          columnDefs: [
            {
              // For Responsive
              className: 'control',
              searchable: false,
              orderable: false,
              responsivePriority: 2,
              targets: 0,
              render: function render(data, type, full, meta) {
                return '';
              }
            },
            {
              searchable: false,
              orderable: false,
              targets: 1,
              render: function render(data, type, full, meta) {
                return '<span>'.concat(full.fake_id, '</span>');
              }
            },
            {
              // User full name
              targets: 2,
              responsivePriority: 4,
              render: function render(data, type, full, meta) {
                var $name = full['name'];

                // For Avatar badge
                var stateNum = Math.floor(Math.random() * 6);
                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                var $state = states[stateNum],
                  $name = full['name'],
                  $initials = $name.match(/\b\w/g) || [],
                  $output;
                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                $output =
                  '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';

                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-start align-items-center user-name">' +
                  '<div class="d-flex flex-column">' +
                    $name +
                  '</span></a>' +
                  '</div>' +
                  '</div>';
                return $row_output;
              }
            },
            {
              // User email
              targets: 3,
              render: function render(data, type, full, meta) {
                var $email = full['email'];
                return '<span class="user-email">' + $email + '</span>';
              }
            },
            {
              // email verify
              targets: 4,
              className: 'text-center',
              render: function render(data, type, full, meta) {
                var $verified = full['email_verified_at'];
                return ''.concat(
                  $verified
                    ? '<i class="bx fs-4 bx-check-shield text-success"></i>'
                    : '<i class="bx fs-4 bx-shield-x text-danger" ></i>'
                );
              }
            },

            {
              // User full name
              targets: 2,
              responsivePriority: 4,
              render: function render(data, type, full, meta) {
                var $name = full['role'];

                // For Avatar badge
                var stateNum = Math.floor(Math.random() * 6);
                var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                var $state = states[stateNum],
                  $name = full['name'],
                  $initials = $name.match(/\b\w/g) || [],
                  $output;
                $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                $output =
                  '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';

                // Creates full output for row
                var $row_output =
                  '<div class="d-flex justify-content-start align-items-center user-name">' +
                  '<div class="d-flex flex-column">' +
                    $name +
                  '</span></a>' +
                  '</div>' +
                  '</div>';
                return $row_output;
              }
            },
            {
              // Actions
              targets: -1,
              title: 'الإجراءات',
              searchable: false,
              orderable: false,
              render: function render(data, type, full, meta) {
                return (
                  '<div class="d-inline-block text-nowrap">' +
                  '<button class="btn btn-sm btn-icon edit-record" data-id="'.concat(
                    full['id'],
                    '" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser"><i class="bx bx-edit"></i></button>'
                  ) +
                  '<button class="btn btn-sm btn-icon delete-record" data-id="'.concat(
                    full['id'],
                    '"><i class="bx bx-trash"></i></button>'
                  ) +
                  '<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>' +
                  '<div class="dropdown-menu dropdown-menu-end m-0">' +
                  '<a href="' +
                  userView +
                  '" class="dropdown-item">View</a>' +
                  '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
                  '</div>' +
                  '</div>'
                );
              }
            }
          ],
          order: [[2, 'desc']],
          dom:
            '<"row mx-2"' +
            '<"col-md-2"<"me-3"l>>' +
            '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
            '>t' +
            '<"row mx-2"' +
            '<"col-sm-12 col-md-6"i>' +
            '<"col-sm-12 col-md-6"p>' +
            '>',
          language: {
            sLengthMenu: '_MENU_',
            search: 'بحث',
            searchPlaceholder: 'بحث..'
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
              text: '<i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">إضافة عميل جديد</span>',
              className: 'add-new btn btn-primary',
              attr: {
                'data-bs-toggle': 'offcanvas',
                'data-bs-target': '#offcanvasAddUser'
              }
            }
          ],
          // For responsive popup
          responsive: {
            details: {
              display: $.fn.dataTable.Responsive.display.modal({
                header: function header(row) {
                  var data = row.data();
                  return 'Details of ' + data['name'];
                }
              }),
              type: 'column',
              renderer: function renderer(api, rowIdx, columns) {
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
          }
        });
      }

      // changing the title
      $('.add-new').on('click', function () {
        $('#user_id').val(''); //reseting input field
        $('#offcanvasAddUserLabel').html('إضافة عميل');
      });


  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);




  // edit record///////////
  $(document).on('click', '.edit-record', function () {
    var user_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'customer/all/').concat(user_id, '/edit'), function (data) {
      $('#edit_id').val(data.id);
      $('#edit-user-fullname').val(data.name);
      $('#edit-user-email').val(data.email);
      $('#edit-contact').val(data.contact);
      const m=[data.roles];

      let checkboxes = document.querySelectorAll('input[id="editCheckbox"]');
            let values = [];
            for (let j = 0; j < m[0].length; j++)
              {
                values.push(m[0][j].name);
              }
            checkboxes.forEach(c => {
                if(values.includes(c.value))
                  c.checked=true;
                else
                  c.checked=false;
            });

    });
  });

      // validating form and updating user's data
      var addNewUserForm = document.getElementById('addNewUserForm');
      var fv = FormValidation.formValidation(addNewUserForm, {
        fields: {
          name: {
            validators: {
              notEmpty: {
                message: 'ادخل الاسم الكامل'
              }
            }
          },

          email: {
            validators: {
              notEmpty: {
                message: 'ادخل الايميل'
              },
              emailAddress: {
                message: 'القيمة ليست عنوان بريد إلكتروني صالحًا'
              }
            }
          },
          contact: {
            validators: {
              notEmpty: {
                message: 'ادخل رقم الهاتف'
              }
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'ادخل كلمة المرور'
              }
            }
          },password_confirmation: {
            validators: {
              notEmpty: {
                message: 'تأكيد كلمة المرور'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            eleValidClass: '',
            rowSelector: function rowSelector(field, ele) {
              // field is the field name & ele is the field element
              return '.mb-3';
            }
          }),
          submitButton: new FormValidation.plugins.SubmitButton(),
          // Submit the form when all fields are valid
          // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
          autoFocus: new FormValidation.plugins.AutoFocus()
        }
      }).on('core.form.valid', function () {
        // adding or updating user when form successfully validate
        $.ajax({
          data: $('#addNewUserForm').serialize(),
          url: ''.concat(baseUrl, 'customer/all'),
          type: 'POST',
          success: function success(status) {
            dt_user.draw();
            offCanvasForm.offcanvas('hide');
                    // sweetalert
            Swal.fire({
              icon: 'success',
              title: 'تم عملية الإضافة بنجاح',
              text: 'تم إنشاء حساب للموظف '.concat(status.message, ' Successfully.'),
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          },
          error: function error(err) {
            offCanvasForm.offcanvas('hide');
            Swal.fire({
              title: 'حدث خطأ !',
              text: 'لم تتم عملية الإضافة',
              icon: 'error',
              customClass: {
                confirmButton: 'btn btn-success'
              }
            });
          }
        });
      });
///update//////
  (function () {
      var addNewUserForm = document.getElementById('editNewUserForm');
      FormValidation.formValidation(addNewUserForm,  {
        fields: {
          name: {
            validators: {
              notEmpty: {
                message: 'ادخل الاسم الكامل'
              }
            }
          },

          email: {
            validators: {
              notEmpty: {
                message: 'ادخل الايميل'
              },
              emailAddress: {
                message: 'القيمة ليست عنوان بريد إلكتروني صالحًا'
              }
            }
          },
          contact: {
            validators: {
              notEmpty: {
                message: 'ادخل رقم الهاتف'
              }
            }
          },
          password: {
            validators: {
              notEmpty: {
                message: 'ادخل كلمة المرور'
              }
            }
          },password_confirmation: {
            validators: {
              notEmpty: {
                message: 'تأكيد كلمة المرور'
              }
            }
          }
        },
          plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
              // Use this for enabling/changing valid/invalid class
              eleValidClass: '',
              rowSelector: function rowSelector(field, ele) {
                // field is the field name & ele is the field element
                return '.mb-3';
              }
            }),
            submitButton: new FormValidation.plugins.SubmitButton(),
            // Submit the form when all fields are valid
            // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
            autoFocus: new FormValidation.plugins.AutoFocus()
          }
      }).on('core.form.valid', function () {
        // Get form data
        var user_id = $('#edit_id').val();

        $.ajax({
          data: $('#editNewUserForm').serialize(),
          url: ''.concat(baseUrl, 'customer/all/').concat(user_id),
          method: 'PUT',
          success: function success(status) {
              dt_user.draw();
              offCanvasFormEdit.offcanvas('hide');

              // sweetalert
              Swal.fire({
                icon: 'success',
                title: 'تم عملية التحديث بنجاح ',
                text: 'تم تحديث حساب الموظف',
                customClass: {
                  confirmButton: 'btn btn-success'
                }
              });
            },
            error: function error(err) {
              offCanvasFormEdit.offcanvas('hide');
              Swal.fire({
                title: 'حدث خطأ !',
                text: 'لم تتم عملية التحديث',
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
    var user_id = $(this).data('id'),
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
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        // delete the data
        $.ajax({
          type: 'DELETE',
          url: ''.concat(baseUrl, 'customer/all/').concat(user_id),
          success: function success() {
            dt_user.draw();
             // Update the count
            var newCount = parseInt(document.getElementById('userCount').innerText) - 1;
            document.getElementById('userCount').innerText = newCount;

            var newCount = parseInt(document.getElementById('userVerifiedCount').innerText) - 1;
            document.getElementById('userVerifiedCount').innerText = newCount;
          },
          error: function error(_error) {
            console.log(_error);
          }
        });

        // success sweetalert
        Swal.fire({
          icon: 'success',
          title: 'تمت عملية الحذف بنجاح',
          text: 'تم حذف حساب الموظف',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'تم إلغاء عملية الحذف',
          text: 'لم  يتم حذف حساب الموظف',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });


  // clearing form data when offcanvas hidden
  offCanvasForm.on('hidden.bs.offcanvas', function () {
    fv.resetForm(true);
  });
});
