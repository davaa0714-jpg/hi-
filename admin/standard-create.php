<?php
include("../app/db/users.php");

$table = 'standards';
$table_pj = 'standard_projects';

$idstd = "";
$codestd = "";
$namestd = "";
$pdfstd = "";

$idpj = "";
$codepj = "";
$namepj = "";
$linkpj = "";
$pdfpj = "";

// =================== НЭГ СТАНДАРТ УНШИХ ===================
if(isset($_GET['id'])) {
    $updatestd = selectOne($table, ['id' => $_GET['id']]);
    
    $idstd = $updatestd['id'];
    $codestd = $updatestd['code'];
    $namestd = $updatestd['name'];
    $pdfstd = $updatestd['file_path'];
}

// =================== НЭГ ТӨСӨЛ УНШИХ ===================
if(isset($_GET['idpj'])) {
    $updatepj = selectOne($table_pj, ['id' => $_GET['idpj']]);
    
    $idpj = $updatepj['id'];
    $codepj = $updatepj['code'];
    $namepj = $updatepj['name'];
    $linkpj = $updatepj['sugg_path'];
    $pdfpj = $updatepj['file_path'];
}

// =================== СТАНДАРТ НИЙТЛЭХ ===================
if (isset($_POST['publish-standard'])) {
    unset($_POST['publish-standard'], $_POST['id']);
    
    $standard_pdf = $_FILES['file_path']['name'];
    $standard_pdf_dest = "../include/standards/" . $standard_pdf;

    if (move_uploaded_file($_FILES['file_path']['tmp_name'], $standard_pdf_dest)) {
        $_POST['file_path'] = $standard_pdf;
    } else {
        $errors = 'Failed to upload';
    }

    $standard_id = create($table, $_POST); 
    header("location: standard-admin");
    exit();
}

// =================== ТӨСӨЛ НИЙТЛЭХ ===================
if (isset($_POST['publish-project'])) {
    unset($_POST['publish-project'], $_POST['id']);
    
    $project_pdf = $_FILES['file_path']['name'];
    $project_pdf_dest = "../include/standard_projects/" . $project_pdf;

    if (move_uploaded_file($_FILES['file_path']['tmp_name'], $project_pdf_dest)) {
        $_POST['file_path'] = $project_pdf;
    } else {
        $errors = 'Failed to upload';
    }

    $project_id = create($table_pj, $_POST); 
    header("location: standard-admin");
    exit();
}

// =================== СТАНДАРТ ШИНЭЧЛЭХ ===================
if (isset($_POST['update-standard'])) {
    $id = $_POST['id'];
    unset($_POST['update-standard'], $_POST['id']);

    if($_POST['file_path'] !== $_FILES['file_path']['name']) {
        $std_pdf_name = $_FILES['file_path']['name'];
        $std_pdf_dest = "../include/standards/" . $std_pdf_name;

        if (move_uploaded_file($_FILES['file_path']['tmp_name'], $std_pdf_dest)) {
            $_POST['file_path'] = $std_pdf_name;
        } else {
            $errors = 'Failed to upload';
        }
    }

    $std_id = update($table, $id, $_POST); 
    header("location: standard-admin"); 
    exit();   
}

// =================== ТӨСӨЛ ШИНЭЧЛЭХ ===================
if (isset($_POST['update-project'])) {
    $idpj = $_POST['id'];
    unset($_POST['update-project'], $_POST['id']);

    if($_POST['file_path'] !== $_FILES['file_path']['name']) {
        $pj_pdf_name = $_FILES['file_path']['name'];
        $pj_pdf_dest = "../include/standards/" . $pj_pdf_name;

        if (move_uploaded_file($_FILES['file_path']['tmp_name'], $pj_pdf_dest)) {
            $_POST['file_path'] = $pj_pdf_name;
        } else {
            $errors = 'Failed to upload';
        }
    }

    $pj_id = update($table_pj, $idpj, $_POST); 
    header("location: standard-admin"); 
    exit();   
}

// =================== БҮХ СТАНДАРТ, ТӨСЛИЙГ АВАХ ===================
$standards = selectAll($table);
$projects = selectAll($table_pj);
