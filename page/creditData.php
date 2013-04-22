<?php
    $sql = "
        select
            id,
            ownerName,
            accountNumber,
            validYear,
            blz,
            bankName
        from
            bankingdetails
    ";

    if(!IsAdmin()) {
        $sql.="
            where
                user = ".$_SESSION['loginData']['id'].";
        ";
    }
    
    $result = mysql_query($sql)
        or die('Failed to execute query: '.  mysql_error());
?>

<div id="myTabContent" class="tab-content">
  <div class="tab-pane active in" id="login">
    <form class="form-horizontal" action='' method="POST">
      <fieldset>
        <div id="legend">
          <legend class="">Kreditdaten</legend>
          <table class="table table-striped">
              <th>
                <td>Id</td>
                <td>Besitzer</td>
                <td>Kontonummer</td>
                <td>Gültigkeit</td>
                <td>Bank</td>
                <td>Bankleitzahl</td>
              </th>
              <?php
              while($row = mysql_fetch_assoc($result)) {
                echo '<tr>';
                echo '    <td></td>';
                echo '    <td>'.$row['id'].'</td>';
                echo '    <td>'.$row['ownerName'].'</td>';
                echo '    <td>'.$row['accountNumber'].'</td>';
                echo '    <td>'.$row['validYear'].'</td>';
                echo '    <td>'.$row['bankName'].'</td>';
                echo '    <td>'.$row['blz'].'</td>';
                echo '</tr>';
              }
              ?>
          </table>
        </div>
      </fieldset>
    </form>                
  </div>
</div>