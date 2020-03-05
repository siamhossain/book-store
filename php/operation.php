<?php 

require_once("db.php");
require_once("component.php");

$con = Createdb();

if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}


function createData(){
    $bookname = textboxValue("book_name");
    $bookpublisher = textboxValue("book_publisher");
    $bookprice = textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice){

        $sql="INSERT INTO books(book_name,book_publisher,book_price)
            VALUES('$bookname','$bookpublisher','$bookprice')";
        
        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }
    }else{
        TextNode("error", "Provide data in the textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

function getData(){
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result)>0){
        return $result;
    }
}

function UpdateData(){
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name"); 
    $bookpublisher = textboxValue("book_publisher"); 
    $bookprice = textboxValue("book_price"); 

    if($bookname && $bookpublisher && $bookprice){
        $sql = "
            UPDATE books SET book_name='$bookname', book_publisher = '$bookpublisher', book_price = '$bookprice' WHERE id='$bookid';
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data successfully Updated");
        }else{
            TextNode("error", "Enable to Update data");

        }
    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }
}

function deleteRecord(){
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM books WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success", "Record Deleted Successfully...!");
    }else{
        TextNode("error", "Enable to Delete Record...!");
    }
}