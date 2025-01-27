<?php
    class Database {
        function connect(){
            //establish connection
            $conn = mysqli_connect('localhost', 'root', '', 'romanteaco');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            return $conn;
        }

        //function for displaying data
        function select($table, $column, $condition) {
            $conn = $this->connect();
            $sql = "SELECT ".$column." FROM ".$table." WHERE ".$condition;
            $result = $conn->query($sql);
            $conn->close();
            return $result;
        }

        function selectOrder($table, $column, $condition, $order) {
            $conn = $this->connect();
            $sql = "SELECT ".$column." FROM ".$table." WHERE ".$condition." ORDER BY ".$order;
            $result = $conn->query($sql);
            $conn->close();
            return $result;
        }

        function insert($table, $column, $values){
            $conn = $this->connect();
            $sql = "INSERT INTO ".$table." (".$column.") VALUES (".$values.")";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
            $conn->close();
        }

        function update($table, $updateValue, $condition){
            $conn = $this->connect();
            $sql = "UPDATE ".$table." SET ".$updateValue." WHERE ".$condition;
            if ($conn->query($sql) !== TRUE) {
                echo "Error updating record: " . $conn->error;
            }
            $conn->close();
        }

        function delete($table, $condition){
            $conn = $this->connect();
            $sql = "DELETE FROM ".$table." WHERE ".$condition;
            if ($conn->query($sql) !== TRUE) {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();
        }

        function sql($query){
            $conn = $this->connect();
            $result = $conn->query($query);
            $conn->close();
            return $result;
        }
    }
    
?>