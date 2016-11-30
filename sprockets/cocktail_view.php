<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:cocktails_list.php');
}


$sql = "select * from Cocktails where CocktailID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $Name = stripslashes($row['Name']);
        $Ingredients = stripslashes($row['Ingredients']);
        $Descrption= stripslashes($row['Descrption']);
        $Category= stripslashes($row['Category']);
        $Price= stripslashes($row['Price']);
        $title = "Title Page for " . $Name;
        $pageID = $Name;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This cocktail does not exist</p>';
}

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it

    echo '<p>';     
    echo 'Name: <b>' . $Name . '</b><br /> ';
    echo 'Ingredients: <b>' . $Ingredients . '</b><br /> ';
    echo 'Description: <b>' . $Descrption . '</b><br /> ';
    echo 'Category: <b>' . $Category . '</b><br /> ';
    echo 'Price: <b>' . $Price . '</b><br /> ';
       
    echo '<img src="uploads/cocktail' . $id . '.jpg" />';
    
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="cocktails_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>