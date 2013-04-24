<?php
class Upload {

    public static $dir;
    private $FILES;
    private $allowedType = array("jpg", "gif", "bmp", "jpeg", "png", "pps","doc","docx","xls","pdf","txt","rar","zip");
    private $errors;
    private $errorsMessage = array(1 => "Размер загружаемого файла превышает допустимый размер.",
        2 => "Размер загружаемого файла превышает допустимый размер.",
        3 => "Файл был загружен лишь частично.",
        4 => "Файл не был загружен.",
        6 => "Файл не был загружен.",
        7 => "Файл не был загружен.",
        8 => "Файл не был загружен.");

    function __construct($dir) {
        self::$dir = $dir;
    }


    function setDir($dir='') {
        self::$dir = $dir;
    }


    function setAllowedType($type) {
        if (is_array($type)) {
            $this->allowedType = $type;
        } else {
            $this->allowedType = explode(",", $type);
        }
    }

    function addAllowedType($type) {
        if (is_array($type)) {
            foreach($type as $value)
                $this->allowedType[]=$value;
            return $this->allowedType;
        }
        else return false;
    }



    private function upload($tmpName, $name) {
        $name = $this->substitute($name);

        if ($this->typeChecking($name))
            if (move_uploaded_file($tmpName, self::$dir . $name)) {
                return $name;
            } else {
                return false;
            }
        return false;
    }

    function uploads($FILES) {
        $this->FILES = $FILES;
        if (!is_array($this->FILES['name'])) {
            return $this->uploadsOneFile();
        } else {
            return $this->uploadsManyFiles();
        }
    }

    /**
     * загрузка одного файла
     */
    function uploadsOneFile() {

        if ($this->FILES['error'] != 0) {
            $this->errors[] = $this->errorsMessage[$this->FILES['error']];
            return false;
        }

        $result = $this->upload($this->FILES['tmp_name'], $this->FILES['name']);
        if ($result != false) {
            return true;
        }
        return false;
    }

    /**
     * загрузка нескольких файлов
     */
    function uploadsManyFiles() {
        $coutFiles = count($this->FILES['name']);
        for ($i = 0; $i < $coutFiles; $i++) {
            if ($this->FILES['error'][$i] == 0) {
                $result = $this->upload($this->FILES['tmp_name'][$i], $this->FILES['name'][$i]);

                if ($result != false) {

                } else {
                    $this->errors[] = $this->FILES['name'];
                }
            } else {
                $this->errors[] = $this->errorsMessage[$this->FILES['error']];
            }
        }

        return true;
    }

    /**
     * проверяем, разрешен ли данный файл к загрузке
     */
    function typeChecking($fileName) {
        $nameEnd = pathinfo($fileName, PATHINFO_EXTENSION);
        if (in_array($nameEnd, $this->allowedType)) {
            return true;
        } else {
            $this->errors[] = "Файлы с расширением (<b>{$fileName}</b>) не разрешенны к загрузке.";
        }
        return false;
    }

    /**
     * ищет в каталоге файлы с таким же названием дописывает номер(равный количеству файлов с таким названием) в конец
     */
    function substitute($name) {
        $nameEnd = pathinfo($name, PATHINFO_EXTENSION);
        return mt_rand().'.'.$nameEnd;
    }

    /**
     * возвращаем информацию о файле
     */
    function getFilesInfo() {
        return $this->FILES;
    }

    /**
     * возвращаем ошибки
     */
    public function errors() {
        return $this->errors;
    }

}
?>