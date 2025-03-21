document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('connexionForm');
    const messageApi = document.getElementById('messageApi');
  
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
  
      // Récupérer les données du formulaire sans inclure le fichier
      const formData = new FormData(form);
  
      // Convertir FormData en objet JSON
      const userData = {};
      formData.forEach((value, key) => {
        userData[key] = value;
      });
    console.log(JSON.stringify(userData));
      try {
        const response = await fetch('http://localhost/adrar/QuizzCodeCamp/apiConnexionCompte.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(userData), // Envoi des données sous forme JSON
        });
  
        if (response.ok) {
          const result = await response.json();
          //console.log('Compte créé avec succès:', result);
          messageApi.style.color = 'green';
          messageApi.innerText = result["message"];
          if(result["id_role"] == 1){
              window.location.href="./controllerCompteUtilisateurStat.php";
          } else {
            window.location.href="./controllerAdmin.php";
          }
          // Ajoutez ici le code pour gérer la réussite (ex: redirection, message de succès)
        } else {
          const result = await response.json();
          //console.log(result);
          messageApi.style.color = 'red';
          messageApi.innerText = result["message"];
          // Ajoutez ici le code pour gérer l'échec
        }
      } catch (error) {
        //console.error('Erreur:', error);
        messageApi.style.color = 'red';
        messageApi.innerText = 'Erreur Api : '+error.message;
        // Gérez les erreurs de réseau ou autres ici
      }
    });
  });
  