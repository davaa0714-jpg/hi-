<?php

$table = 'commission_bb_22';
$table2 = 'commission_zt_22';


$id = "";
$date = "";
$pdf = "";
$idzs = "";
$datezs = "";
$pdfzs = "";


if(isset($_GET['id'])) {
    $updatebb = selectOne($table, ['id' => $_GET['id']]);
    
    $id = $updatebb['id'];
    $date = $updatebb['date_range'];
    $pdf = $updatebb['file_path'];
}


if(isset($_GET['idzs'])) {
    $updatezs = selectOne($table2, ['id' => $_GET['idzs']]);
    
    $idzs = $updatezs['id'];
    $datezs = $updatezs['date_range'];
    $pdfzs = $updatezs['file_path'];
}


if (isset($_POST['publish-bb'])) {
    unset($_POST['publish-bb'], $_POST['id']);
    
    $bb_pdf = $_FILES['file_path']['name'];
    $bb_pdf_dest = "../include/commission22_bb/" . $bb_pdf;

    $bb_result = move_uploaded_file($_FILES['file_path']['tmp_name'], $bb_pdf_dest);
    if($bb_result){
        $_POST['file_path'] = $bb_pdf;
    } else {
        $errors = 'Failed to upload';
    }

    $bb_id = create($table, $_POST); 
    // display($_POST);
    header("location: commission-admin");
    exit();
}

if (isset($_POST['publish-zs'])) {
    unset($_POST['publish-zs'], $_POST['id']);
    
    $zs_pdf = $_FILES['file_path']['name'];
    $zs_pdf_dest = "../include/commission22_zt/" . $zs_pdf;

    $zs_result = move_uploaded_file($_FILES['file_path']['tmp_name'], $zs_pdf_dest);
    if($zs_result){
        $_POST['file_path'] = $zs_pdf;
    } else {
        $errors = 'Failed to upload';
    }

    $zs_id = create($table2, $_POST); 
    // display($post_id);
    header("location: commission-admin");
    exit();
}

if (isset($_POST['update-bb'])) {
    $id = $_POST['id'];
    unset($_POST['update-bb'], $_POST['id']);


    if($_POST['file_path'] !== $_FILES['file_path']['name']) {
        $bb_pdf_name = $_FILES['file_path']['name'];
        $bb_pdf_dest = "../include/commission22_bb/" . $bb_pdf_name;

        $bb_result = move_uploaded_file($_FILES['file_path']['tmp_name'], $bb_pdf_dest);
        if($bb_result){
            $_POST['file_path'] = $bb_pdf_name;
        } else {
            $errors = 'Failed to upload';
        }
    }

   
    $bb_id = update($table, $id, $_POST); 
    // display($post_id);
    header("location: commission-admin"); 
    exit();   
}

if (isset($_POST['update-zs'])) {
    $idzs = $_POST['id'];
    unset($_POST['update-zs'], $_POST['id']);


    if($_POST['file_path'] !== $_FILES['file_path']['name']) {
        $zs_pdf_name = $_FILES['file_path']['name'];
        $zs_pdf_dest = "../include/commission22_zt/" . $zs_pdf_name;

        $zs_result = move_uploaded_file($_FILES['file_path']['tmp_name'], $zs_pdf_dest);
        if($zs_result){
            $_POST['file_path'] = $zs_pdf_name;
        } else {
            $errors = 'Failed to upload';
        }
    }

   
    $zs_id = update($table2, $idzs, $_POST); 
    // display($post_id);
    header("location: commission-admin"); 
    exit();   
}
