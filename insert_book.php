
<?php
//require some tools 
require './utils/utils.php';
require_once './db.php';
    
    try {
        $sql = "SELECT * FROM catalogs ";
        $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
        
    } catch (PDOException $e) {
       
    }


  //check post method is post and must be register button submit 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

            $request_list = [];
            $values = [];
            //check  null and request is correct or not
            foreach($_POST as $key => $req) {
              
                if(!empty($req) && isset($req)) {
                   $request_list[$key]  =$req;
                   array_push($values,$req);
                }
            }  

            //if request count not equal form field will redirect current page
            if(count($values) < 4) {
              JsAlert("please fill all field" );
              redirect('newbook.html');
            }  
           
            try {
                 //insert 
                $sql = "INSERT INTO catalogs  VALUES (?,?,?,?)";
                $stmt= $pdo->prepare($sql)->execute($values);
                JsAlert('insert succes!!!');
                

            } catch (PDOException $e) {
    
                //error exception
                $err = $e->getMessage();
                JsAlert($err);
                redirect('newbook.html');
            }

    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
    <style>

    .container {
       width: 100%;
       margin-bottom: 20px;
    }
    h1  {
        text-align: center;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        margin:0 auto;
        width: 80%;
        /* width: 80%; */
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>
<body>
    <div>
        <button onclick="window.location='newbook.html'">Back</button>

        <h1 >Book Entry Results</h1>
        
        <div class="container">
            <table>
                <tr>
                    <th>ISBN</th>
                    <th>author</th>
                    <th>Title</th>
                    <th>Price</th>
                </tr>
                <?php
                    if($rows > 0) {
                ?>
                <tr>
                    <?php 
                        foreach($rows as $row)  {
                    ?>
        
                <td>
                    <?php echo $row->isbn; ?>
                </td>
    
                <td>
                    <?php echo $row->author; ?>
                </td>
    
                <td>
                    <?php echo $row->title; ?>
                </td>
    
                <td>
                    <?php echo $row->price; ?>
                </td>
            
                </tr>
                <?php 
                        }
            
                    }
                ?>
            </table>
        </div>
    </div>

  
  
   <?php
    
    // TODO 1: Create short variable names.


    // TODO 2: Check and filter data coming from the user.


    // TODO 3: Setup a connection to the appropriate database.


    // TODO 4: Query the database.


    // TODO 5: Display the feedback back to user.


    // TODO 6: Disconnecting from the database.


    ?>



</body>

</html>