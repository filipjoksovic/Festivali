<?php
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Festivali";
    $conn = new mysqli($servername,$username,$password,$dbname);
    $started = 0;

    if($conn -> connect_error){
        die("Connection failed");
    }
    // echo "Successfully connected";
    if(isset($_GET['function'])){
        if($_GET['function'] == 'get_years'){
            get_years();
        }
        else if($_GET['function'] == 'get_festivals'){
            $number = $_GET['param'];
            get_festivals($number);
            // echo "LOL DUMB";
        }
        else if($_GET['function'] == 'get_days'){
            $year = $_GET['yr'];
            $festival = $_GET['fest'];
            get_days($year,$festival);
        }
        else if($_GET['function'] == 'get_names'){
            $year = $_GET['year'];
            $festival = $_GET['fest'];
            $day = $_GET['day'];
            get_names($year,$festival,$day);
        }
        else if($_GET['function'] == 'get_visited'){
            $name = $_GET['name'];
            get_visited($name);

        }
        else if($_GET['function'] == 'most_spent'){
            $names = $_GET["names"];
            most_spent($names);
        
        }
        else if($_GET['function'] == 'get_visitors'){
            get_visitors();
        }
        else if($_GET['function'] == 'fill_years'){
            fill_years();
        }
        else if($_GET['function'] == 'fill_festivals'){
            $year = $_GET['year'];
            fill_festivals($year);
        }
        else if($_GET['function'] == 'fill_days'){
            $year = $_GET['year'];
            $fest = $_GET['fest'];
            fill_days($year,$fest);
        }
        else if($_GET['function'] == 'insert'){
            $year = $_GET['year'];
            $name = $_GET['name'];
            $price = $_GET['price'];
            $fest = $_GET['fest'];
            $day = $_GET['day'];
            $selectPos = "SELECT DISTINCT posetioci.idPosetioca FROM posetioci WHERE posetioci.ime = '".$name. "'";
            $resultPos = $conn->query($selectPos);
            $rowPos = $resultPos->fetch_assoc();
            $idPos = $rowPos['idPosetioca'];
            $selectFes = "SELECT DISTINCT festivali.idFestivala FROM festivali WHERE festivali.naziv = '".$fest. "'";
            $resultFes = $conn->query($selectFes);
            $rowFes = $resultFes->fetch_assoc();
            $idFes = $rowFes['idFestivala'];
            // echo "<script>console.log(".$idFes.")";
            insert($idFes,$year,$day,$idPos,$price);

        }
    }

function insert($idFes,$year,$day,$idPos,$price){
    global $servername,$dbname,$username,$password,$conn;
    // $query = "SET FOREIGN_KEY_CHECKS=0";
    // $conn->query($query);
    $insert = "INSERT INTO karte(idFestivala,godina,dan,idPosetioca,cena) VALUES(".$idFes.",".$year.",".$day.",".$idPos.",".$price.")";
    if($conn->query($insert) == TRUE){
        echo "<h1>Added successfully</h1>";
    }
    else{
        echo "<h1>Error: " . $insert . "<br>" . $conn->error."</h1>";
    }
    // $query = "SET FOREIGN_KEY_CHECKS=1";
    // $conn->query($query);
}

function fill_days($year,$fest){
    global $servername,$dbname,$username,$password,$conn;
    $select = "SELECT DISTINCT lineup_festivala.dan FROM lineup_festivala INNER JOIN festivali on lineup_Festivala.idFestivala = festivali.idFestivala WHERE lineup_festivala.godina = ".$year. " AND festivali.naziv = '".$fest."' ORDER BY festivali.naziv ASC";
    $result = $conn->query($select);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<option>".$row['dan']."</option>";
        }
    }

}

function fill_festivals($year){
    global $servername,$dbname,$username,$password,$conn;
    $select = "SELECT DISTINCT festivali.naziv FROM festivali INNER JOIN lineup_festivala on lineup_Festivala.idFestivala = festivali.idFestivala WHERE lineup_festivala.godina = ".$year. " ORDER BY festivali.naziv ASC";
    $result = $conn->query($select);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<option>".$row['naziv']."</option>";
        }
    }

}    
function fill_years(){
    global $servername,$dbname,$username,$password,$conn;
    $select = "SELECT DISTINCT karte.godina FROM karte ORDER BY karte.godina ASC";
    $result = $conn->query($select);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<option>".$row['godina']."</option>";
        }
    }

}
function get_visitors(){
    global $servername,$dbname,$username,$password,$conn;
    $select = "SELECT posetioci.ime FROM posetioci ORDER BY posetioci.ime ASC";
    $result = $conn->query($select);
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<option>".$row['ime']."</option>";
        }
    }

}
function most_spent($names){
    global $servername,$username,$password,$dbname,$conn;
    if(strlen($names) <=0){
        echo "<h1 style = 'text-align : center'>¯\_(ツ)_/¯</h1>";

    }
    else{
    echo "<script>console.log(".$names.")</script>";
    $select = "SELECT posetioci.ime, SUM(karte.cena) cene FROM festivali JOIN karte on festivali.idFestivala = karte.idFestivala JOIN posetioci on karte.idPosetioca = posetioci.idPosetioca WHERE posetioci.ime IN(".$names.") Group by posetioci.ime Order by cene DESC";
    $result = $conn->query($select);
    $row = $result->fetch_assoc();
    $name = $row["ime"];
    $money = $row["cene"];
    echo "<script>";
    echo "$('#spent-most').text('Najvise potrosio: ".$name. "(".$money."din)"."')";
    echo "</script>";
    }
}

function get_visited($name){
    global $servername,$username,$password,$dbname,$conn;
    $select = "SELECT posetioci.ime,festivali.naziv, karte.godina,karte.dan,karte.cena FROM karte INNER JOIN festivali on festivali.idFestivala = karte.idFestivala INNER JOIN posetioci on posetioci.idPosetioca = karte.idPosetioca WHERE posetioci.ime = '" .$name. "'";
    echo "<p>".$select."</p>";
    $result = $conn->query($select);
    $i = 1;
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Festival</th>";
    echo "<th scope='col'>Dan</th>";
    echo "<th scope='col'>Godina</th>";
    echo "<th scope='col'>Cena</th>";
    echo "</tr>";
    echo "</thead>";
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>";
            echo $i;
            echo "</td>";
            echo "<td id = 'fname'>";
            echo $row["naziv"];
            echo "<td id = 'fday'>";
            echo $row["dan"];
            echo "<td id = 'fyear'>";
            echo $row["godina"];
            echo "<td id = 'fprice'>";
            echo $row["cena"];
            echo "</tr>";
            $i++;
        }
    }
}
function get_names($year,$festival,$day){
    global $servername,$username,$password,$dbname,$conn;
    $select = "SELECT posetioci.ime FROM posetioci INNER JOIN karte on karte.idPosetioca = posetioci.idPosetioca INNER JOIN festivali on festivali.idFestivala = karte.idFestivala WHERE karte.godina = " .$year. " AND festivali.naziv = '" .$festival. "' AND karte.dan = " .$day. " ORDER BY posetioci.ime;";
    // echo "<script>alert('".$select."')</script>";
    
    $result = $conn->query($select);
    $i = 1;
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Ime</th>";
    echo "</tr>";
    echo "</thead>";
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>";
            echo $i;
            echo "</td>";
            echo "<td id = 'ime' class = 'name'>";
            echo $row["ime"];
            echo "</td>";
            echo "</tr>";
            $i++;
        }
    }
    echo "</table>";

    // most_spent();
}
function get_days($year,$name){
        global $servername,$username,$password,$dbname,$conn;
        $select = "SELECT DISTINCT lineup_festivala.dan FROM lineup_festivala INNER JOIN festivali on lineup_festivala.idFestivala = festivali.idFestivala WHERE festivali.naziv = '"  .$name. "' AND lineup_festivala.godina =" .$year;
        $result = $conn->query($select);
        // echo "<option>Dan</option>";
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option>" .$row["dan"]. "</option>";
            }
        }
}
function get_festivals($number){
        global $servername,$username,$password,$dbname,$conn;
        $select = "SELECT DISTINCT festivali.naziv FROM festivali INNER JOIN lineup_festivala on lineup_festivala.idFestivala = festivali.idFestivala WHERE lineup_festivala.godina = " .$number;
        $result = $conn->query($select);
        // echo "<option>Festival</option>";
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option>" .$row["naziv"]. "</option>";
            }
    }
}
function get_years(){
        global $servername,$username,$password,$dbname,$conn;
        $select = "SELECT DISTINCT lineup_festivala.godina FROM lineup_festivala";
        $result = $conn->query($select);
        // echo "<option>Godina</option>";
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<option>" .$row["godina"]. "</option>";
            }
    }
}   
?>    