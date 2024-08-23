'use strict';

// (function () {
//   $.ajaxSetup({
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
//   });
//   const carFormvalidation = document.getElementById('editCarForm');
//   FormValidation.formValidation(carFormvalidation, {
//     fields: {
//       model: {
//         validators: {
//           notEmpty: {
//             message: 'الرجاء ادخال النوع '
//           }
//         }
//       },
//       vin: {
//         validators: {
//           notEmpty: {
//             message: 'الرجاء ادخال رقم الشاسية'
//           }
//         }
//       },

//       color: {
//         validators: {
//           notEmpty: {
//             message: 'ادخل لون السيارة'
//           }
//         }
//       },
//       license_plate: {
//         validators: {
//           notEmpty: {
//             message: 'ادخل رقم اللوحة '
//           }
//         }
//       },
//       make_year: {
//         validators: {
//           date: {
//             message: 'ليس تاريخ صالح'
//           }
//         }
//       },
//       car_length: {
//         validators: {
//           notEmpty: {
//             message: 'ادخل طول السيارة '
//           }
//         }
//       },

//       height: {
//         validators: {
//           notEmpty: {
//             message: 'ادخل ارتفاع السيارة'
//           }
//         }
//       },

//       status: {
//         validators: {
//           notEmpty: {
//             message: 'ادخل ارتفاع السيارة'
//           }
//         }
//       }
//     },
//     plugins: {
//       trigger: new FormValidation.plugins.Trigger(),
//       bootstrap5: new FormValidation.plugins.Bootstrap5({
//         // Use this for enabling/changing valid/invalid class
//         // eleInvalidClass: '',
//         eleValidClass: '',
//         rowSelector: '.col-12'
//       }),
//       submitButton: new FormValidation.plugins.SubmitButton(),
//       // Submit the form when all fields are valid
//       // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
//       autoFocus: new FormValidation.plugins.AutoFocus()
//     }
//   }).on('core.form.valid', function () {
//     console.log($('#editCarForm').serialize());
//     $.ajax({
//       data: $('#editCarForm').serialize(),
//       url: ''.concat(baseUrl, 'add-vehicle'),
//       type: 'POST',
//       success: function success(status) {
//         $('#editUserLogistec').modal('hide');
//         $('#editCarForm')[0].reset();
//         dt_user.draw();

//         // sweetalert
//         Swal.fire({
//           icon: 'success',
//           title: 'Successfully '.concat(status.message, '!'),
//           text: 'Role '.concat(status.message, ' Successfully.'),
//           customClass: {
//             confirmButton: 'btn btn-success'
//           }
//         });
//         //window.location.reload();
//       },
//       error: function error(status) {
//         $('#editUserLogistec').modal('hide');

//         Swal.fire({
//           title: 'Duplicate Entry!'.concat(status.message, '!'),
//           text: 'Role'.concat(status.message, ' Successfully.'),
//           icon: 'error',
//           customClass: {
//             confirmButton: 'btn btn-success'
//           }
//         });
//       }
//     });
//   });
// })();
