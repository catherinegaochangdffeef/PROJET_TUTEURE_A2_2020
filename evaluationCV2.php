<!DOCTYPE html>
<?php
include 'database.php';
session_start();
?>

<head>
    <meta charset="utf-8">
    <title>L'évaluation du CV</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <br /><br /><br />
    <div class="container">
        <div class="jumbotron">
            <main class="form-signin text-center">
                <form>
                    <h1 class=" h3 mb-3 fw-normal">L'évaluation du CV</h1>
                    <br /><br /><br />
                    <table width="100%" align="center">
<tr>
<td width="50%" style="float: center; margin: 0px;padding: 0px;">




                  <table style='text-align:center; ' border='1'>
                        <tr>
                            <th>No</th>
                            <th>Nom</th>
                            <th>CV</th>
                            <th>Score</th>
                        </tr>


                        <?php
    $requete="
    select *
    from CV,Candidat
    where num_offre=4
    and CV.num_candidat=Candidat.num_candidat
    order by CV.score DESC";
    $result = $objPdo->query($requete) ;
   $i=0;
    while ($row=$result->fetch()){
        $nom = $row['adresse_mail'];
        $em = $row['emplacement_fichier'];
        $score = $row['score'];
        $class = $row['num_classe'];
        $i++;
        if($score>25){
       echo "<tr><td>$i</td><td>$nom</td><td>$em</td><td bgcolor=\"#FF3933\">$score</td></tr>";
    }
    elseif($score>10 && $score<25){ 
        echo "<tr><td>$i</td><td>$nom</td><td>$em</td><td bgcolor=\"#52BE80 \">$score</td></tr>";

    }
      elseif($score<10){
        echo "<tr><td>$i</td><td>$nom</td><td>$em</td><td bgcolor=\"#33B3FF\">$score</td></tr>";
      }
      
    }
   
?>
                    </table>
                    </td>
<td width="40%" style="float: right;margin: 200px;padding: 0px;">

                    <table style='text-align:center; ' border='1'>
                        <tr>
                            <th>Couleur</th>
                            <th>Niveau</th>
                        </tr>
                        <tr><td  bgcolor="#FF3933"> </td><td> Intéressante</td></tr>
                        <tr><td  bgcolor="#52BE80"> </td><td> Moyen</td></tr>
                        <tr><td  bgcolor="#33B3FF"> </td><td> Non Intéressante</td></tr>

</table>

</td>
</tr>
</table>



                    <input class=" btn btn-primary bouton1" type='button' value="retour "
                        onclick="window.location.replace('pageRH.html')"></input><br /><br />
                </form>
            </main>
        </div>
    </div>
</body>

<footer class="footer mt-auto py-5 bg-dark text-center">
    <div class="container">
        <span class="m-0 text-white">Projet tutoré réalisé par GAO Chang, MARSAL Rémi, MORIZE Vincent et RAHUEL
            Victor</span><br />
        <span class="m-0 text-white">Etudiants en 2e année à l'IUT de Metz, Janvier 2021</span>
    </div>
</footer>

</html>