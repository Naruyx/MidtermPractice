<?php
    require_once('database.php');

    $state = 'CA';

    $query = "SELECT firstName, lastName, city FROM customers WHERE state = ? order by lastName";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $state);
    $stmt->execute();

    $stmt->store_result();
 
    $stmt->bind_result($firstName, $lastName, $city);
  
?>

    <!-- header information comes from include file -->
<head>
    <link rel="stylesheet" type="text/css" href="lab7.css" />
</head>    
    
<body>
    <div id ="page">
        <div id="header">
            <h1>Customers</h1>
        </div>
        
        <div id="main">
            
            <h1>Customer List</h1>
            
            <div id="content">
                <!-- display a list of orders -->
                
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                    </tr>
                    <?php while ($stmt ->fetch()) { ?>
                    <tr>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $city; ?></td>
                    </tr>
                    <!-- result set is available -->
                    
                    <?php }
                    
        $stmt ->free_result();
        $conn ->close();?>
                </table>
                <br>
            </div>
        </div>
        <div id="footer">
            <p>&copy; <?php echo date ("Y"); ?> Columbus State University</p>
        </div>
    </div>
</body>    