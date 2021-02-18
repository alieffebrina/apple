
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Development By &copy; <?php echo date('Y')?> <a href="https://hosterweb.co.id">HOSTERWEB INDONESIA</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?php echo base_url() ?>assets/dist/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/terbilang.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<!-- FLOT CHARTS -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url() ?>assets/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Page script -->
<script>
  $(document).ready(function(){ 
    $('.select2').select2()
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
     $('.tanggalan').daterangepicker({
        timePicker: false,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
          format: 'DD.MM.YYYY'
        }
      });
     $('.datepicker').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy"
      })
    //Date range picker with time picker
  })
</script>
<!-- Page script -->

  <script type="text/javascript">
  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>
<script type='text/javascript'>
    var error = 1; // nilai default untuk error 1
 
    function cek_username(){
        $("#pesan").hide();
 
        var username = $("#username").val();
 
        if(username != ""){
            $.ajax({
                url: "<?php echo site_url() . '/C_User/cek_user'; ?>", //arahkan pada proses_tambah di controller member
                data: 'user='+username,
                type: "POST",
                success: function(msg){
                    if(msg==1){
                        $("#pesan").css("color","#fc5d32");
                        $("#username").css("border-color","#fc5d32");
                        $("#pesan").html("Username sudah digunakan !");
 
                        error = 1;
                    }else{
                        $("#pesan").css("color","#59c113");
                        $("#username").css("border-color","#59c113");
                        $("#pesan").html("");
                        error = 0;
                    }
 
                    $("#pesan").fadeIn(1000);
                }
            });
        }       
         
    }
     
</script>
<script type="text/javascript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
<script type="text/javascript">
  function embuh(){
    var embuha = document.getElementById('kodeformat1').value;
    if(embuha=='huruf'){
    document.getElementById('texthuruf1').style.visibility='visible';
    // document.getElementById('texthuruf1').value = embuha;
    } else {
    document.getElementById('texthuruf1').style.visibility='hidden';

    }
  }

  function embuhb(){
    var embuhtext = document.getElementById('format2').value;
    if(embuhtext=='huruf'){
    document.getElementById('texthuruf2').style.visibility='visible';
    } else {
    document.getElementById('texthuruf2').style.visibility='hidden';

    }
  }

  function embuhc(){
    var embuhtext3 = document.getElementById('format3').value;
    if(embuhtext3=='huruf'){
    document.getElementById('texthuruf3').style.visibility='visible';  
    } else {
    document.getElementById('texthuruf3').style.visibility='hidden';   
    }
    // document.getElementById('texthuruf3').value=embuhtext3;
  }
  function embuhhub(){
      var a = document.getElementById('kodeformat1').value;
      var b = document.getElementById('format2').value;
      var c = document.getElementById('format3').value;
      var d = document.getElementById('penghubung').value;
      var e = document.getElementById('texthuruf1').value;
      var f = document.getElementById('texthuruf2').value;
      var g = document.getElementById('texthuruf3').value;
      if (a == "huruf"){
        var a = e;
      } 
      if (b == "huruf"){
        var b = f;
      } 
      if(c == "huruf"){
        var c = g;
      }
      if(c == ""){
        document.getElementById('final').value = a+d+b;
      } else {
      document.getElementById('final').value = a+d+b+d+c;
      }
    // var embuhhuba = document.getElementById('penghubung').value;
  // document.getElementById('final').value= a+b;
  }

  $('#btnsimpantipeuser').click(function(){
    var finalpenjualan =  document.getElementById('final').value; // Ketika tombol simpan di klik
    document.getElementById('kode_penjualan').value = finalpenjualan;
    $("#modalkodepenjualan .close").click();
  })

  function refunda(){
    var refunda = document.getElementById('koderefund1').value;
    if(refunda=='huruf'){
    document.getElementById('textrefund1').style.visibility='visible';
    // document.getElementById('texthuruf1').value = embuha;
    } else {
    document.getElementById('textrefund1').style.visibility='hidden';

    }
  }

  function refundb(){
    var refundb = document.getElementById('koderefund2').value;
    if(refundb=='huruf'){
    document.getElementById('textrefund2').style.visibility='visible';
    } else {
    document.getElementById('textrefund2').style.visibility='hidden';

    }
  }

  function refundc(){
    var refundc = document.getElementById('koderefund3').value;
    if(refundc=='huruf'){
    document.getElementById('textrefund3').style.visibility='visible';  
    } else {
    document.getElementById('textrefund3').style.visibility='hidden';   
    }
    // document.getElementById('texthuruf3').value=embuhtext3;
  }
  function hubrefund(){
      var a = document.getElementById('koderefund1').value;
      var b = document.getElementById('koderefund2').value;
      var c = document.getElementById('koderefund3').value;
      var d = document.getElementById('hubunganrefund').value;
      var e = document.getElementById('textrefund1').value;
      var f = document.getElementById('textrefund2').value;
      var g = document.getElementById('textrefund3').value;
      if (a == "huruf"){
        var a = e;
      } 
      if (b == "huruf"){
        var b = f;
      } 
      if(c == "huruf"){
        var c = g;
      }
      if(c == ""){
        document.getElementById('refundfin').value = a+d+b;
      } else {
      document.getElementById('refundfin').value = a+d+b+d+c;
      }
    // var embuhhuba = document.getElementById('penghubung').value;
  // document.getElementById('final').value= a+b;
  }

  $('#btnsimpanrefund').click(function(){
    var finalrefund =  document.getElementById('refundfin').value; // Ketika tombol simpan di klik
    document.getElementById('kode_refund').value = finalrefund;
    $("#modalkoderefund .close").click();
  })
</script>
  
<script type="text/javascript">
    
    var rupiah = document.getElementById('rupiah');
    if(rupiah){
      rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    var hargajual = document.getElementById('hargajual');
    if(hargajual){
      hargajual.addEventListener('keyup', function(e){
        hargajual.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    var hargapokok = document.getElementById('hargapokok');
    if(hargapokok){
      hargapokok.addEventListener('keyup', function(e){
        hargapokok.value = formatRupiah(this.value, 'Rp. ');
      });
    }

    var nominalrefund = document.getElementById('nominalrefund');
    if(nominalrefund){
      nominalrefund.addEventListener('keyup', function(e){
        nominalrefund.value = formatRupiah(this.value, 'Rp. ');
      });
    }
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.toString().replace(/[^,\d]/g, ''),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
  <script type="text/javascript">
    $("#jenisrefund").change(function(){
      var jenis = $("#jenisrefund").val();
      if (jenis == "uang") { 
         document.getElementById('nominalrefund').style.visibility='visible';
         // document.getElementById('qttrefund').style.visibility='visible';
         // document.getElementById('hargarefund').style.visibility='visible';
      } else if (jenis == "barang") { 
         document.getElementById('nominalrefund').style.visibility='hidden';
         // document.getElementById('qttrefund').style.visibility='visible';
         // document.getElementById('hargarefund').style.visibility='visible';
      } else {

         document.getElementById('nominalrefund').style.visibility='hidden';
         // document.getElementById('qttrefund').style.visibility='visible';
         // document.getElementById('hargarefund').style.visibility='visible';
      }
    });

    $("#barangjual").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("C_Penjualan/getbarang"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_barang : $("#barangjual").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#imei").html(response.list_imei).show();
          $("#stok").val(response.list_sisastok);
          $("#namabarang").val(response.namabarang);
          $("#hargajual").val(response.list_harga);
          $("#subtotal").val(response.list_harga);
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        },
      });
    });

    function startCalculate(){
    var interval=setInterval("Calculate()",10);

  };


  function Calculate(){
      var a = document.getElementById('hargajual').value.replace(/[^0-9]/g,'');
      var b = document.getElementById('qtt').value;
      // var c = document.getElementById('diskon').value;
      // document.getElementById('diskon').value = formatRupiah(rupiah) ;
      diskon.addEventListener('keyup', function(e){
      diskon.value = formatRupiah(this.value, 'Rp. ');

      });
      var diskonc = document.getElementById('diskon').value.replace(/[^0-9]/g,'');

      // alert((a*b));
      if (diskonc>(a*b)){
        $("#diskon").css("border-color","#fc5d32");
        $("#diskon").val("");
        var bilangan = (a*b);
      }else{

        $("#diskon").css("border-color","");
        var bilangan = (a*b)-diskonc;
      }
      var number_string = bilangan.toString(),
        sisa  = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
          
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      document.getElementById('subtotal').value = 'Rp. '+formatRupiah(rupiah) ;
      document.getElementById('subtotalrupiah').value = bilangan ;   
  };
  

  function stopCalc(){
    clearInterval(interval);
    // clearInterval(intervala);
  };

    $("#butsendpenjualan").click(function() {
        if($("#imei").val()=='' && 2 < parseFloat($("#qtt").val()) ){
            alert('stok tidak cukup');
        } else {

          if(parseFloat($('#stok').val())<parseFloat($("#qtt").val())){
            alert('stok tidak cukup');
          }else{
            var newid=$('#tabelku tbody>tr:last').find('td:eq(0)').text();
            // alert(newid);
            if(newid!=''){
              newid=parseInt(newid)+1;
            }else{
              newid=1;
            }

            var st = parseInt($("#subtotalrupiah").val());
            if(document.getElementById('total').value!=''){
              sumHsl=document.getElementById('total').value;
            }else{
              sumHsl=0;
            };

            $("#tabelku").append('<tr valign="top" id="'+newid+'">\n\
              <td width="100px" >' + newid + '</td>\n\
              <td width="100px" class="namabarang'+newid+'"><input type="text" name="id_barang[]" value="'+$("#barangjual").val()+'">' + $("#namabarang").val() + '</td>\n\
              <td width="100px" class="imei'+newid+'"><input type="text" name="imei[]" value="'+$("#imei").val()+'">' + $("#imei").val() + '</td>\n\
              <td width="100px" class="qtt'+newid+'"><input type="text" name="qtt[]" value="'+$("#qtt").val()+'">' + $("#qtt").val() + '</td>\n\
              <td width="100px" class="hargajual'+newid+'"><input type="text" name="hargajual[]" value="'+$("#hargajual").val()+'">Rp. ' + formatRupiah($("#hargajual").val()) + '</td>\n\
              <td width="100px" class="diskon'+newid+'"><input type="text" name="diskon[]" value="'+$("#diskon").val()+'">' + $("#diskon").val() + '</td>\n\
              <td width="100px" class="subtotal'+newid+'"><input type="text" name="subtotal[]" value="'+$("#subtotal").val()+'">' + $("#subtotal").val() + '</td>\n\
              <td width="100px"><a href="javascript:void(0);" class="remCF" data-id="'+st+'" ><input type="text" id="suba" value="'+st+'" class="aatd'+newid+'">\n\
                <button type="button" class="btn btn-info btn-sm">\n\
                  <i class="fa fa-times"></i></button></a></td>\n\ </tr>');


            // var sumHsl = 0;
            // for (t=0; t<newid; t++){
              sumHsl = parseFloat(sumHsl)+parseFloat(st);

            // }
              var number_string = sumHsl.toString(),
              sisa  = number_string.length % 3,
              rupiah  = number_string.substr(0, sisa),
              ribuan  = number_string.substr(sisa).match(/\d{3}/g);
              if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
              }
              document.getElementById('totalrp').html = 'Rp. '+formatRupiah(rupiah);
              document.getElementById('total').value =sumHsl;
              
              document.getElementById('subtotal').value = '';
              document.getElementById('namabarang').value = '';
              document.getElementById('imei').value = '';
              document.getElementById('qtt').value = '';
              document.getElementById('diskon').value = '';
              document.getElementById('hargajual').value = '';

              $("#diskon").css("border-color","");
              return false;
          }
        }
      });

    $("#tabelku").on('click', '.remCF', function() {
      // var rowid = $(this).attr('id');;
      // var sta = parseInt($("#subtotalrupiah").val());
      $(this).parent().parent().remove();
      sumHasl =  document.getElementById('total').value;
      var suba= $(this).parent().find('#suba').val();
      sumHasl=sumHasl-suba;
      var number_string = sumHasl.toString(),
        sisa  = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
      document.getElementById('totalrp').value = 'Rp. '+formatRupiah(rupiah);
      document.getElementById('total').value =sumHasl ;
    });
  </script>
</body>
</html>