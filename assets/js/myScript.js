
$(document).ready(function () {
  $('#datatables_table').DataTable({
    responsive: true
  });
  // var dataTable = $('#datatables_table').DataTable({
  //   responsive: true

  // });
  
  // highlight navbar
  var path = location.pathname.split('/');
  var url = location.origin + location.pathname;
  // var url = location.origin + '/' + path[1] + '/' + path[2] + '/' + path[3] + '/' + path[4];
  $('ul.menu-inner li a').each(function() {
    if ($(this).attr('href') != undefined) {
      if ($(this).attr('href').indexOf(url) !== -1) {
        $(this).parent().addClass('active').parent('ul').addClass('show').parent('li').addClass('active open');
      }
    }
  });
  // path.map(items);
  // function items(item) {
  //   $('#breadcrump').text(path);
    
  // }

  $('.js-example-basic-multiple').select2();
});

const flashData = $('.flash-data').data('flashdata');
const flashDataStatus = $('.flash-data').data('fdstatus');

if (flashData) {
    Swal.fire({
        icon: flashDataStatus,
        title: flashDataStatus,
        text: flashData,
        timer: 2000
    });
}

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});

const Loading = Swal.mixin({
    title: 'Mohon Tunggu',
    html: 'Proses...',
    allowOutsideClick: false,
    showConfirmButton: false,
    willOpen: () => {
        Swal.showLoading()
    }
})

function confirmDelete(data){
  Swal.fire({
    title: "Anda yakin?",
    text: "Data akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = data;
    }
  });
}

