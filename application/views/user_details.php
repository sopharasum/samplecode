
<!DOCTYPE html>
<html>
<head>
 <title>How to Get User IP, Browser & OS Details in Codeigniter</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
 <div class="container">
  <br />
  <h3 align="center">How to Get User IP, Browser & OS Details in Codeigniter</h3>
  <br />
  <div class="table-responsive">
   <table class="table table-bordered table-striped">
    <tr>
     <td><b>IP Address</b></td>
     <td><?php echo $ip_address; ?></td>
    </tr>
    <tr>
     <td><b>Operating System</b></td>
     <td><?php echo $os; ?></td>
    </tr>
    <tr>
     <td><b>Browser Details</b></td>
     <td><?php echo $browser . ' - ' . $browser_version; ?></td>
    </tr>
   </table>
  </div>
 </div>
</body>
</html>

