<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Di chuyển file tải lên vào thư mục đích
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên.";

    // Resize ảnh và lưu lại với tên mới (hoặc ghi đè)
    $resizedFile = $target_dir . "resized_" . basename($_FILES["fileToUpload"]["name"]);
    $resizedImage = resizeImage($target_file, 200, 200);
    imagejpeg($resizedImage, $resizedFile);

    echo "Ảnh resized được lưu tại: $resizedFile";

    // (Tùy chọn) Xóa ảnh gốc nếu không cần thiết
    // unlink($target_file);
} else {
    echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
}

function resizeImage($file, $w, $h, $crop = FALSE) {
    $info = getimagesize($file);
    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($file);
            break;
        case 'image/png':
            $src = imagecreatefrompng($file);
            break;
        case 'image/gif':
            $src = imagecreatefromgif($file);
            break;
        default:
            die("Định dạng ảnh không được hỗ trợ.");
    }

    list($width, $height) = $info;
    if ($width == 0 || $height == 0) {
        die("Tệp không hợp lệ hoặc không thể đọc kích thước ảnh.");
    }

    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width - ($width * abs($r - $w / $h)));
        } else {
            $height = ceil($height - ($height * abs($r - $w / $h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w / $h > $r) {
            $newwidth = $h * $r;
            $newheight = $h;
        } else {
            $newheight = $w / $r;
            $newwidth = $w;
        }
    }

    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    return $dst;
}
?>
