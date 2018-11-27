 <meta charset="utf-8" />
 <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
 <script src="js/bootstrap-datepicker-custom.js"></script>
 <script src="js/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>

<?php include 'h.php'; ?>
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy/mm/dd',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("0");  //กำหนดเป็นวันปัจุบัน
        });
    </script>

 
