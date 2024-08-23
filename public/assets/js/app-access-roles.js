/**
 * App user list
 */

'use strict';




$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  /////// Delete Record//////////
  $(document).on('click', '.delete-record', function () {
    var role_id = $(this).data('id'),
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
          url:  ''.concat(baseUrl, 'access-roles/').concat(role_id),
          success: function () {
            $('#roles').load('/app/access-roles' + ' #roles');
          },
          error: function (error) {
            console.log(error);
          }
        });

        // success sweetalert
        Swal.fire({
          icon: 'success',
          title: 'حذف!',
          text: ' تم حذف الدور',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'ألغيت',
          text: 'لم  يتم حذف الدور',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });


  /////////////////add role/////////////////////////
  (function () {
    FormValidation.formValidation(document.getElementById('addRoleForm'), {
      fields: {
        modalRoleName: {
          validators: {
            notEmpty: {
              message: 'ادخل اسم الدور'
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
        data: $('#addRoleForm').serialize(),
        url: ''.concat(baseUrl, 'access-roles'),
        type: 'POST',
        success: function success(status) {
          $('#addRoleModal').modal('hide');
          $('#addRoleForm')[0].reset();
          $('#roles').load('/app/access-roles' + ' #roles');
          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'تمت عملية الإضافة بنجاح',
            text: 'تم إنشاء دور جديد',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          //window.location.reload();
        },
        error: function error(status) {
          $('#addRoleModal').modal('hide');

          Swal.fire({
            title: 'حدث خطأ',
            text: 'لم يتم إنشاء دور جديد',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();

  /////////edit role/////////////

  $(document).on('click', '.role-edit-modal', function () {
    var role_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
    // hide responsive modal in small screen
    if (dtrModal.length) {
      dtrModal.modal('hide');
    }

    // get data
    $.get(''.concat(baseUrl, 'access-roles/').concat(role_id, '/edit'), function (data) {
      $('#editRoleId').val(role_id);
      $('#editRoleName').val(data.name);
      const m = [data.permissions];
      let checkboxes = document.querySelectorAll('input[id="editCheckbox"]');
      let values = [];
      for (let j = 0; j < m[0].length; j++) {
        values.push(m[0][j].name);
      }
      checkboxes.forEach(c => {
        if (values.includes(c.value)) c.checked = true;
        else c.checked = false;
      });
    });
  });
  ////////update///////////
  (function () {
    FormValidation.formValidation(document.getElementById('editRoleForm'), {
      fields: {
        editRoleName: {
          validators: {
            notEmpty: {
              message: 'ادخل اسم الدور'
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
      var role_id = $('#editRoleId').val();
      $.ajax({
        data: $('#editRoleForm').serialize(),
        url: ''.concat(baseUrl, 'access-roles/').concat(role_id),
        method: 'PUT',
        success: function success(status) {
          $('#editRoleModal').modal('hide');
          $('#editRoleForm')[0].reset();
          $('#roles').load('/app/access-roles' + ' #roles');
          // sweetalert
          Swal.fire({
            icon: 'success',
            title: 'تمت عملية التحديث بنجاح',
            text: 'تم تحديث الدور',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          //window.location.reload();
        },
        error: function error(err) {
          $('#editRoleModal').modal('hide');

          Swal.fire({
            title: 'حدث خطأ!',
            text: 'لم يتم تحديث الدور.',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
        }
      });
    });
  })();


});
