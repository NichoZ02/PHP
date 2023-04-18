<?php

// Importa il file di caricamento
require_once '../load.php';

// Gestisci il form
if(isset($_POST['addBtn'])) {
    // Ottieni i dati
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $indirizzo = $_POST['indirizzo'];
    $telefono = $_POST['telefono'];
    $codice_fiscale = $_POST['codice_fiscale'];
    // Query per aggiungere l'ingrediente
    $query = "INSERT INTO utenti (nome, cognome, username, email, password, indirizzo, telefono, codice_fiscale, id_utente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($query);
    $statement->bind_param('ssssi', $nome, $cognome, $username, $email, $password, $indirizzo, $telefono, $codice_fiscale);
    // Esegui la query
    if($statement->execute()) {
        $idUtente = $statement->insert_id; // Da cambiare
        $messaggio = '<div class="alert alert-success mt-3" role="alert">Utente aggiunto con successo. <a href="visualizza-utenti.php?id=' . $idUtente . '">Visualizza utente</a>.</div>';
        $_SESSION['messaggio'] = $messaggio;
        header('Location: modifica-utente.php?id=' . $idUtente . '');
    } else {
        $messaggio = '<div class="alert alert-danger mt-3" role="alert">Errore durante l\'aggiunta dell\'utente.</div>';
    }
}

// Carica l'head e l'header
require_once '../head.php';
mensaHead('Aggiungi utente | Mensa');
require_once ABSPATH . '/layout/components/header.php';
?>
<div class="container mt-3">
    <div class="heading-view">
        <div class="heading-view-title">
            <h1>Aggiungi utente</h1>
        </div>
    </div>
    <?php
    if(isset($messaggio)) {
        echo $messaggio;
    }
    ?>
    
    <div class="edit-container mt-3">
        <form class="edit-form" method="POST">
            <div class="edit-form-content">
                <div class="edit-form-group">
                    <label class="fw-bold" for="nome">Nome</label>
                    <input type="text" class="form-control mt-2" id="nome" name="nome" placeholder="Nome" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci il nome dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
                <div class="edit-form-group mt-4">
                    <label class="fw-bold mb-2" for="cognome">Cognome</label>
                    <input type="text" class="form-control mt-2" id="cognome" name="cognome" placeholder="Cognome" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci il cognome dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
                <div class="edit-form-group mt-4">
                    <label class="fw-bold mb-2" for="username">Username</label>
                    <input type="text" class="form-control mt-2" id="username" name="username" placeholder="Username" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci l'username dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
                <div class="edit-form-group mt-4">
                    <label class="fw-bold mb-2" for="email">Email</label>
                    <input type="text" class="form-control mt-2" id="email" name="email" placeholder="Email" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci l'email dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
                <div class="edit-form-group mt-4">
                    <label class="fw-bold mb-2" for="password">Password</label>
                    <input type="text" class="form-control mt-2" id="password" name="password" placeholder="Password" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci la password dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
                <div class="edit-form-group mt-4">
                    <label class="fw-bold mb-2" for="indirizzo">Indirizzo</label>
                    <input type="text" class="form-control mt-2" id="indirizzo" name="indirizzo" placeholder="Indirizzo" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci l'indirizzo dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
                <div class="edit-form-group mt-4">
                    <label class="fw-bold mb-2" for="telefono">Telefono</label>
                    <input type="text" class="form-control mt-2" id="telefono" name="telefono" placeholder="Telefono" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci il telefono dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
                <div class="edit-form-group mt-4">
                    <label class="fw-bold mb-2" for="codice_fiscale">Codice Fiscale</label>
                    <input type="text" class="form-control mt-2" id="codice_fiscale" name="codice_fiscale" placeholder="Codice Fiscale" required>
                    <p class="edit-form-text text-muted mt-2">Inserisci il codice fiscale dell'utente.</p>
                    <div class="edit-form-disclaimer mt-2">
                        <i class="fa-solid fa-circle-exclamation" style="color: #ff0000;"></i>
                        <p class="edit-form-text ms-1 text-danger">Campo richiesto.</p>
                    </div>
                </div>
            </div>
            <div class="edit-form-footer mt-3">
                <button type="submit" class="btn btn-primary" name="addBtn">Salva</button>
            </div>
        </form>
    </div>
</div>

<?php
// Carica il footer
require_once ABSPATH . '/layout/components/footer.php';
