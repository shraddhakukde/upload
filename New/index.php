<?php
if (isset($_POST['uploadfilebutton'])) {
	$conn = mysqli_connect("localhost","root","","form");
	if($conn){
		echo "connected to database";
	}else{
		echo "not connected";
	}

	$filename = $_FILES['uploadFile']['name'];
	$tmpname = $_FILES['uploadFile']['tmp_name'];

	echo $filename;
	echo $tmpname;

	$folder = 'uploads/';

	move_uploaded_file($tmpname,$folder.$filename);

	$sql = "INSERT INTO up(imagepath) VALUES('$filename')";

	$query = mysqli_query($conn,$sql);

	if($query){
		echo "<br> IMAGE UPLOADED TO DATABASE";
	}


}


?>


<html>
<head>
	<title>upload image</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style="background-color: #FBDA61;background-image: linear-gradient(45deg, #FBDA61 0%, #FF5ACD 100%);">
	<center><h1 class="text-white">IMAGE or FILE Upload Using PHP</h1></center>
    <form action="" method="POST" enctype="multipart/form-data"  class="container shadow-lg p-3 mb-5 bg-white rounded mt-5">
    	<input type="file" name="uploadFile">
    	<button type="submit" name="uploadfilebutton" class="btn btn-secondary" value="upload">Submit</button>
    	
    </form>
</body>
</html>