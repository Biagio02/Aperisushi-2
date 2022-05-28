<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="apecss.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="Fig4Aperisushi.php">
            <img src="./images/LG.png" alt="" width="150" height="120">
            Fig4hperiSushi
          </a>
        </div>
    </nav>
    
    <div class="container my-5">
        <form action="" method="POST">
            <div class="mb-3"> <!-- Campo nome -->
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="mb-3"> <!-- Campo email -->
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3"> <!-- Campo quanti posti -->
                <label for="customRange3" class="form-label">Fig4h quanti siete?</label>
                <input type="range" name="posti" class="form-range" min="1" max="10" step="1" id="Range">

                <div class="container pers" style="max-width: 200px;"> 
                    <div class="row">
                        <div class="col">
                            <p>Persone: </p>
                        </div>
                        <div class="col">
                            <p id="QTPersone">0</p>
                        </div>
                    </div>
                </div>            
            </div>
            <br>
            <div class="container pers" style="max-width: 150px"> <!-- Campo orari -->
                <select name="orario" class="form-select mb-3" aria-label="Default select example">
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                    <option value="22:00">22:00</option>
                    <option value="22:30">22:30</option>
                </select>
            </div>
            <br>
            <br>
            <div class="container pers" style="max-width: 150px"> <!-- Campo giorni -->
                <input type="text" name="data" class="form-control" placeholder="aaaa-mm-gg">
            </div>
            <br>
            <br>
            <br>
            <button name="submit" type="submit" class="btn btn-outline-dark">Prenota</button>
        </form>
    </div>


    <?php

        if(isset($_POST["submit"])){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $posti = $_POST["posti"];
            $orario = $_POST["orario"];
            $data = $_POST["data"];
            $id = rand(00000,99999);
            $query = "INSERT INTO prenotazione (Nome,Email,Ora,Data,QNTclienti,ID_Prenotazione) VALUES ('$nome','$email','$orario','$data','$posti','$id');";
            
            
            //echo "<br>$query";
            $conn = new mysqli("localhost","root","","fig4perisushi");
            // Check connection
            if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
            }           
            //echo "Connected successfully";
            mysqli_query($conn, $query);

            $to = $email;
            $msg = "Prenotazione avvenuta con successo.\nNome: $nome in data: $data alle ore: $orario";
            $object = "Prenotazione sushi";
            $sender = 'From: biagio.floridia@gmail.com';
            //if(mail($to,$object,$msg,$sender))
            //     header("Fig4Aperisushi.php");
            // else{
            //     echo "fottiti";
            //     header("Fig4Aperisushi.php");
            // }
            require "./mailer/mailsender.php";
            $res = send_mail($to,$object,$msg);
            if($res){
                echo "mail spedita";
            }
            else{
                echo "fottiti";
            }

 
        } 

    ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
<script src="Script.js"></script>
</body>
</html>
