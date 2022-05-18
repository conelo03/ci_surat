      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020
        </div>
        <div class="footer-right">
           Dikembangkan Oleh &dash; Reizky
        </div>
      </footer>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.tombol-a').on('click', function(e) {

        e.preventDefault();
        const href = $(this).attr('href');

        Swal({
          title: 'Apakah anda Yakin ?',
          text: "Surat Akan diforward ke Bagian Umum.",
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
    });
  </script>
  <script>
    $(function () {
      $('#example1').DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
    });
  </script>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/jquery-ui/jquery-ui.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/popper.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/stisla.js')?>"></script>
 
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/modules/datatables/datatables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/jquery-selectric/jquery.selectric.min.js')?>"></script>
  <script src="<?php echo base_url('assets/modules/select2/dist/js/select2.full.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/sweetalert2/sweetalert2.all.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/myscript.js') ?>"></script>

  <!-- Summernote -->
  <script src="<?php echo base_url('assets/modules/summernote/summernote-bs4.js') ?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/js/page/modules-datatables.js')?>"></script>
  
  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js')?>"></script>
</body>
</html>