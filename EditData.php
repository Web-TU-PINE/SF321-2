<head>
<link rel="stylesheet" type="text/css" href="Class.css">
</head>
<?php

echo "<button onclick=\"location.href='http://127.0.0.1/SF321/Main.php';\">กลับ</button><h1>หน้าหลัก</h1>";
echo "<p class=\"top40\"><span class=\"redBox\">แก้ไขรายการ</span></p>";
echo "<form class=\"top10\">
		 <input type=\"text\" id=\"detail\" value=\"รายละเอียด\"><br>
		 <input type=\"text\" id=\"amount\" value=\"จำนวนเงิน(บาท)\">
		 <p>วันที่บันทึกบัญชี<input type=\"date\" id=\"date\"><input type=\"radio\" name=\"type\" value=\"debit\" checked> Debit<input type=\"radio\" name=\"type\" value=\"credit\"> Credit</p>
		 <input class=\"redBox\" type=\"submit\" value=\"ยืนยัน\" onclick=\"save()\"><input class=\"darkBlueBox\" type=\"reset\" value=\"ยกเลิก\">
	  </form>
	  <script>
	  function save() {
		alert(\"แก้ไขรายการสำเร็จ\");
	  }
	  </script>";

?>
