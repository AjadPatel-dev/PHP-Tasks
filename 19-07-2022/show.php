<html>  
    <head>  
        <style>
            p {
                font-size: 30px;
                text-align:center;
                border: 4px solid black;
            }
        </style>  
        <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>  
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" /> 
        <script>  
            $(document).ready(function (){
                $('#datatable').dataTable({
                });  
            });  
        </script>  
    </head>  
    <body> 
        <center><h2><i>Student Details</i></h2></center>
        <p id="success_message" ></p>
        <?php
            include_once("connection.php");
            $result = mysqli_query($conn,"SELECT * FROM student_data ORDER BY id DESC");
        ?>
        <?php
            if (mysqli_num_rows($result) > 0) {
        ?> 
        <table border="2" id="datatable"> 
            <thead>  
                <tr style="color:red;">  
                <th >Sr. No.</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Update</th>
                <th>Delet</th>
                </tr>  
            </thead>
            <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["fname"]; ?></td>
                <td><?php echo $row["lname"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["number"]; ?></td>
                <td><a href='index.php?id=<?php echo $row['id']; ?>&action=edit'>edit</a></td>
                <td><div data-id="<?php echo $row['id']; ?>" class="delete" >delete</div></td>
            </tr> 
            <?php
                $i++;
                }
            ?>
        </table>
        <?php
            }
            else{
            echo "No result found";
            }
        ?> 
        <!----------------Script------------->
        <script>
            $(document).ready(function(){
                $(".delete").click(function(e) {
					alert('1');
                    e.preventDefault();
                    var id=$(this).data('id');
					alert(id);
                    if(id !='' &&  id !='undefined'){
                        var confirm_input =  confirm('Are you sure you want to delete this Data');
                        if(confirm_input == true){
                            $.ajax({
                                type: "POST",
                                url: 'http://localhost/Ajad/19-07-2022/ajax.php',
                                data: {
                                    id: id,
                                    'action':'delete'
                                },
                                success: function(response){
                                    var obj = JSON.parse(response);
                                    if(obj.status !=''){
                                        if(obj.status == 5){    
                                            jQuery('#success_message').text(obj.msg);
                                            setTimeout(function() {
                                                $('#success_message').fadeOut();
                                                window.location.href="show.php";
                                            }, 4000 );
                                        }
                                    }
                                }
                            });
                        }
                    }
                });
            });
        </script>
        <!----------------Script------------->
    </body>  
</html>