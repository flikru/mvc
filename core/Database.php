<?php
class Database extends PDO
{
  public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
    }

   public function insert($table, $data)
    {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

         public function update($table, $data, $where)
        {
             ksort($data);

              $fieldDetails = null;
            foreach($data as $key=> $value) {
                     $fieldDetails .= "`$key`=:$key,";
            }
            $fieldDetails = rtrim($fieldDetails, ',');

            $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

            foreach ($data as $key => $value) {
                $sth->bindValue(":$key", $value);
        }

        $sth->execute();
        }

        public function select($table,$array,$where=null){
            $fieldNames = '`'.implode('`, `', array_keys($array)).'`';
            $query="SELECT $fieldNames FROM $table";
            if($where!=null)
                $query="SELECT $fieldNames FROM $table WHERE $where";
            $query=$query.';';
            $sth = $this->prepare($query);
            $sth->execute();
        }

        public function delete($table,$where){
            $query="DELETE FROM $table WHERE $where;";
            $sth = $this->prepare($query);
            $sth->execute();
        }


}
?>