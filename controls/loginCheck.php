<?php
    
    /**codice anti SQL injection per il login all' applicazione*/

    include("connessioneDatabase.php");		//connessione al database 

    
    if(empty($_POST["user"]) || empty($_POST["password"]) ){	//se i campi sono vuoti

            exit("Username o password mancanti, non hai i permessi per accedere a questa pagina");

    } else {	//altrimenti controlla se i valori corrispondono nel database
        
            $user = $_POST["user"];     //netbeans rompeva le scatole per usare direttamente lo superglobal
            $passw = $_POST["password"];    //così per farlo star zitto ho usato direttamente delle variabili

            $loginQuery = "SELECT username, password FROM login WHERE username =? AND password =? ";	//query di verifica login

            $preparedStatement = $mysqli->prepare($loginQuery);	//prepared statement per evitare accessi non autorizzati tramite SQLinjection

            $preparedStatement->bind_param("ss", $user, $passw); // collego i parametri della query con il loro tipo

            $preparedStatement->execute();	//esegui la query

            $preparedStatement->bind_result($user, $passw); 
            
            $preparedStatement->store_result();
            
            $accessoSito = $preparedStatement->num_rows;    //ottengo il numero di corrispondenze trovate

            if ($accessoSito != 1){	//se la risposta è negativa

                $mysqli->close();
                
                echo '<title>Connessione rifiutata </title>';
                
                exit("Non hai i permessi per accedere a questa pagina <br> <br>"
                        . "Se invece hai tentato una SQL injection mi spiace per te "
                        . "ma sono un fissato di sicurezza informatica <br>"
                        . "Se comunque dovessi trovare delle falle nel progetto mi piacerebbe venirne a conoscenza &#9786;"
                        . '<br><br> <img src="https://imgs.xkcd.com/comics/exploits_of_a_mom.png" alt="xkcd comics">');    //chiude la connessione al sito
            }
            
            session_start();    //fa partire la sessione

            $_SESSION["user"] = $user;
            $_SESSION["password"] = $passw;
            
        }

    $mysqli->close();   //chiude la connessione al database

?>