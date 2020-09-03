<?php include "logic.php"; ?>

<!DOCTYPE html>
<html>
<head>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.css">

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.min.js"></script>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/996973c893.js" crossorigin="anonymous"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="style.css">

  <title>Covid-19 Tracker</title>
</head>
<body>
  <div class="container-fluid bg-light p-5 text-center my-3">
    <h1>Worldwide Covid-19 Case Tracker</h1>
    <div class="text-muted" id="time"></div>
    <div class="container mt-5">
      <div class="row text-center">
       <div class="col-4 text-warning">
        <h5>Total Confirmed Cases</h5>
        <?php echo number_format($total_confirmed); ?>
      </div>
      <div class="col-4 text-success">
        <h5>Total Recovered</h5>
        <?php echo number_format($total_recovered); ?>
      </div>
      <div class="col-4 text-danger">
        <h5>Total Deaths</h5>
        <?php echo number_format($total_deaths); ?>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="table-responsive col-xs-12 col-md-9">
     <table class="table" data-toggle="table">
      <thead class="thead-dark">
       <tr>
        <th scope="col" data-field="country" data-sort-name="country" data-sort-order="desc" data-sortable="true">Country</th>
        <th scope="col" data-field="confirmed" data-sortable="false">Confirmed Cases</th>
        <th scope="col" data-field="recovered" data-sortable="false">Recovered</th>
        <th scope="col" data-field="deaths" data-sortable="false">Deaths</th>
        <th scope="col" data-field="caseFatalityRatio" data-sortable="false">Case-Fatality Ratio</th>
      </tr>
    </thead>
    <tbody>
     <?php 
     foreach($data as $key => $value){
      $caseIncrease = $value[$day_count]['confirmed'] - $value[$day_count_prev]['confirmed'];
      $recoveryIncrease = $value[$day_count]['recovered'] - $value[$day_count_prev]['recovered'];
      $deathIncrease = $value[$day_count]['deaths'] - $value[$day_count_prev]['deaths'];
      ?>

      <tr>
       <th><?php echo $key; ?></th>
       <td>
        <?php echo(number_format($value[$day_count]['confirmed'])); ?>
        <?php if($caseIncrease != 0){ ?>
         <small class="text-warning pl-1"><i class="fas fa-arrow-up"></i><?php echo(number_format($caseIncrease)); ?></small>
       <?php } ?>
     </td>
     <td>
      <?php echo(number_format($value[$day_count]['recovered'])); ?>
      <?php if($recoveryIncrease != 0){ ?>
       <small class="text-success pl-1"><i class="fas fa-arrow-up"></i><?php echo(number_format($recoveryIncrease)); ?></small>
     <?php } ?>
   </td>
   <td>
    <?php echo(number_format($value[$day_count]['deaths'])); ?>
    <?php if($deathIncrease != 0){ ?>
     <small class="text-danger pl-1"><i class="fas fa-arrow-up"></i><?php echo(number_format($deathIncrease)); ?></small>
   <?php } ?>
 </td>
 <td>
  <?php $recRate = ($value[$day_count]['deaths'] / $value[$day_count]['confirmed']) * 100; ?>
  <?php echo number_format((float)$recRate, 2, '.', '') . '%'; ?>
</td>
</tr>

<?php } ?>
</tbody>
</table>
</div>
<div class="col-xs-12 col-md-3">
  <div class="sticky-top">
    <div class="pt-2" style="height: 50vh;">
      <iframe src="https://ourworldindata.org/grapher/full-list-cumulative-total-tests-per-thousand" style="width: 100%; height: 400px;"></iframe>
    </div>
    <a class="twitter-timeline" data-width="100vw" data-height="50vh" data-dnt="true" data-theme="light" href="https://twitter.com/CDCgov?ref_src=twsrc%5Etfw">Tweets by CDCgov</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  </div>
</div>
</div>
</div>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container text-center">
   <span class="text-muted">Copyright &copy;2020, <a href="https://github.com/stojanovr"><i class="fab fa-github"></i> stojanovr</a></span>
 </div>
</footer>

<script type="text/javascript">
  function t() {
    document.getElementById('time').innerHTML = new Date();
  }
  t();
  window.setInterval(t, 1000);
</script>

</body>
</html>