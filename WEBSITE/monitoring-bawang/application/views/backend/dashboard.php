<div class="content">
	<div class="row">
        <div class="col-lg-3">
          <div class="card" style="width: 16rem;">      
              <div class="card-body">
                <h5>Jumlah Data</h3>
                  <!-- VARIABEL COUNT_DATA UNTUK MENGHITUNG JUMLAH DATA DI TABEL -->
                <h1 id="value_ph"><?= $count_data; ?></h1>
                <a href="<?= base_url('dashboard/data');?>" class="btn btn-sm btn-success">Detail</a>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
      <div class="col">
        <div class="card-body">
           <div class="chart-area">
             <canvas id="canvas"></canvas>
           </div>
        </div>
      </div>
    </div>
    </div>
</div>
<script>
    function tampil(){
    $.ajax({
        url: "<?= base_url('Dashboard/realtime')?>",
        dataType: 'json',
        success:function(result){
          
          $('#count_data').text(result.value_ph);
          
          setTimeout(tampil, 2000); 
        }
    });
  }
  
  document.addEventListener('DOMContentLoaded',function(){
    tampil();
  });   
</script>