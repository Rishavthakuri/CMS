


<?php

function redirect($location)
{
     header("Location:" . $location);
     exit;

}


function ifItIsMethod($method=null)
{
if($_SERVER['REQUEST_METHOD'] ==strtoupper($method))
{
    return true;
}
return false;
}


function isLoggedIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }
    return false;
}


function checkIfUserIsLoggedInAndRedirect($redirectLocation=null)
{

    if(isLoggedIn()){

        redirect($redirectLocation);
    }

}

function escape($string)
{
    global  $connection;
    mysqli_real_escape_string($connection,trim($string));
}




function ConfirmQuery($result)
{
    global $connection;
    if(!$result){
        die('Query failed .'.mysqli_error($connection));
    }
    return $result;
}
?>
<?php
function users_online()
{
    if(isset($_GET['onlineusers']))
    {


        global $connection;
        if (!$connection)
        {
            session_start();
            include("../includes/db.php");
            $session = session_id();
            $time = time();
            $time_out_in_seconds = 30;
            $time_out = $time - $time_out_in_seconds;

            $query = "SELECT * FROM users_online WHERE session='$session'";
            $send_query = mysqli_query($connection, $query);
            $count = mysqli_num_rows($send_query);
            if ($count == NULL) {
                mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");
            } else {
                mysqli_query($connection, "UPDATE users_online SET time='$time' WHERE session='$session'");
            }

            $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
            echo $count_user = mysqli_num_rows($users_online_query);

        }

    }//get request isset
}
users_online();

function insert_categories()
{
    if (isset($_POST['submit'])) {
        global $connection;
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo " This Field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {
                die('Query failed' . mysqli_error($connection));
            }
        }
    }
}


function FindAllCatgories(){
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_categories ))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo"<tr>";
        echo"<td>{$cat_id}</td>";
        echo"<td>{$cat_title}</td>";
        echo"<td><a class='btn btn-danger' href='categories.php?delete={$cat_id}'</a>Delete </td>";
        echo"<td><a class='btn btn-primary' href='categories.php?edit={$cat_id}'</a>Update </td>";
        echo"</tr>";

    }
}


function DeleteCategories(){
    if(isset($_GET['delete'])){
        global $connection;
        $the_cat_id = $_GET['delete'];
        $query= "DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $delete_query=mysqli_query($connection,$query);
        header("Location:categories.php");

    }
}




function is_admin($username = '')
{
    global $connection;
    $query= "SELECT user_role FROM users where  username= '$username' ";
    $result=mysqli_query($connection,$query);
    ConfirmQuery($result);
    $row=mysqli_fetch_array($result);
    if($row['user_role']=='admin')
    {
        return true;
    }
    else{
        return false;
    }
}


function username_exists($username =''){

    global $connection;
    $query= "SELECT username FROM users where  username= '$username' ";
    $result=mysqli_query($connection,$query);
    ConfirmQuery($result);
    if(mysqli_num_rows($result) > 0)
    {
        return true;
    }
    else{
        return false;
    }
}



function email_exists($email){

    global $connection;
    $query= "SELECT user_email FROM users where  user_email= '$email' ";
    $result=mysqli_query($connection,$query);
    ConfirmQuery($result);
    if(mysqli_num_rows($result) > 0)
    {
        return true;
    }
    else{
        return false;
    }
}

function register_user($username,$email,$password){
    global  $connection;
//    $username=$_POST['username'];
//    $email=$_POST['email'];
//    $password=$_POST['password'];


    $username=mysqli_real_escape_string($connection,$username);
    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);

    $query= "SELECT randSalt  FROM users";
    $select_randSalt_query=mysqli_query($connection,$query);
    if(!$select_randSalt_query){
        die("Query Failed".mysqli_error($connection));
    }
    $row = mysqli_fetch_array($select_randSalt_query);


    $password= crypt($password,'$2a$07$usesomesillystringforsalt$');


    $query="INSERT INTO users(username,user_email,user_password,user_role) ";
    $query.="VALUES('{$username}','{$email}','{$password}','subscriber' ) ";
    $register_user_query=mysqli_query($connection,$query);
    ConfirmQuery($register_user_query);

//    $message= "Your Regsiration has been submitted";

}


function login_user($username,$password){
//     session_start();
    global $connection;
    $username=trim($username);
     $password=trim($password);



    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);

    $query= "SELECT * FROM users WHERE  username='{$username}' ";
    $select_user_query=mysqli_query($connection,$query);
    if(!$select_user_query){
        die("Query failed".mysqli_error($connection));

    }

    while($row=mysqli_fetch_array($select_user_query)){
        $db_user_id= $row['user_id'];
        $db_username= $row['username'];
        $db_user_password= $row['user_password'];
        $db_user_firstname= $row['user_firstname'];
        $db_user_lastname= $row['user_lastname'];
        $db_user_role= $row['user_role'];
          $password=crypt($password,$db_user_password);

    if($username!==$db_username && $password !==$db_user_password)
    {
        header("Location: ../cms/index.php");
    }
    else if ($username ==$db_username && $password ==$db_user_password )
//   && $db_user_role=='admin'
    {
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        redirect("../cms/admin");
//        header("Location: ../cms/admin");
    }

    else
    {

        return false;
//        redirect("../index.php");

//        header("Location: ../cms/index.php");

    }
    }
    return true;
}



?>

