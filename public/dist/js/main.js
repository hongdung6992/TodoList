$(document).ready(function () {
  $('.reservation').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    setDate: '',
    locale: {
      format: 'DD/MM/YYYY',
    }
  });

  $('.reservation').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY'));
  });

  $('.reservation').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
  });
});

// delete work
$(document).ready(function () {
  $('#modal-confirm-delete').on('show.bs.modal', function (e) {
    let url = $(e.relatedTarget).data('url');

    $('#confirm-delete').one('click', function () {
      $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        success: function (response) {
          if (response.status === 'success') {
            $('#modal-confirm-delete').modal('hide');
            reloadData();
            toastr.success(response.message);
          }else{
            toastr.danger(response.message);
          }
        },
      });
    })

  });

  // select update status
  $(document).on('click', ".work-status", function (e) {
    
    let status = $(e.target).data('status');
    let url = $(this).parents('div').data('url');
    $.ajax({
      type: "POST",
      url: url,
      data: {status},
      dataType: "json",
      success: function (response) {
        if(response.status === 'success'){
          reloadData();
        }
      }
    });
  })

  function reloadData(){
    url = $('#works-table').data('url')
    $.ajax({
      type: "GET",
      url: url,
      dataType: "html",
      success: function (response) {
        $('#works-table tbody').html(response);
      }
    });
  }
})