<?php
class Upload {

    public static $dir;
    private $FILES;
    private $allowedType = array("jpg", "gif", "bmp", "jpeg", "png", "pps","doc","docx","xls","pdf","txt","rar","zip");
    private $errors;
    private $errorsMessage = array(
        1 => "Размер загружаемого файла превышает допустимый размер.",
        2 => "Размер загружаемого файла превышает допустимый размер.",
        3 => "Файл был загружен лишь частично.",
        4 => "Файл не был загружен.",
        6 => "Файл не был загружен.",
        7 => "Файл не был загружен.",
        8 => "Файл не был загружен.");

    /**
     * Определение загружаемого каталога в конструкторе
     * @param $dir Имя директории
     */
    function __construct($dir) {
        self::$dir = $dir;
    }

    /**
     * Определение загружаемого каталога с помощью функции
     * @param $dir Имя директории
     */
    function setDir($dir='') {
        self::$dir = $dir;
    }

    /**
     * Переприсвоение списка разрешенных форматов данных
     * @param $type array/string Список форматов
     */
    function setAllowedType($type) {
        if (is_array($type)) {
            $this->allowedType = $type;
        } else {
            $this->allowedType = explode(",", $type);
        }
    }

    /**
     * Добавление к уже существующим форматам новых типов данных
     * @param $type array/string Список форматов
     * @return array|bool
     */
    function addAllowedType($type) {
        if (is_array($type)) {
            foreach($type as $value)
                $this->allowedType[]=$value;
            return $this->allowedType;
        }
        else return false;
    }


    /**
     * Загрузка файла
     * @param $tmpName string Временное имя
     * @param $name Имя
     * @return bool|string Возвращает имя загруженного файла
     */
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

    /**
     * Основной метод загрузки файлов
     * @param $FILES array Массив с данными о файлах
     * @return bool|string Возвращает выполненый метод загрузки
     */
    function uploads($FILES) {
        $this->FILES = $FILES;
        if (!is_array($this->FILES['name'])) {
            return $this->uploadsOneFile();
        } else {
            return $this->uploadsManyFiles();
        }
    }

    /**
     * Загрузка одного файла
     * @return bool|string
     */
    function uploadsOneFile() {

        if ($this->FILES['error'] != 0) {
            $this->errors[] = $this->errorsMessage[$this->FILES['error']];
            return false;
        }

        $result = $this->upload($this->FILES['tmp_name'], $this->FILES['name']);
        if ($result != false) {
            return $result;
        }
        return false;
    }

    /**
     * Загрузка нескольких файлов
     * @return bool
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
     * Проверка расширение файла на допустимость его к загрузке
     * @param $fileName string Имя файла
     * @return bool Возвращает успешность выполнения
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
     * Присвоение файлу рандомное имя
     * @param $name string Имя файла
     * @return string
     */
    function substitute($name) {
        $nameEnd = pathinfo($name, PATHINFO_EXTENSION);
        return mt_rand().'.'.$nameEnd;
    }

    /**
     * Возвращает информацию о файле
     * @return mixed
     */
    function getFilesInfo() {
        return $this->FILES;
    }

    /**
     * Возвращает ошибки
     * @return mixed
     */
    public function errors() {
        return $this->errors;
    }

}
?>