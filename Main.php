<head>
<link rel="stylesheet" type="text/css" href="Class.css">
</head>
<?php

echo "<h1>หน้าหลัก</h1>";
echo "<p>ตารางประจำเดือน</p>";
echo "<select>
		<option value=\"มกราคม\">มกราคม</option>
		<option value=\"กุมภาพันธ์\">กุมภาพันธ์</option>
		<option value=\"มีนาคม\">มีนาคม</option>
		<option value=\"เมษายน\">เมษายน</option>
		<option value=\"พฤษภาคม\">พฤษภาคม</option>
		<option value=\"มิถุนายน\">มิถุนายน</option>
		<option value=\"กรกฎาคม\">กรกฎาคม</option>
		<option value=\"สิงหาคม\">สิงหาคม</option>
		<option value=\"กันยายน\">กันยายน</option>
		<option value=\"ตุลาคม\">ตุลาคม</option>
		<option value=\"พฤศจิกายน\">พฤศจิกายน</option>
		<option value=\"ธันวาคม\">ธันวาคม</option>
	  </select>";
echo "<select>
		<option value=\"2557\">2557</option>
		<option value=\"2558\">2558</option>
		<option value=\"2559\">2559</option>
		<option value=\"2560\">2560</option>
	  </select>";
echo "<button onclick=\"showTable()\">ยืนยัน</button>";
echo "<table id=\"table\" style=\"display:none\">
	  <tr>
		<th>วันที่</th>
		<th>รายการ</th>
		<th>เลขที่บัญชี</th>
		<th>เดบิต</th>
		<th>เครดิต</th>
		<th></th>
	  </tr><tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td><button onclick=\"location.href='http://127.0.0.1/SF321/EditData.php';\">แก้ไข</button><button onclick=\"deleteData()\">ลบ</button></td>
	  </tr>
	  </table>
	  <script>
	  function deleteData() {
		if (confirm(\"ยืนยันการลบรายการ?\") == true) {
			alert(\"ลบรายการสำเร็จ\");
		} else {

		};
	  }
	  </script>";
echo "<script>
	  function showTable() {
		document.getElementById(\"table\").style.display=\"block\";
	  }
	  </script>";

?>
