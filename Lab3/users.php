<html>
    <head>
        <title>Users Tables</title>
    </head>
    
    <body>
        
        <header> <h1>Users Tables </h1></header>
        
        <table border = "1">
            <tr> 
                <th> Users </th>
                <th> Usernames</th>
                <th> Remove? </th>
            </tr>
            
            <tr>>
                
                <?php 
                $server = "mysql-server-1";
                $username = "aa322";
                $password = "abcaa322354";
                $database = "aa322";
                
                $db = new mysqli($server, $username, $password, $database);
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }
                return $db;   
                
                $sql = ("SELECT * FROM cw2users"); 
                
                $result=mysql_query($sql) or die($sql."<tr>\n".mysql_error());
                while($row = mysql_fetch_array($result)) { 
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $id = $_POST['userid'];
                    ?>
                
                <tr>
                    <td> <?= $name ?></td>
                    <td> <?= $username ?></td>
                    <td> <button id = "del_<?=$id?>"> Delete </button></td>
                </tr>

                <?php
                }
            ?>
        </table>
    </body>
</html>