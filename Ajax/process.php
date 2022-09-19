<?php
$data = [];
$error = [];
if(empty($_POST['name'])){
    $error['name'] = 'Name is required.';
}

if(empty($_POST['email'])){
    $error['email'] = 'Email is required.';
}
if(empty($_POST['SuperheroAlias'])){
    $error['SuperheroAlias'] = 'Superhero Alias is required.';
}
if(!empty($error)) {
    $data['success'] = false;
    $data['error'] = $error;
}else{
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);
?>

































<script>
$(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#first_name').val(data.first_name);
    $('#last_name').val(data.last_name);
    $('.modal-title').text("Edit User");
    $('#user_id').val(user_id);
    $('#user_uploaded_image').html(data.user_image);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
</script>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#first_name').val(data.first_name);
    $('#last_name').val(data.last_name);
    $('.modal-title').text("Edit User");
    $('#user_id').val(user_id);
    $('#user_uploaded_image').html(data.user_image);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
});
</script>








