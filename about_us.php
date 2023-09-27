<!DOCTYPE html>
<html>
<head>
<title>Islamix(The Five Piller Of Islam)</title>
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="islamix_img/is19.jpg">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap"
rel="stylesheet">
</head>
<body>
<?php
include 'menu.php' ;
?>
<div class="jumbotron" style="background-color: #32CD32;">
<h1>Ask Question</h1>
<p></p>
</div>
<section class="my-5">
<div class="py-5">
<h2 class="text-center">Question And Answer</h2>
</div>
<br />
<br />
<div class="container">
<form method="POST" id="comment_form">
<div class="form-group">
<input type="text" name="comment_name" id="comment_name"
class="form-control" placeholder="Enter Name" />
</div>
<div class="form-group">
<textarea name="comment_content" id="comment_content" class="form-control"
placeholder="Enter Comment" rows="5"></textarea>
</div>
<div class="form-group">
<input type="hidden" name="comment_id" id="comment_id" value="0" />
<input type="submit" name="submit" id="submit" class="btn btn-info"
value="Submit" />
</div>
</form>
<span id="comment_message"></span>
<br />
<div id="display_comment"></div>
</div>
</section>
<footer>
<p class="p-3 bg-dark text-white text-center">@Islamix</p>
</footer>
</body>
</html>
<script>
$(document).ready(function(){
$('#comment_form').on('submit', function(event){
event.preventDefault();
var form_data = $(this).serialize();
$.ajax({
url:"add_comment.php",
method:"POST",
data:form_data,
dataType:"JSON",
success:function(data)
{
if(data.error != '')
{
$('#comment_form')[0].reset();
$('#comment_message').html(data.error);
$('#comment_id').val('0');
load_comment();
}
}
})
});
load_comment();
function load_comment()
{
$.ajax({
url:"fetch_comment.php",
method:"POST",
success:function(data)
{
$('#display_comment').html(data);
}
})
}
$(document).on('click', '.reply', function(){
var comment_id = $(this).attr("id");
$('#comment_id').val(comment_id);
$('#comment_name').focus();
});
});
</script>