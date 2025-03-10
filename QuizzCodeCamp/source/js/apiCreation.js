console.log("Test 1");

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('inscriptionForm');
    
    form.addEventListener('submitSubscribe', async (e) => {
      e.preventDefault(); // Empêche la soumission normale du formulaire
    console.log("Test 2");
      
      // Récupération des données du formulaire
      const formData = new FormData(form);
      const userData = Object.fromEntries(formData.entries());
      console.log(userData);
      try {
        // Envoi des données à l'API
    console.log("Test 3");

        const response = await fetch('https://votre-api.com/signup', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(userData)
        });
        
        if (response.ok) {
          const result = await response.json();
          console.log('Compte créé avec succès:', result);
          // Ajoutez ici le code pour gérer la réussite (ex: redirection, message de succès)
        } else {
          console.error('Erreur lors de la création du compte');
          // Ajoutez ici le code pour gérer l'échec
        }
      } catch (error) {
        console.error('Erreur:', error);
        // Gérez les erreurs de réseau ou autres ici
      }
    });
  });
  