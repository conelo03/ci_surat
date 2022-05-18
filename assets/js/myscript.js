// Add Alert Create, Update,
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal({
		title: 'Berhasil',
		text:  '' + flashData,
		type: 'success'
	});
}

// Tombol Hapus
$('.tombol-hapus').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
	  title: 'Apakah anda Yakin ?',
	  text: "Data Akan Di Hapus",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#00',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus Data !'
	}).then((result) => {
	   if (result.value) {
		    document.location.href = href;
		} 
	})

});

// Tombol Konfirmasi
$('.tombol-a').on('click', function(e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal({
    title: 'Apakah anda Yakin ?',
    text: "Surat akan diforward ke Bagian Umum.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#00',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Konfirmasi'
  }).then((result) => {
     if (result.value) {
        document.location.href = href;
    } 
  })

});

$('.tombol-b').on('click', function(e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal({
    title: 'Apakah anda Yakin ?',
    text: "Surat akan diteruskan kepada instalasi terkait.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#00',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Konfirmasi'
  }).then((result) => {
     if (result.value) {
        document.location.href = href;
    } 
  })

});

$('.tombol-selesai').on('click', function(e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal({
    title: 'Apakah anda Yakin ?',
    text: "Surat akan diselesaikan.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#00',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Konfirmasi'
  }).then((result) => {
     if (result.value) {
        document.location.href = href;
    } 
  })

});

$('.tombol-perbaiki').on('click', function(e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal({
    title: 'Apakah anda Yakin ?',
    text: "Surat akan dikembalikan kepada instalasi.",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#00',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Konfirmasi'
  }).then((result) => {
     if (result.value) {
        document.location.href = href;
    } 
  })

});
