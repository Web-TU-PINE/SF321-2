<?php
include("mySQL.php");
$mysql = new G_MYSQL;
$mysql->G_Connect();
$mysql->set_char_utf8();

if(isset($_POST['search']))
{
    //$valueid = $_POST['valueid'];
    //$valueDepartment = $_POST['valueDepartment'];
    //$valueAssigneeName = $_POST['valueAssigneeName'];
    //$valueRecieveName = $_POST['valueRecieveName'];
    //$valueCategory = $_POST['valueCategory'];
    $valueDate = $_POST['valueDate'];
  //  $ValueDateToAdd = $_POST['ValueDateToAdd'];
  //  $valueDebit = $_POST['valueDebit'];
    //$valueCredit = $_POST['valueCredit'];

    // search in all table columns
    // using concat mysql function
    // $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `fname`, `lname`, `age`) LIKE '%".$valueToSearch."%'" ;
    $query = "SELECT * FROM debit_credit WHERE `Date`='$valueDate' ";
    $rs = $mysql->G_Execute($query);

      // $query = "SELECT * FROM book WHERE Date BETWEEN '" . $from_date . "' AND  '" . $to_date . "'ORDER by id DESC";

    $search_result = filterTable($query);


}
 else {
    $query = "SELECT * FROM `debit_credit`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("testsf321.mysql.database.azure.com", "sf321group@testsf321", "Tae12345", "test");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>GetABook</title>
        <link rel="stylesheet" type="text/css" href="Class.css">
    </head>
    <body style="background-color: #60BD88">
        <div class="darkBlueBox pad center">
          <h1 class="left10">ระบบบัญชี</h1><br>
        </div>
        <div style="width: 60%" class="center lightBlueBox pad">
          <h2>ตารางประจำวัน</h2>
        </div>
        <form action="GetData.php" method="post" >

          <br><br>

          <table class="center">
            <tr>
              <td>Date : <input class="center" type="date" name="valueDate" placeholder="Date">
              </td>
              <td style="width: 85px"><input style="width: 90%" class="center darkBlueBox bold" type="submit" name="search" value="search">
              </td>
              <td style="width: 85px"><input style="width: 90%" class="darkBlueBox bold" type="submit" value="searchAll" >
              </td>
            </tr>
          </table>

          <br><br>

            <table class="border center">
                <tr class="border darkBlueBox">
                  <th style="width: 20px" class="border">ID</th>
                  <th style="width: 85px" class="border">Date</th>
                  <th style="width: 120px" class="border">Department</th>
                  <th style="width: 120px" class="border">Category</th>
                  <th style="width: 85px" class="border">Debit</th>
                  <th style="width: 85px" class="border">Credit</th>
        					<th style="width: 30px" class="border">Edit</th>
                  <th style="width: 30px" class="border">Delete</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr class="border lightBlueBox">
                  <td class="border"><?php echo $row[0]?></td>
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

    </body>
</html>
