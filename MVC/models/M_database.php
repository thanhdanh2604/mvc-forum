<?php

// Thư Viện Xử Lý Database
class DB_driver
{
    // Biến lưu trữ kết nối
    private $__conn;
    protected $table='';
    protected $key_id='';
    // Hàm Kết Nối
    function connect_db()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'intertu_qlhv') or die ('Lỗi kết nối');
    
            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }
     
    // Hàm Ngắt Kết Nối
    function dis_connect(){
        // do some thing
        if($this->__conn){
            mysqli_close($this->__conn);
        }
    }
     
    // Hàm Insert
    function insert($data){
       // Kết nối
        $this->connect_db();
    
        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
    
        // Lặp qua data
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".addslashes($value)."'";
        }
    
        // Vì sau vòng lặp các biến $field_list và $value_list sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'INSERT INTO '.$this->table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
    
        return mysqli_query($this->__conn, $sql);
    }
     
    // Hàm Update
    function update($data, $id){
       // Kết nối
        $this->connect_db();
        $sql = '';
        // Lặp qua data
        foreach ($data as $key => $value){
            $sql .= "$key = '". addslashes($value)."',";
        }
    
        // Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
        $sql = 'UPDATE '.$this->table. ' SET '.trim($sql, ',').' WHERE '.$this->key_id.'='.$id;
    
        return mysqli_query($this->__conn, $sql);
    }
     
    // Hàm delete
    function remove($id){
          // Kết nối
        $this->connect_db();
    
        // Delete
        $sql = "DELETE FROM".$this->table."WHERE".$this->key_id.'='.$id;
        return mysqli_query($this->__conn, $sql);
    }
     
    // Hàm lấy danh sách t
    function get_list(){
        // Kết nối
        $this->connect_db();
        $sql = "SELECT * FROM ".$this->table;
        $result = mysqli_query($this->__conn, $sql);
    
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
    
        $return = array();
    
        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
    
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
    
        return $return;
    }
     
    // Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
    function get_row($id){
       // Kết nối
        $this->connect_db();
        $sql = "SELECT * FROM ".$this->table." WHERE ".$this->key_id."=". $id;
        $result = mysqli_query($this->__conn, $sql);
       if (!$result){
           die ('Câu truy vấn bị sai');
       }

       $row = mysqli_fetch_assoc($result);

       // Xóa kết quả khỏi bộ nhớ
       mysqli_free_result($result);

       if ($row){
           return $row;
       }
       return false;
    }
}
 ?>