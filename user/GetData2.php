<?php
include("mySQL.php");
$mysql = new G_MYSQL;
$mysql->G_Connect();
$mysql->set_char_utf8();

if(isset($_POST['search']))
{
    //$valueid = $_POST['valueid'];
    $valueDepartment = $_POST['valueDepartment'];
    //$valueAssigneeName = $_POST['valueAssigneeName'];
    //$valueRecieveName = $_POST['valueRecieveName'];
    //$valueCategory = $_POST['valueCategory'];
    $valueDate1 = $_POST['valueDate1'];
    $valueDate2 = $_POST['valueDate2'];
  //  $ValueDateToAdd = $_POST['ValueDateToAdd'];
  //  $valueDebit = $_POST['valueDebit'];
    //$valueCredit = $_POST['valueCredit'];

    // search in all table columns
    // using concat mysql function
    // $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `fname`, `lname`, `age`) LIKE '%".$valueToSearch."%'" ;
    if ($valueDepartment == "unselected") {
      $query = "SELECT * FROM debit_credit WHERE `Date` LIKE '%$valueDate1%' AND `Date` LIKE '%$valueDate2%' ";
      $rs = $mysql->G_Execute($query);

        // $query = "SELECT * FROM book WHERE Date BETWEEN '" . $from_date . "' AND  '" . $to_date . "'ORDER by id DESC";

      $search_result = filterTable($query);
    } else if ($valueDate1 == "unselected" && $valueDate2 = "unselected") {
      $query = "SELECT * FROM debit_credit WHERE `Department`='$valueDepartment' ";
      $rs = $mysql->G_Execute($query);
      $search_result = filterTable($query);
    } else {
      $query = "SELECT * FROM debit_credit WHERE `Department`='$valueDepartment' AND `Date` LIKE '%$valueDate1%' AND `Date` LIKE '%$valueDate2%' ";
      $rs = $mysql->G_Execute($query);
      $search_result = filterTable($query);
    }


}
 else {
    $query = "SELECT *, CONVERT(Department USING utf8) FROM `debit_credit`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net", "b26366fb9f9e2a", "f0a52187", "acsm_c3fa0cb86725a7f");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}



?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>GetData</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<style>
.lef{
  text-align: center;
}
.left10{
  margin-left: 15px;
}
#head{
  margin-left: 150px;
}

</style>
        <!-- <link rel="stylesheet" type="text/css" href="Class.css"> -->
    </head>
    <body style="background-color:White">
        <div class="darkBlueBox pad center" >
          <br>
          <h1 class="lef">ระบบบัญชี</h1><br>
        </div>
        <div style="width: 60%" class="center lightBlueBox pad">

        </div>
        <form action="GetData2.php" method="post" >
<br>
<div id="head">
  <h2 class="left10">ตารางประจำเดือน</h2>
  <br>
          <table class="center">
            <tr>
              <td class="textRight">Date :
              </td>
              <td>
                <select name="valueDate1">
                		<option value="unselected">เดือน</option>
                    <option value="1">มกราคม</option>
                		<option value="2">กุมภาพันธ์</option>
                		<option value="3">มีนาคม</option>
                		<option value="4">เมษายน</option>
                		<option value="5">พฤษภาคม</option>
                		<option value="6">มิถุนายน</option>
                		<option value="7">กรกฎาคม</option>
                		<option value="8">สิงหาคม</option>
                		<option value="9">กันยายน</option>
                		<option value="10">ตุลาคม</option>
                		<option value="11">พฤศจิกายน</option>
                		<option value="12">ธันวาคม</option>
                </select>
                <select name="valueDate2">
                		<option value="unselected">ปี</option>
                		<option value="2014">2557</option>
                		<option value="2015">2558</option>
                		<option value="2016">2559</option>
                		<option value="2017">2560</option>
                </select>
              </td>
              <td rowspan="2" style="width: 85px"><input style="width: 90%; margin-left:10px;"  class="center darkBlueBox bold" type="submit" name="search" value="search">
              </td>
              <td rowspan="2" style="width: 85px"><input style="width: 90%; margin-left:10px;" class="darkBlueBox bold" type="submit" value="searchAll" >
              </td>
            </tr>
            <tr>
              <td>Department :
              </td>
              <td>
                  <select name="valueDepartment">
                  	<option value="unselected">แผนก</option>
                    <option value="อบต">อบต</option>
                    <option value="อบจ">อบจ</option>
                    <option value="เทศบาล">เทศบาล</option>
                  </select>
              </td>
            </tr>
          </table>
</div>
          <br><br>

            <table class="table">
                <tr class="thead-dark">
                  <th style="width: 20px" class="col">ID</th>
                  <th style="width: 85px" class="col">Date</th>
                  <th style="width: 120px" class="col">Department</th>
                  <th style="width: 120px" class="col">Category</th>
                  <th style="width: 85px" class="col">Debit</th>
                  <th style="width: 85px" class="col">Credit</th>
        					<th style="width: 30px" class="col">Edit</th>
                  <th style="width: 30px" class="col">Delete</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr class="border lightBlueBox">
                  <td class="border" name="id"><?php echo $row[0]?></td>
                  <td class="border"><?php echo $row[5]?></td>
                  <td class="border"><?php echo $row[1]?></td>
                  <td class="border"><?php echo $row[4]?></td>
                  <td class="border"><?php echo $row[7]?></td>
                  <td class="border"><?php echo $row[8]?></td>

                  <td class="border"><a href="EditData.php?id=<?php echo $row[0]?>">Edit</a></td>
                  <td class="border"><a href="DeleteData.php?id=<?php echo $row[0]?>">Delete</a></td>


                </tr>
                <?php endwhile;?>
            </table>
        </form>
        <a target="_blank" href="https://pdfcrowd.com/#convert_by_url" class="left30">Export to PDF</a>

    </body>
</html>
