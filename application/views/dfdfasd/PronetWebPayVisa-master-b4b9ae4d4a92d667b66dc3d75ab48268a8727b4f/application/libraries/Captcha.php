<?php

class Captcha {

    private $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    private $finalChar;

    public function generateString() {
        $size = rand(4, 8);
        // echo $size;
        $temp = "";
        for ($i = 0; $i < $size; $i++) {
            $temp.= $this->chars[rand(0, strlen($this->chars) - 1)];
        }
        $this->finalChar = $temp;
        return $this->finalChar;
    }

    public function generateImage() {
        $im = imagecreatetruecolor(120, 40);
        $val = (string) $this->finalChar;
        $text_color = imagecolorallocate($im, 255, 255, 255);
		$background = imagecolorallocate($im, 10,10,10);
        imagestring($im, 15, 15, 15, $val, $text_color);
        imagejpeg($im, 'assets/uploadimg/captcha.jpg', 100);
        imagedestroy($im);
        echo "<img src='../assets/uploadimg/captcha.jpg'>";
    }

}

/* way to use */
/* $obj = new Captcha();
  $obj->generateString();
  $obj->generateImage();
  echo "<img src='captcha.jpg'>"; */
?>




