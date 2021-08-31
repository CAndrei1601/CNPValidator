<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=validarecnp', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$cnp_p = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $cnp_p = $_POST['cnp'];
    
    
    if (!$cnp_p) {
        $errors[] =  'CNP is required ';
    }



    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO valid (cnp) VALUES (:cnp)");
        $statement->bindValue(':cnp',$cnp_p);
       
        $statement->execute();
     
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <title>Products CRUD</title>
</head>
<body>
<h1>Validate CNP</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="" method="POST">
   
    <div class="form-group">
        <label>CNP</label>
        <input type="number" name="cnp" class="form-control" >
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>