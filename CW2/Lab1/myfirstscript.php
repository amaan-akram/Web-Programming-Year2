<?php 

$target_dir = "/home/cs2/aa322/public_html/CW2/uploads/"; 
$filename = basename($_FILES["doc"]["name"]); 
$target_file = $target_dir . $filename; 
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 


// Check if image file is a valid image 
if(isset($_POST["Submit"])) { 
    if($_FILES["doc"]["size"] < 500000) { 
        if($imageFileType=='gif' || $imageFileType=='jpg') {
            if(getimagesize($_FILES["doc"]["tmp_name"]) !== false) { 
                
                // Create file if it doesn't exist 
                if (!file_exists($target_file)) { 
                    if(move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) { 
                        
                        echo "<h2>The file <a href=\"http://www2.macs.hw.ac.uk/~aa322/CW2/uploads/$filename\">$filename</a> has been uploaded by $user!</h2>";   
                    } 
                    
                    else { 
                        echo "Sorry, there was an error uploading the file.";
                    }
                } 
                
                else { 
                    
                    unlink($target_file) or die("Couldn't delete file"); 
                    
                    if(move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) { 
                        echo '<h2>The file <a href="http://www2.macs.hw.ac.uk/~aa322/CW2/uploads/'.$filename.'">'.$filename.'</a> has been uploaded by '.$_POST["user"].'!</h2>'; 
                    } 
                    else { 
                        echo "Sorry, there was an error uploading the file."; 
                    }
                }
            }
        }
        
        else if($imageFileType=='docx' || $imageFileType=='doc') { 
            // Create file if it doesn't exist 
            if (!file_exists($target_file)) { 
                if(move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) { 
                    echo "<h2>The file <a href=\"http://www2.macs.hw.ac.uk/~aa322/CW2/uploads/$filename\">$filename</a> has been uploaded by $user!</h2>"; 
                } 
                else { 
                    echo "Sorry, there was an error uploading the file."; 
                }
            } 
            else { 
                unlink($target_file) or die("Couldn't delete file"); 
                if(move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) { 
                    echo '<h2>The file <a href="http://www2.macs.hw.ac.uk/~aa322/CW2/uploads/'.$filename.'">'.$filename.'</a> has been uploaded by '.$_POST["user"].'!</h2>'; 
                } 
                
                else { 
                    echo "Sorry, there was an error uploading the file."; 
                }
            }
        }
    }
} 




?>

<?php
    // If there are photos, loop across photos and show them 
if(sizeof($photos)>0) { 
    foreach($photos as $photo) { 
        echo "<p>Photo: $photo <input type='checkbox' name='picker' value='$photoID'>"; 
    }
}

?>


<html>

<body>
    <h4> Submit Your Photo and Name </h4>
    <form action="http://www2.macs.hw.ac.uk/~aa322/CW2/myfirstscript.php" method="post" enctype="multipart/form-data">
        <p>File <input type="file" name="doc">
        <p>Name <input name="user"> <input type="submit" name="Submit">
    </form>
</body>

</html>

<?php 
//DATABASE CODE: 
/* 
$db_connected = connectDB('yourDatabase'); 
$sql = "SELECT * FROM users WHERE username='".$_POST["user"]."'"; 
$result=mysql_query($sql) or die($sql."<br>\n".mysql_error()); 
while($row = mysql_fetch_array($result)) { 
    echo "Hello "; 
    foreach($row as $col) echo " $col "; echo "<br>\n"; 
} 
exit; 
function connectDB($database='') { 
    global $db, $mysqluser, $mysqlpwd; 
    // initiate a database connection by giving a database name, username and password: 
    if($database=='') $database = 'yourDatabase'; 
    if($mysqluser=='') $mysqluser = 'yourUsername'; 
    if(!isset($mysqlpwd)) $mysqlpwd = "yourPassword"; 
    $db = new db_connection("mysql"); 
    if($db->connect("mysql-server-1.macs.hw.ac.uk", "", $mysqluser, $mysqlpwd, 0,$database)) return true; 
    else return false; 
} 
class db_connection { 
    var $connection; 
    // create a new connection object 
    function db_connection($type="") { } 
    // connect to the database server 
    function connect($host, $port, $login, $password, $pconnect, $database="") { 
        if($port) { $host .= ":$port"; } 
        if( !($this->connection = @mysql_connect($host, $login, $password)) ) return false; 
        if($database) if(!@mysql_select_db($database, $this->connection)) return false; 
        return true; 
    } 
    function query($query) { 
        return mysql_query($query, $this->connection); 
    } 
    function error() { 
        return mysql_error($this->connection); 
    } 
} 
*/ 
?>