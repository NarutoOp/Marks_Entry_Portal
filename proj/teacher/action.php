<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
                <script src='script.js' type='text/javascript'></script>
     </body>
</html>


<?php

    session_start();
    $conn = mysqli_connect( 'localhost','root','','mitaoe' );
    
    $program = $_SESSION['program'];
    $dept_id = $_SESSION['dept_id'];
    $exam_id = $_SESSION['exam_id'];
    $subject_id = $_SESSION['sub_id'];
    $block = $_SESSION['block'];
    // print_r($program);
    // print_r($dept_id);
    // print_r($exam_id);
    // print_r($subject_id);
    // print_r($block);


    $data =  '<table class="table table-bordered table-striped ">
                        <tr class="bg-dark text-white">
                            <th>No.</th>
                            <th>PRN</th>
                            <th>Seat Number</th>
                            <th>Block</th>
                            <th>Marks </th> 
                        </tr>'; 

    $displayquery = " SELECT * FROM register where program = '$program' and block = '$block' and dept_id = $dept_id and subject_id = '$subject_id' and exam_id = $exam_id "; 
    $result = mysqli_query($conn,$displayquery);
    if(mysqli_num_rows($result) > 0){

        $number = 1;
        while ($row = mysqli_fetch_array($result)) {
            
            $data .= '<tr>  
                <td>'.$number.'</td>
                <td>'.$row['prn'].'</td>
                <td>'.$row['seat_no'].'</td>
                <td>'.$row['block'].'</td>
                <td> <div class="edit" id="marks_'.$row['id'].'">'.$row['marks'].'</div> </td>
            </tr>';
            $number++;

        }
    } 
     $data .= '</table>';
        echo $data;

?>