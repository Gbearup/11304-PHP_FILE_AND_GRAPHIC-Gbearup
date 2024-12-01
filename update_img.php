<?php
include_once "function.php";

$id=$_POST['id'];

$row=find('imgs',$id);
//dd($_POST);
dd($row);
$row['desc']=$_POST['desc'];

if(isset($_FILES['filename'])){
    if($_FILES['filename']['error']==0){
        unlink("./files/".$row['filename']);
        $row['filename']=time() . $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'],"./files/".$row['filename']);
        save('imgs',$row);
    }
}

header("location:manage.php");
?>

<?php
/**
 * 1.接收來自 POST 請求的資料：
 *   這行程式碼從 HTTP POST 請求中獲取 id 參數的值，
 *   這通常是表單中傳送的資料，可能是用來識別某個圖片的 ID。
 * 2.從資料庫查詢圖片資料：
 *   這行程式碼呼叫了一個名為 find 的函式，
 *   這個函式會從 imgs 表格中根據圖片 ID 查找對應的圖片資料。
 *   find 函式的實現應該在 function.php 裡面，
 *   這裡我們假設它會返回與指定 ID 相關的資料列。
 * 3.調試用的 dd() 函式：
 *   這行程式碼調用 dd 函式來檢查 $row 變數的內容。
 *   dd 通常是 "Dump and Die" 的縮寫，
 *   用於顯示變數的內容並終止程式的執行。這是開發過程中的調試工具。
 * 4.更新圖片描述：
 *   這行程式碼將表單中傳送的圖片描述（desc）更新到 $row 陣列中的 desc 欄位。
 * 5.檢查是否有上傳新的檔案：這段程式碼檢查是否有上傳檔案（filename），並且確保沒有錯誤
 *   如果上傳檔案沒有錯誤:（$_FILES['filename']['error'] == 0）。
 *   則刪除舊的圖片檔案：unlink("./files/" . $row['filename']);
 *   生成新的檔案名稱，將檔案名稱設為當前時間戳加上上傳檔案的原始名稱：
 *      $row['filename'] = time() . $_FILES['filename']['name'];
 *   將上傳的檔案移動到伺服器指定的目錄中：
 *      move_uploaded_file($_FILES['filename']['tmp_name'], "./files/" . $row['filename']);
 *   更新資料庫中的 imgs 表格，保存新的圖片資料：save('imgs', $row);
 * 6.重新導向：
 *   最後，程式會將使用者導向到 manage.php 頁面
 */

?>