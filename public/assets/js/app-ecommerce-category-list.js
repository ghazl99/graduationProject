/**
 * App eCommerce Category List
 */

'use strict';

// Comment editor

const commentEditor = document.querySelector('.comment-editor');

if (commentEditor) {
  new Quill(commentEditor, {
    modules: {
      toolbar: '.comment-toolbar'
    },
    placeholder: 'Enter category description...',
    theme: 'snow'
  });
}

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

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }});

  /////// Delete Record//////////
  $(document).on('click', '.delete-record', function () {
    var category_id = $(this).data('id'),
      dtrModal = $('.dtr-bs-modal.show');
      console.log(category_id);

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
          url:  ''.concat(baseUrl, 'product-category/').concat(category_id),
          success: function () {
            $('#categories').load('/app/ecommerce/product/category' + ' #categories');
          },
          error: function (error) {
            console.log(error);
          }
        });

        // success sweetalert
        Swal.fire({
          icon: 'success',
          title: 'تمت عملية الحذف بنجاح',
          text: ' تم حذف الصنف',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'تم إلغاء عملية الحذف',
          text: 'لم  يتم حذف الصنف',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success'
          }
        });
      }
    });
  });
  //select2 for dropdowns in offcanvas

  var select2 = $('.select2');
  if (select2.length) {
    select2.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: $this.parent(),
        placeholder: $this.data('placeholder') //for dynamic placeholder
      });
    });
  }

  // Customers List Datatable
$('#addCategoryModal').on('show.bs.modal', function () {
    $('#addForm')[0].reset();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);

  /////////edit role/////////////

// $(document).on('click', '.category-edit-modal', function () {
//   var category_id = $(this).data('id'),
//     dtrModal = $('.dtr-bs-modal.show');
//   // hide responsive modal in small screen
//   if (dtrModal.length) {
//     dtrModal.modal('hide');
//   }
//   // get data
//   $.get(''.concat(baseUrl, 'product-category/').concat(category_id, '/edit'), function (data) {
//     $('#id').val(category_id);
//     $('#ecommerce-category-title').val(data.name);
//     $('#ecommerce-category-image').val(data.name);

//   });
// });
  // clearing form data when offcanvas hidden

//////add category/////
  (function () {
  FormValidation.formValidation(document.getElementById('addForm'), {
    fields: {
      categoryTitle: {
        validators: {
          notEmpty: {
            message: 'ادخل اسم الصنف'
          }
        }
      }
      ,
      img: {
        validators: {
          notEmpty: {
            message: 'ادخل صورة عن الصنف'
          }
        }
      }

    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        eleValidClass: '',
        rowSelector: '.col-12'
      }),
      submitButton: new FormValidation.plugins.SubmitButton(),
      // Submit the form when all fields are valid
      // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
      autoFocus: new FormValidation.plugins.AutoFocus()
    }
  }).on('core.form.valid', function () {

    // adding or updating user when form successfully validate
    var form=new FormData($('#addForm') [0]);

    $.ajax({
      data:form,
      url:  ''.concat(baseUrl, 'product-category'),
      type: 'POST',
      cache: false,
        contentType: false,
        processData: false,
      success: function (status) {
        $('#addModal').modal('hide');
        $('#addForm')[0].reset();
        $('#categories').load('/app/ecommerce/product/category' + ' #categories');

        //sweetalert
        Swal.fire({
            icon: 'success',
            title: 'تمت عملية الإضافة بنجاح ',
            text: 'تم إنشاء صنف جديد ',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
      },
      error: function (err) {
        $('#addModal').modal('hide');
        Swal.fire({
            title: 'حدث خطأ',
            text: 'لم يتم إنشاء صنف جديد',
            icon: 'error',
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
      }
    });
  });
})();

/////edit/////
$(document).on('click', '.category-edit-modal', function () {
  var id = $(this).data('id'),
    dtrModal = $('.dtr-bs-modal.show');
  // hide responsive modal in small screen
  if (dtrModal.length) {
    dtrModal.modal('hide');
  }

  // get data
  $.get(''.concat(baseUrl, 'product-category/').concat(id, '/edit'), function (data) {
    $('#editId').val(id);
    $('#Etitle').val(data.category_name);
    $('#Eprice').val(data.price_per_weight);


  });
});
////////update///////////
(function () {
  FormValidation.formValidation(document.getElementById('editForm'), {
    fields: {
      categoryTitle: {
        validators: {
          notEmpty: {
            message: 'ادخل اسم الصنف'
          }
        }
      }
      ,
      img: {
        validators: {
          notEmpty: {
            message: 'ادخل صورة عن الصنف'
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
    var id = $('#editId').val();

    $.ajax({
      data: $('#editForm').serialize(),
      url: ''.concat(baseUrl, 'product-category/').concat(id),
      method: 'PUT',
      success: function success(status) {
        $('#editModal').modal('hide');
        $('#editForm')[0].reset();
        $('#categories').load('/app/ecommerce/product/category' + ' #categories');
        // sweetalert
        Swal.fire({
          icon: 'success',
          title: 'تمت عملية التحديث بنجاح ',
          text: 'تم تحديث الصنف ',
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
          text: 'لم يتم تحديث الصنف ',
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
